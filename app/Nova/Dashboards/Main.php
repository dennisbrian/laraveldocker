<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;
use App\Nova\Metrics\TotalOrdersMetric;
use App\Nova\Metrics\Delivered;
use App\Nova\Metrics\Pending;
use App\Nova\Metrics\Processing;
use App\Nova\Metrics\Shipped;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new TotalOrdersMetric,
            new Pending,
            new Delivered,
            new Processing,
            new Shipped
        ];
    }
}
