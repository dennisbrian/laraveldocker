<?php

namespace App\Nova\Filters;

use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;


class OrderStatusFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->where('order_status', $value);
    }

    public function options(NovaRequest $request)
    {
        return [
            'Pending' => 'pending'
            ,
            'Processing' => 'processing'
            ,
            'Shipped' => 'shipped'
            ,
            'Delivered' => 'delivered'
            ,
        ];
    }
}
