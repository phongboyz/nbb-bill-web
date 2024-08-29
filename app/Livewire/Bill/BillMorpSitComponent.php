<?php

namespace App\Livewire\Bill;

use Livewire\Component;
use App\Models\BhaiMorpSit;

class BillMorpSitComponent extends Component
{
    public $data, $count;
    public $search, $dataQ = 15, $dateS, $dateE;
    public $hiddenId;

    public function render()
    {
        $this->data = BhaiMorpSit::whereAny(['no','name_aon','phone','aon_ac_name','acno_nee'],'LIKE','%'.$this->search.'%')->where('user_id',auth()->user()->id)->orderBy('id','desc')->limit($this->dataQ)->get();
        $this->count = count(BhaiMorpSit::whereAny(['no','name_aon','phone','aon_ac_name','acno_nee'],'LIKE','%'.$this->search.'%')->where('user_id',auth()->user()->id)->limit($this->dataQ)->get());
        return view('livewire.bill.bill-morp-sit-component');
    }

    public function searchData(){
        if(!empty($this->dateS)){
            if($this->search){
                $this->data = BhaiMorpSit::whereAny(['no','name_aon','phone','aon_ac_name','acno_nee'],'LIKE','%'.$this->search.'%')->where('valuedt','like','%'.$this->date.'%')->where('user_id',auth()->user()->id)->orderBy('id','desc')->limit($this->dataQ)->get();
                $this->count = count(BhaiMorpSit::whereAny(['no','name_aon','phone','aon_ac_name','acno_nee'],'LIKE','%'.$this->search.'%')->where('valuedt','like','%'.$this->date.'%')->where('user_id',auth()->user()->id)->limit($this->dataQ)->get());
            }else{
                $this->data = BhaiMorpSit::where('valuedt','like','%'.$this->date.'%')->where('user_id',auth()->user()->id)->orderBy('id','desc')->limit($this->dataQ)->get();
                $this->count = count(BhaiMorpSit::where('valuedt','like','%'.$this->date.'%')->where('user_id',auth()->user()->id)->limit($this->dataQ)->get());
            }
        }else{
            $this->data = BhaiMorpSit::whereAny(['no','name_aon','phone','aon_ac_name','acno_nee'],'LIKE','%'.$this->search.'%')->where('user_id',auth()->user()->id)->orderBy('id','desc')->limit($this->dataQ)->get();
            $this->count = count(BhaiMorpSit::whereAny(['no','name_aon','phone','aon_ac_name','acno_nee'],'LIKE','%'.$this->search.'%')->where('user_id',auth()->user()->id)->limit($this->dataQ)->get());
        }
    }
    
    public function delete($ids)
    {
        $this->hiddenId = $ids;
        $this->dispatch('show-modal-delete');
    }

    public function destroy()
    {
        $doc = BhaiMorpSit::find($this->hiddenId);
        $doc->del = 0;
        $doc->save();
        $this->dispatch('hide-modal-delete');
        $this->dispatch('alert', type: 'success', message: 'ລົບຂໍ້ມູສຳເລັດ');
    }
}
