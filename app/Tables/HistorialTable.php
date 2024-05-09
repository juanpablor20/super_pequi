<?php

namespace App\Tables;

use App\Models\Service;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class HistorialTable extends DataTable
{
    public function __construct()
    {
        
        $this->setDataSource(Service::with('equipment')->select('services.id', 'equipment_id', 'services.user_borrower_id', 'services.user_returner_id', 'services.librarian_borrower_id', 'services.librarian_returner_id', 'services.date_ser', 'services.return_ser', 'services.status', 'services.environment_id'))
        ->column(name: 'equipment.serie_equi', title: 'Número de Serie', search: true)
        ->column(name: 'user_borrower_id', title: 'Caracteristicas', search: true)
        ->column(name: 'user_returner_id', title: 'users', search: true)
        ->column(name: 'librarian_borrower_id', title: 'Estado', search: true)
        ->column(name: 'librarian_returner_id', title: 'user', search: true)
        ->column(name: 'date_ser', title: 'Estado', search: true)
        ->column(name: 'return_ser', title: 'Estado', search: true)
        ->column(name: 'status', title: 'Estado', search: true)
        ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
        ->paginate(10);
    
    }
}
