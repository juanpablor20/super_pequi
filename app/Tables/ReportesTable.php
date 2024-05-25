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
                  'services.user_returner_id as Servicio')

                  ->join('services', 'disabilities.service_id', '=', 'service_id')

                  )
        ->column(name: 'id', title: 'Id')
        ->column(name: 'description', title: 'Descripcion', search: true)
        ->column(name: 'punishment_date', title: 'Fecha del Reporte', search: true)
        ->column(name: 'date_end', title: 'Fecha fin incapacidad', search: true)
        ->column(name: 'status', title: 'Estado', search: true)
        ->column(name: 'services.user_returner_id', title: 'Usuario', search: true)
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    }
    
// protected function getColumns()
// {
// return [
//     'id',
//     'description',
//     'punishment_date',
//     'date_end',
    
//     'action_export' => [
//         'title' => 'Acción Export',
//         'exportOnly' => true
//     ]
// ];
// }
}


