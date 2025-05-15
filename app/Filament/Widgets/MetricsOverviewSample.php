<?php

namespace App\Filament\Widgets;

use App\Filament\CustomWidgets\AnotherMetricWidget;
use App\Filament\CustomWidgets\MetricsOverviewWidget;
use App\Filament\CustomWidgets\MetricWidgetSample;

class MetricsOverviewSample extends MetricsOverviewWidget
{
    protected function getMetrics(): array
    {
        return [
            MetricWidgetSample::class,
            AnotherMetricWidget::class,
        ];
    }


}
