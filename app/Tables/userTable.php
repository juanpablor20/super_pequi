<?php

namespace App\Tables;

use App\Models\Users;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class UserTable extends DataTable
{
    public function __construct()
    {
        $this->setDataSource(Users::select('id', 'names', 'last_name', 'type_identification', 'number_identification', 'sex_user', 'states'))
            ->column(name: 'id', title: 'Id', search: true)
            ->column(name: 'names', title: 'Nombre', search: true)
            ->column(name: 'last_name', title: 'Apellido', search: true)
            ->column(name: 'type_identification', title: 'Tipo doc', search: true)
            ->column(name: 'number_identification', title: 'Numero de Identificacion', search: true)  // Corrección del error tipográfico
            ->column(name: 'sex_user', title: 'Sexo', search: true)
            ->column(name: 'states', title: 'Estado', search: true)
            ->column(name: 'action', title: 'Acción', callback: function ($item) {
                return view('user.action', ['item' => $item])->render();
            }, formatter: 'html')
            ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
            ->paginate(10);
    }
}


