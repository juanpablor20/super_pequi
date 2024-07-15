<?php
namespace App\Tables;

use App\Models\IndexCard;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class FichasTable extends DataTable


{
    public function __construct()
    {
        $this->setDataSource(
            IndexCard::select(
                'index_cards.id',
                 'index_cards.number',
                  'index_cards.states',
                  'programs.names_pro as Programa')
                  
                  ->join('programs', 'index_cards.program_id', '=', 'program_id')
                  
                  )
        ->column(name: 'id', title: 'Id')
        ->column(name: 'number', title: 'Ficha', search: true)
        ->column(name: 'states', title: 'Estado', search: true)
        ->column(name: 'programs.names_pro', title: 'programa', search: true)
            ->column(name: 'action', title: 'Action', callback: function ($item) {
        return view('index-card.action', ['item' => $item])->render();
    }, formatter: 'html')
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    }
    
protected function getColumns()
{
return [
    'id',
    'number',
    'states',
    'programs.names',
    
    'action_export' => [
        'title' => 'Acción Export',
        'exportOnly' => true
    ]
];
}
}


