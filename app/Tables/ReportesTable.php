<?php
namespace App\Tables;

use App\Models\Disability;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class ReportesTable extends DataTable


{
    public function __construct()
    {
        $this->setDataSource(
            Disability::select(
                'disabilities.id',
                'disabilities.description',
                'disabilities.punishment_date',
                'disabilities.end_date',
                'disabilities.status',
                'services.date_ser as Servicio'
            )
            ->join('services', 'disabilities.service_id', '=', 'services.id') // Corregido el nombre de la tabla en la unión
        )
                
        ->column(name: 'id', title: 'Id')
        ->column(name: 'description', title: 'Descripcion', search: true)
        ->column(name: 'punishment_date', title: 'Fecha del Reporte', search: true)
        ->column(name: 'date_end', title: 'Fecha fin incapacidad', search: true)
        ->column(name: 'status', title: 'Estado', search: true)
        ->column(name: 'services.date_ser', title: 'Fecha', search: true)
    //     ->column(name: 'action', title: 'Action', callback: function ($item) {
    //     return view('user.action', ['item' => $item])->render();
    // }, formatter: 'html')
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    }
  
}


