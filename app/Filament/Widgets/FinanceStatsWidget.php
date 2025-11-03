<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FinanceStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        // Get current month data
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        // Total Income
        $totalIncome = Transaction::where('type', 'income')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
            
        // Total Expense
        $totalExpense = Transaction::where('type', 'expense')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
        
        // Net Profit
        $netProfit = $totalIncome - $totalExpense;
        
        // Transaction Count
        $transactionCount = Transaction::whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->count();
        
        // Get previous month for comparison
        $startOfPrevMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfPrevMonth = Carbon::now()->subMonth()->endOfMonth();
        
        $prevIncome = Transaction::where('type', 'income')
            ->whereBetween('transaction_date', [$startOfPrevMonth, $endOfPrevMonth])
            ->sum('amount');
            
        $prevExpense = Transaction::where('type', 'expense')
            ->whereBetween('transaction_date', [$startOfPrevMonth, $endOfPrevMonth])
            ->sum('amount');
        
        // Calculate percentage change
        $incomeChange = $prevIncome > 0 ? (($totalIncome - $prevIncome) / $prevIncome) * 100 : 0;
        $expenseChange = $prevExpense > 0 ? (($totalExpense - $prevExpense) / $prevExpense) * 100 : 0;
        
        return [
            Stat::make('Total Income (This Month)', 'Rp ' . number_format($totalIncome, 0, ',', '.'))
                ->description(($incomeChange >= 0 ? '+' : '') . number_format($incomeChange, 1) . '% from last month')
                ->descriptionIcon($incomeChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($incomeChange >= 0 ? 'success' : 'danger')
                ->chart($this->getIncomeChartData()),
                
            Stat::make('Total Expense (This Month)', 'Rp ' . number_format($totalExpense, 0, ',', '.'))
                ->description(($expenseChange >= 0 ? '+' : '') . number_format($expenseChange, 1) . '% from last month')
                ->descriptionIcon($expenseChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($expenseChange >= 0 ? 'danger' : 'success')
                ->chart($this->getExpenseChartData()),
                
            Stat::make('Net Profit/Loss (This Month)', 'Rp ' . number_format($netProfit, 0, ',', '.'))
                ->description($netProfit >= 0 ? 'Profit' : 'Loss')
                ->descriptionIcon($netProfit >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-exclamation-triangle')
                ->color($netProfit >= 0 ? 'success' : 'danger'),
                
            Stat::make('Total Transactions', number_format($transactionCount, 0, ',', '.'))
                ->description('This month')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
        ];
    }
    
    protected function getIncomeChartData(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $amount = Transaction::where('type', 'income')
                ->whereDate('transaction_date', $date)
                ->sum('amount');
            $data[] = $amount / 1000000; // Convert to millions for chart
        }
        return $data;
    }
    
    protected function getExpenseChartData(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $amount = Transaction::where('type', 'expense')
                ->whereDate('transaction_date', $date)
                ->sum('amount');
            $data[] = $amount / 1000000; // Convert to millions for chart
        }
        return $data;
    }
}
