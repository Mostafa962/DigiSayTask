<?php

namespace App\DataTables;

use App\Client;
use Yajra\DataTables\Services\DataTable;

class ClientDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        //create new folder in view/admin/admins/btn for buttons paths
        return datatables($query)
            ->addColumn('edit', 'admin-panel.btns.editClient')
            ->addColumn('delete', 'admin-panel.btns.deleteClient')
            ->addColumn('manage', 'admin-panel.btns.manage')
            ->rawColumns(['edit','delete','manage']);
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Client::query();
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
            //->addAction(['width' => '80px'])
            ->parameters([
                'dom'           =>'Blfrtp',
                'lenghtMenu'    =>[[10,25,50,100,-1],[10,25,50,'All Records']],
                'buttons'       => [
                    [
                        'text'=>'<i class="fa fa-plus"></i>'.trans('admin.addClient'),
                        'className'=>'btn btn-info',
                        'action'=>"function(){
                            window.location.href = '".\URL::current()."/create';
                        }",
                    ],
                    ],
                'initComplete'  =>"
                        function () {
                            this.api().columns([1]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                      }",
                'language'  =>[
                        'sProcessing'   =>trans('admin.sProcessing'),
                        'sLengthMenu'   =>trans('admin.sLengthMenu'),
                        'sZeroRecords'  =>trans('admin.sZeroRecords'),
                        'sEmptyTable'   =>trans('admin.sEmptyTable'),
                        'sInfo'         =>trans('admin.sInfo'),
                        'sInfoEmpty'    =>trans('admin.sInfoEmpty'),
                        'sInfoFiltered' =>trans('admin.sInfoFiltered'),
                        'sInfoPostFix'  =>trans('admin.sInfoPostFix'),
                        'sSearch'       =>trans('admin.sSearch'),
                        'sUrl'          =>trans('admin.sUrl'),
                        'sInfoThousands'=>trans('admin.sInfoThousands'),
                        'sLoadingRecords'=>trans('admin.sLoadingRecords'),
                        'oPaginate'     =>[
                            'sFirst'    =>trans('admin.sFirst'),
                            'sLast'     =>trans('admin.sLast'),
                            'sNext'     =>trans('admin.sNext'),
                            'sPrevious' =>trans('admin.sPrevious'),
                                ],
                        'oAria'=>[
                            'sSortAscending'    =>trans('admin.sSortAscending'),
                            'sSortDescending'   =>trans('admin.sSortDescending'),
                                ],
                    ]
                ]);
                //->parameters($this->getBuilderParameters());
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>trans('admin.id')
            ],
            [
                'name'=>'title',
                'data'=>'title',
                'title'=>trans('admin.title')
            ],
            // [
            //     'name'=>'description',
            //     'data'=>'description',
            //     'title'=>trans('admin.description')
            // ],
            // [
            //     'name'=>'status',
            //     'data'=>'status',
            //     'title'=>trans('admin.status')
            // ],
            [
                'name'=>'contact_phone',
                'data'=>'contact_phone',
                'title'=>trans('admin.phone')
            ],
            [
                'name'=>'contract_start',
                'data'=>'contract_start',
                'title'=>trans('admin.contract_start')
            ],
            [
                'name'=>'contract_end',
                'data'=>'contract_end',
                'title'=>trans('admin.contract_end')
            ],
            // [
            //     'name'=>'created_at',
            //     'data'=>'created_at',
            //     'title'=>trans('admin.created_at')
            // ],
            // [
            //     'name'=>'updated_at',
            //     'data'=>'updated_at',
            //     'title'=>trans('admin.updated_at')
            // ],
            [
                'name'=>'edit',
                'data'=>'edit',
                'title'=>trans('admin.edit'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'delete',
                'data'=>'delete',
                'title'=>trans('admin.delete'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'manage',
                'data'=>'manage',
                'title'=>trans('admin.manage_services'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Client_' . date('YmdHis');
    }
}
