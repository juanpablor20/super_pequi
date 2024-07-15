<?php

namespace App\Tables;

use App\Models\Service;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class HistorialTable extends DataTable
{
    public function __construct()
    {
        // Utiliza join para unir las tablas relacionadas
        $this->setDataSource(
            Service::select(
                'services.id',
                'services.date_ser',
                'services.return_ser',
                'services.status',
                'librarian.number_identification as librarian_number_identification',
                'users.number_identification as user_number_identification',
               
                'equipment.serie_equi'
            )
            ->join('users as librarian', 'services.librarian_borrower_id', '=', 'librarian.id')
            ->join('users', 'services.user_borrower_id', '=', 'users.id')
            ->join('equipment', 'services.equipment_id', '=', 'equipment.id')
            ->join('environments', 'services.environment_id', '=', 'environments.id')
        )
        ->column(name: 'id', title: 'No.')
        ->column(name: 'date_ser', title: 'Fecha prestamo', search: true)
        ->column(name: 'return_ser', title: 'Fecha Devolucion', search: true)
        ->column(name: 'status', title: 'Estado', search: true)
        ->column(name: 'librarian_number_identification', title: 'Bibliotecario', search: true)
        ->column(name: 'user_number_identification', title: 'Numero de Documento', search: true)
        ->column(name: 'equipment.serie_equi', title: 'Numero de Serie', search: true)
        // ->column(name: 'action', title: 'Action', callback: function ($item) {
        //     return view('service.action', ['item' => $item])->render();
        // }, formatter: 'html')
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    }

    protected function getColumns()
    {
        return [
            'id',
            'date_ser',
            'return_ser',
            'status',
            'librarian.names',
            'user.number_identification',
            'equipment.serie_equi',
            'action' => [
                'title' => 'Acción',
                'formatter' => 'html'
            ],
            'action_export' => [
                'title' => 'Acción Export',
                'exportOnly' => true
            ]
        ];
    }
}
