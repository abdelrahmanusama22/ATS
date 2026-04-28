<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalViews = Product::sum('views_count');
        $totalOrders = Product::sum('orders_count');
        $pendingMessages = ContactMessage::where('status', 'pending')->count();

        return [
            Stat::make('Total Product Views', number_format($totalViews))
                ->description('All time traffic on products')
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary'),
                
            Stat::make('Total Orders/Requests', number_format($totalOrders))
                ->description('Total products requested')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('success'),
                
            Stat::make('Pending Support Tickets', $pendingMessages)
                ->description('Unread contact messages')
                ->descriptionIcon('heroicon-m-envelope')
                ->color($pendingMessages > 0 ? 'danger' : 'success'),
        ];
    }
}
