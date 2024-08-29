<?php

namespace App\Livewire\Corebanking;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CustomerComponent extends Component
{
    public $show ="none";
    public $branch_id, $start, $end;
    public $data = [], $data_cus_info = [];

    public function render()
    {
        return view('livewire.corebanking.customer-component');
    }

    public function searchData(){
        $this->validate([
            'branch_id'=>'required',
            'start'=>'required',
            'end'=>'required',
        ],[
            'branch_id.required'=>'ກະລຸນາເລືອກ ສາຂາ ກ່ອນ!',
            'start.required'=>'ກະລຸນາເລືອກ ວັນທີເລີ່ມຕົ້ນ ກ່ອນ!',
            'end.required'=>'ກະລຸນາປເລືອກ ວັນທີສິ້ນສຸດ ກ່ອນ!',
        ]);

        $this->show = 'show';
        $this->data = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOnsiYXV0aF9pZCI6NSwiYXV0aF9uYW1lIjoibmJiIiwiYXV0aF9wYXNzIjoiJDJiJDEwJHptUWltdTBCOHI2UmRBWHI5OEc1ZWVwVWJ0a0djVk5SZFdqbGRLMS5vWnUzQTRGSEJFaVRxIiwiYXV0aF9zdGFydCI6IjIwMjMtMDktMTRUMDY6MDk6MDQuMDAwWiJ9LCJpYXQiOjE3MjM1MjMwODksImV4cCI6MTczMTI5OTA4OX0.JujhcWn8DEMZeeBKp3-gDTpmvgfERhkCqbp3752a-5Y')
        ->post('192.168.10.55:6601/nbb/api/crd/get-schedule', [
            "auth_id" => 5,
            "auth_name" => "nbb",
            "branchid" => "0301",
            "fromDate" => date('m-d-Y',strtotime($this->start)),
            "toDate" => date('m-d-Y',strtotime($this->end))
        ])->json();
        
        dd($this->data);

        if($this->data['success'] == 0){
            $this->data = [];
        }
    }
}
