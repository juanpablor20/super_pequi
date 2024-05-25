<?php
namespace App\Tables;

use App\Models\Program;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class ProgrmasTable extends DataTable


{
    public function __construct()
    {
        $this->setDataSource(
            Program::select(
                'names_pro',
                 'code_pro',
                  'version',
                  'states')
                 
                  )
        ->column(name: 'id', title: 'Id')
        ->column(name: 'names_pro', title: 'Nombre del Programa', search: true)
        ->column(name: 'code_pro', title: 'Codigo', search: true)
        ->column(name: 'version', title: 'Version', search: true)
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


