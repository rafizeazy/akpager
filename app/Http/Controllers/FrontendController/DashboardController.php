<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $bodyClass = 'page-wrapper';
        
        // Get filter parameters
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));
        $category = $request->input('category', '');
        $paymentMethod = $request->input('payment_method', '');
        $type = $request->input('type', '');
        
        // Base query
        $query = Transaction::whereBetween('transaction_date', [$startDate, $endDate]);
        
        // Apply filters
        if ($category) {
            $query->where('category', $category);
        }
        
        if ($paymentMethod) {
            $query->where('payment_method', $paymentMethod);
        }
        
        if ($type) {
            $query->where('type', $type);
        }
        
        // Get statistics
        $totalIncome = (clone $query)->where('type', 'income')->sum('amount');
        $totalExpense = (clone $query)->where('type', 'expense')->sum('amount');
        $netProfit = $totalIncome - $totalExpense;
        
        // Get transaction count
        $incomeCount = (clone $query)->where('type', 'income')->count();
        $expenseCount = (clone $query)->where('type', 'expense')->count();
        
        // Get recent transactions
        $recentTransactions = (clone $query)
            ->orderBy('transaction_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        // Get all transactions for table (paginated)
        $transactions = (clone $query)
            ->orderBy('transaction_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->appends($request->all());
        
        // Get category breakdown
        $categoryBreakdown = (clone $query)
            ->select('category', 'type', DB::raw('SUM(amount) as total'))
            ->groupBy('category', 'type')
            ->orderBy('total', 'desc')
            ->get();
        
        // Get payment method breakdown
        $paymentMethodBreakdown = (clone $query)
            ->select('payment_method', DB::raw('SUM(amount) as total'), DB::raw('COUNT(*) as count'))
            ->groupBy('payment_method')
            ->orderBy('total', 'desc')
            ->get();
        
        // Get daily transactions for chart
        $dailyTransactions = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->select(
                DB::raw('DATE(transaction_date) as date'),
                'type',
                DB::raw('SUM(amount) as total')
            )
            ->groupBy('date', 'type')
            ->orderBy('date', 'asc')
            ->get();
        
        // Prepare chart data
        $chartData = $this->prepareChartData($dailyTransactions, $startDate, $endDate);
        
        // Get filter options
        $categories = Transaction::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category');
        
        $paymentMethods = Transaction::select('payment_method')
            ->distinct()
            ->whereNotNull('payment_method')
            ->orderBy('payment_method')
            ->pluck('payment_method');
        
        return view('frontend.pages.dashboard', compact(
            'bodyClass',
            'totalIncome',
            'totalExpense',
            'netProfit',
            'incomeCount',
            'expenseCount',
            'recentTransactions',
            'transactions',
            'categoryBreakdown',
            'paymentMethodBreakdown',
            'chartData',
            'categories',
            'paymentMethods',
            'startDate',
            'endDate',
            'category',
            'paymentMethod',
            'type'
        ));
    }
    
    private function prepareChartData($dailyTransactions, $startDate, $endDate)
    {
        $dates = [];
        $incomeData = [];
        $expenseData = [];
        
        // Create array of all dates in range
        $period = Carbon::parse($startDate)->daysUntil(Carbon::parse($endDate));
        
        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            $dates[] = $date->format('M d');
            
            // Find income and expense for this date
            $income = $dailyTransactions->where('date', $dateStr)->where('type', 'income')->first();
            $expense = $dailyTransactions->where('date', $dateStr)->where('type', 'expense')->first();
            
            $incomeData[] = $income ? $income->total : 0;
            $expenseData[] = $expense ? $expense->total : 0;
        }
        
        return [
            'dates' => $dates,
            'income' => $incomeData,
            'expense' => $expenseData,
        ];
    }
    
    public function export(Request $request)
    {
        // Export functionality - could export to CSV/Excel
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $transactions = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date', 'desc')
            ->get();
        
        // Return CSV download
        $filename = "transactions_{$startDate}_to_{$endDate}.csv";
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];
        
        $callback = function() use ($transactions) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, [
                'Date',
                'Type',
                'Category',
                'Description',
                'Amount',
                'Payment Method',
                'Vendor/Customer',
                'Reference Number',
            ]);
            
            // Data
            foreach ($transactions as $transaction) {
                fputcsv($file, [
                    $transaction->transaction_date,
                    ucfirst($transaction->type),
                    $transaction->category,
                    $transaction->description,
                    $transaction->amount,
                    $transaction->payment_method,
                    $transaction->vendor_customer,
                    $transaction->reference_number,
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
