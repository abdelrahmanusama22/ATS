<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class TopProductsChart extends ChartWidget
{
    protected static ?string $heading = 'Top Products by Views';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $topProducts = Product::orderBy('views_count', 'desc')
            ->take(5)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Views',
                    'data' => $topProducts->pluck('views_count')->toArray(),
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $topProducts->map(fn ($p) => $p->getTranslation('name', app()->getLocale(), false) ?: 'Product')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
