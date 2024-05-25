<?php
namespace App\Tables;

use App\Models\Environment;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class AmbientesTable extends DataTable


{
    public function __construct()
    {
        $this->setDataSource(
            Environment::select(
                'id',
                 'names',
                  'states')
                 
                  )
        ->column(name: 'id', title: 'Id')
        ->column(name: 'names', title: 'Nombre del Ambiente', search: true)
        ->column(name: 'states', title: 'Estado', search: true)
        
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    }
    
protected function getColumns()
{
return [
    'id',
    'number',
    'states',
  
    
    'action_export' => [
        'title' => 'Acción Export',
        'exportOnly' => true
    ]
];
}
}


