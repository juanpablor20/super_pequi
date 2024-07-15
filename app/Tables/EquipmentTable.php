<?php

namespace App\Tables;

use App\Models\Equipment;

use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class EquipmentTable extends DataTable
{
    public function __construct()
    {
        $this->setDataSource(Equipment::select('id', 'type_equi', 'characteristics', 'serie_equi', 'states'))
        ->column(name: 'id', title: 'Id')
        ->column(name: 'type_equi', title: 'Tipo de Equipo', search: true)
        ->column(name: 'characteristics', title: 'Caracteristicas', search: true)
        ->column(name: 'serie_equi', title: 'Numero de Serie', search: true)
        ->column(name: 'states', title: 'Estado', search: true)
        ->column(name: 'action', title: 'Action', callback: function ($item) {
            return view('equipment.action', ['item' => $item])->render();
        }, formatter: 'html')
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    }
    
   
   
}
