<?php

namespace App\Exports;

use App\Models\BhaiaonInside;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use DB;

class AonExport implements FromView
{
    use Exportable;
    protected $datas;

    public function __construct($data)
    {
        $this->datas = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('livewire.report.excel.excel-aon', [
            'data' => $this->datas,
        ]);
    }
}
