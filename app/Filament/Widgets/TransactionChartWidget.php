<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionChartWidget extends ChartWidget
{
    protected static ?int $sort = 2;
    
    protected ?string $heading = 'Income vs Expense';
    
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        // Get income vs expense totals for this month
        $income = Transaction::where('type', 'income')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
            
        $expense = Transaction::where('type', 'expense')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
        
        return [
            'datasets' => [
                [
                    'label' => 'Amount (in Millions)',
                    'data' => [$income / 1000000, $expense / 1000000], // Convert to millions
                    'backgroundColor' => [
                        'rgb(34, 197, 94)', // Green for income
                        'rgb(239, 68, 68)',  // Red for expense
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Income', 'Expense'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => 'function(value) { return "Rp " + value + "M"; }',
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) { return "Amount: Rp " + context.parsed.y.toFixed(2) + "M"; }',
                    ],
                ],
            ],
        ];
    }
}
