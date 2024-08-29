<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\BhaiThon;
use App\Exports\ThonExport;

class ReportThonComponent extends Component
{
    public $data = [];
    public $start, $end, $starts, $ends;
    public $show = 'none';

    public function render()
    {
        return view('livewire.report.report-thon-component');
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
            $this->data = BhaiThon::whereBetween('valuedt',[$this->starts, $this->ends])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
    }

    public function exportExcel()
    {
        return (new ThonExport($this->data))->download('excel-thon.xlsx');
    }
}
