<?php

namespace App\Livewire\Bill\Aon;

use Livewire\Component;
use App\Models\BhaiaonInside;
use App\Http\Controllers\NumberToStringController;

class CreateComponent extends Component
{
    public $no, $type = 'OSD', $branch_send, $name_aon, $acno_nee, $money, $money_name,
    $name_hub, $acno_mee, $branch_receive, $note, $start;
    public $hiddenId;
    public $hideText;

    public function mount(){
        $this->start = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.bill.aon.create-component');
    }

    public function changeType(){
        if($this->type == 'OSD'){
            $this->hideText = null;
        }else{
            $this->hideText = 'none';
        }
    }

    public function generate(){
        if(!empty($this->money)){
            $moneys = str_replace(',', '', $this->money);
            if (intval($moneys)) {
                $translate = new NumberToStringController();
                $result = $translate->convert($moneys);
                $this->money_name = $result;
            }else{
                $this->dispatch('alert',type: 'error', message:'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!');
            }
        }else{
            $this->money_name = null;
        }
    }

    public function resetField()
    {
            $this->type = '';
            $this->branch_send = '';
            $this->name_aon = '';
            $this->acno_nee = '';
            $this->money = '';
            $this->money_name = '';
            $this->name_hub = '';
            $this->acno_mee = '';
            $this->branch_receive = '';
            $this->note = '';
            $this->hiddenId = '';
            $this->start = '';
    }

    public function store(){
        $this->validate([
            'start'=>'required',
        ],[
            'start.required'=>'ກະລຸນາເລືອກ ວັນທີເລີ່ມຕົ້ນ ກ່ອນ!',
        ]);
        $money = str_replace(',', '', $this->money);
        if (intval($money)) {
                $bm = new BhaiaonInside();
                $bm->valuedt = $this->start;
                $bm->no = 255124;
                $bm->type = $this->type;
                $bm->branch_send = $this->branch_send;
                $bm->name_aon = $this->name_aon;
                $bm->acno_nee = $this->acno_nee;
                $bm->money = $money;
                $bm->money_name = $this->money_name;
                $bm->name_hub = $this->name_hub;
                $bm->acno_mee = $this->acno_mee;
                $bm->branch_receive = $this->branch_receive;
                $bm->note = $this->note;
                $bm->user_id = auth()->user()->id;
                $bm->department_id = auth()->user()->dpart_id;
                $bm->save();
        
                session()->flash('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ');
                if($this->type == 'OSD'){
                    return redirect(route('print-aon',$bm->id));
                }else{
                    return redirect(route('print-aon-old',$bm->id));
                }
            
            $this->resetField();
        }else{
            $this->dispatch('alert',type: 'error', message:'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!');
        }
    }

}
