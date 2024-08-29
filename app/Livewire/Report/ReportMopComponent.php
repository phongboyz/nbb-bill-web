<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\BhaiMorp;
use App\Exports\MopExport;

class ReportMopComponent extends Component
{
    public $data = [];
    public $start, $end, $starts, $ends;
    public $show = 'none';

    public function render()
    {
        return view('livewire.report.report-mop-component');
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
            $this->data = BhaiMorp::whereBetween('valuedt',[$this->starts, $this->ends])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
    }

    public function exportExcel()
    {
        return (new MopExport($this->data))->download('excel-mop.xlsx');
    }
}
