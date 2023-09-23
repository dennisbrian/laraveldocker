<?php

namespace App\Nova\Lenses;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Nova;
use App\Models\Order;

class PendingOrdersLens extends Lens
{
    public $name = 'Pending Orders';
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

    public function orderResource()
    {
        return Order::class;
    }

    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $query->where('order_status', 'pending');
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Customer', function () {
                //return $this->customer->user->email;
            })->sortable(),
            //BelongsTo::make('Order', 'order', $orderResource)->sortable(),
            Currency::make('Total Amount', 'total_amount')->sortable(),
            DateTime::make('Order Date', 'order_date')->sortable(),
        ];
    }

    /**
     * Get the cards available on the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'pending-orders-lens';
    }
}
