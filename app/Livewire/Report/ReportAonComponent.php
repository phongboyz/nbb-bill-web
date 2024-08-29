<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\BhaiaonInside;
use App\Exports\AonExport;

class ReportAonComponent extends Component
{
    public $data = [];
    public $start, $end, $starts, $ends;
    public $show = 'none';

    public function render()
    {
        return view('livewire.report.report-aon-component');
    }

    public function searchData(){
        $this->validate([
            'start'=>'required',
            'end'=>'required',
        ],[
            'start.required'=>'ກະລຸນາເລືອກ ວັນທີເລີ່ມຕົ້ນ ກ່ອນ!',
            'end.required'=>'ກະລຸນາປເລືອກ ວັນທີສິ້ນສຸດ ກ່ອນ!',
        ]);
            $this->show = 'show';
            $this->starts = $this->start;$this->ends = $this->end;
            $this->data = BhaiaonInside::whereBetween('valuedt',[$this->starts, $this->ends])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
    }

    public function exportExcel()
    {
        return (new AonExport($this->data))->download('excel-aon.xlsx');
    }
}
