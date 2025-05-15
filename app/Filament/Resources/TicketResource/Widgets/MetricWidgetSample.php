<?php

namespace App\Filament\Resources\TicketResource\Widgets;

use Illuminate\Contracts\Support\Htmlable;
use App\Filament\CustomWidgets\MetricWidget;

class MetricWidgetSample extends MetricWidget
{
    protected string | Htmlable $label = "Sample";

    public function getValue()
    {
        return now();
    }

    public ?string $filter = 'week';
    protected function getFilters(): ?array
    {
        return [
            'week' => 'Esta semana',
            'month' => 'Este mes',
            'year' => 'Este año',
        ];


    }

}

