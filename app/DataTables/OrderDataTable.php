<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'orders.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'request_on' => new Column(['title' => __('models/orders.fields.request_on'), 'data' => 'request_on']),
            'arrival_on' => new Column(['title' => __('models/orders.fields.arrival_on'), 'data' => 'arrival_on']),
            'quota' => new Column(['title' => __('models/orders.fields.quota'), 'data' => 'quota']),
            'status' => new Column(['title' => __('models/orders.fields.status'), 'data' => 'status']),
            'user_id' => new Column(['title' => __('models/orders.fields.user_id'), 'data' => 'user_id']),
            'agency_id' => new Column(['title' => __('models/orders.fields.agency_id'), 'data' => 'agency_id']),
            'size' => new Column(['title' => __('models/orders.fields.size'), 'data' => 'size']),
            'qty' => new Column(['title' => __('models/orders.fields.qty'), 'data' => 'qty']),
            'total' => new Column(['title' => __('models/orders.fields.total'), 'data' => 'total']),
            'driver_id' => new Column(['title' => __('models/orders.fields.driver_id'), 'data' => 'driver_id']),
            'subtotal' => new Column(['title' => __('models/orders.fields.subtotal'), 'data' => 'subtotal']),
            'delivery_fees' => new Column(['title' => __('models/orders.fields.delivery_fees'), 'data' => 'delivery_fees'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
