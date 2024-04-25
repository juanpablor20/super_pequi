<?php

namespace App\Tables;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class EquipmentTables extends DataTable
{
    public function __construct()
    {

        $this->setDataSource(Equipment::select('id', 'product_name', 'product_code', 'product_price'))
            ->column(name: 'id', title: 'SN')
            ->column(name: 'product_name', title: 'Name', search: true)
            ->column(name: 'product_code', title: 'Code', search: true)
            ->column(name: 'product_price', title: 'Price', search: true)
            ->column(name: 'action', title: 'Action', callback: function ($item) {
                return view('common.action', ['item' => $item])->render();
            }, formatter: 'html')
            ->setExportTypes([ExportType::CSV, ExportType::PDF, ExportType::XLS])
            ->paginate(10);
    }
    // public function __construct()
    // {
    //     $this->setDataSource(Equipment::query())
    //         ->paginate(10);
    // }

}

