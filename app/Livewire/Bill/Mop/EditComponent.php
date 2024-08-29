<?php

namespace App\Livewire\Bill\Mop;

use Livewire\Component;
use App\Models\BhaiMorp;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\NumberToStringController;

class EditComponent extends Component
{
    public $hiddenId;
    public $hideText = 'none', $check;
    public $searchCus = '0508099576', $data_search1, $data_serach2, $data_serach_cus, $data_search_cus_acno;
    public $name_mop, $tel, $address, $acno_fak;
    public $money, $money_name, $crc = 'LAK';
    public $san, $has, $sow, $sip, $har, $sng, $nug, $hal;
    public $san2, $has2, $sow2, $sip2, $har2, $sng2, $nug2, $hal2;
    public $name_hub, $address_hub, $tel_hub, $card_no, $card_type, $branch_name, $unit, $acno_hub, $bank_name, $bank_no, $money_fees, $lek_ac;

    public function mount($id){
        $bm = BhaiMorp::find($id);
        $this->hiddenId = $id;
        $this->san = number_format($bm->san);
        $this->has = number_format($bm->has);
        $this->sow = number_format($bm->sow);
        $this->sip = number_format($bm->sip);
        $this->har = number_format($bm->har);
        $this->sng = number_format($bm->sng);
        $this->nug = number_format($bm->nug);
        $this->hal = number_format($bm->hal);

        $this->san2 = $bm->san;
        $this->has2 = $bm->has;
        $this->sow2 = $bm->sow;
        $this->sip2 = $bm->sip;
        $this->har2 = $bm->har;
        $this->sng2 = $bm->sng;
        $this->nug2 = $bm->nug;
        $this->hal2 = $bm->hal;

        $this->name_mop = $bm->name_mop;
        $this->address = $bm->address;
        $this->tel = $bm->tel;
        $this->detail = $bm->detail;
        $this->acno_fak = $bm->acno_fak;
        $this->money = $bm->money;
        $this->money_name = $bm->money_name;
        $this->crc = $bm->acno_kou;
        
        $this->type = $bm->type;
        if($bm->type == 'AON'){
            $this->check = true;
            $this->addAon();
        }
        
        $this->name_hub = $bm->name_hub;
        $this->address_hub = $bm->address_hub;
        $this->tel_hub = $bm->tel_hub;
        $this->card_no = $bm->card_no;
        $this->card_type = $bm->card_type;
        $this->branch_name = $bm->branch_name;
        $this->unit = $bm->unit;
        $this->acno_hub = $bm->acno_hub;
        $this->bank_name = $bm->bank_name;
        $this->bank_no = $bm->bank_no;
        $this->money_aon = $bm->money_aon;
        $this->lek_ac = $bm->lek_ac;
    }

    public function render()
    {
        return view('livewire.bill.mop.edit-component');
    }

    
    public function searchCusData(){

        $this->data_search1 = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOnsiYXV0aF9pZCI6NSwiYXV0aF9uYW1lIjoibmJiIiwiYXV0aF9wYXNzIjoiJDJiJDEwJHptUWltdTBCOHI2UmRBWHI5OEc1ZWVwVWJ0a0djVk5SZFdqbGRLMS5vWnUzQTRGSEJFaVRxIiwiYXV0aF9zdGFydCI6IjIwMjMtMDktMTRUMDY6MDk6MDQuMDAwWiJ9LCJpYXQiOjE3MjM1MjMwODksImV4cCI6MTczMTI5OTA4OX0.JujhcWn8DEMZeeBKp3-gDTpmvgfERhkCqbp3752a-5Y')
        ->post('192.168.10.55:6604/nbb/api/ctm/get/info', [
            "auth_id" => "5",
            "auth_name" => "nbb",
            "ctmcode" => $this->searchCus
        ])->json();

        $this->data_search2 = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOnsiYXV0aF9pZCI6NSwiYXV0aF9uYW1lIjoibmJiIiwiYXV0aF9wYXNzIjoiJDJiJDEwJHptUWltdTBCOHI2UmRBWHI5OEc1ZWVwVWJ0a0djVk5SZFdqbGRLMS5vWnUzQTRGSEJFaVRxIiwiYXV0aF9zdGFydCI6IjIwMjMtMDktMTRUMDY6MDk6MDQuMDAwWiJ9LCJpYXQiOjE3MjM1MjMwODksImV4cCI6MTczMTI5OTA4OX0.JujhcWn8DEMZeeBKp3-gDTpmvgfERhkCqbp3752a-5Y')
        ->post('192.168.10.55:6604/nbb/api/ctm/get/credit', [
            "auth_id" => "5",
            "auth_name" => "nbb",
            "ctmcode" => $this->searchCus
        ])->json();

        $this->name_mop = $this->data_search1['fullname'];
        $this->tel = $this->data_search1['mphone']['HP'];
        $this->address = $this->data_search1['address'];
        $this->acno_fak = $this->data_search2['0']['acno'];
        $this->dispatch('alert', type: 'success', message: 'ຄົ້ນຫາສຳເລັດ');
        // dd($this->data_search1);

    }

    public function addAon(){
        if($this->check == true){
            $this->hideText = 'show';
        }else{
            $this->hideText = 'none';
        }
    }

    public function addMoney(){
        $this->dispatch('show-addmoney');
    }

    public function storeMoney(){
        if(!empty($this->san) || !empty($this->has) || !empty($this->sow) || !empty($this->sip) || !empty($this->har) || !empty($this->sng) || !empty($this->nug) || !empty($this->hal)){
            $sans = 0; $hass = 0; $sows = 0; $sips = 0; $hars = 0; $sngs = 0; $nugs = 0; $hals = 0;

            if(!empty($this->san)){
                $sum = str_replace(',', '', $this->san);
                if (intval($sum)) {
                    $sans = $sum;
                    $this->san2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{ //------------------------------- 100.0000 -------------------------------//
                $sans = 0;
            }
    
            if(!empty($this->has)){
                $sum = str_replace(',', '', $this->has);
                if (intval($sum)) {
                    $hass = $sum;
                    $this->has2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $hass = 0;
            }
    
            if(!empty($this->sow)){
                $sum = str_replace(',', '', $this->sow);
                if (intval($sum)) {
                    $sows = $sum;
                    $this->sow2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $sows = 0;
            }
    
            if(!empty($this->sip)){
                $sum = str_replace(',', '', $this->sip);
                if (intval($sum)) {
                    $sips = $sum;
                    $this->sip2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $sips = 0;
            }
    
            if(!empty($this->har)){
                $sum = str_replace(',', '', $this->har);
                if (intval($sum)) {
                    $hars = $sum;
                    $this->har2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $hars = 0;
            }
    
            if(!empty($this->sng)){
                $sum = str_replace(',', '', $this->sng);
                if (intval($sng)) {
                    $sngs = $sum;
                    $this->sng2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $sngs = 0;
            }
    
            if(!empty($this->nug)){
                $sum = str_replace(',', '', $this->nug);
                if (intval($sum)) {
                    $nugs = $sum;
                    $this->nug2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $nugs = 0;
            }
    
            if(!empty($this->hal)){
                $sum = str_replace(',', '', $this->hal);
                if (intval($sum)) {
                    $hals = $sum;
                    $this->hal2 = $sum;
                }else{
                    $this->emit('alert', ['type' => 'warning', 'message' => 'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!']);
                }
            }else{
                $hals = 0;
            }
    
            $this->money = $sans + $hass + $sows + $sips + $hars + $sngs + $nugs + $hals;
    
            $translate = new NumberToStringController();
            $result = $translate->convert($this->money);
            $this->money_name = $result;
    
            $this->dispatch('hide-addmoney');
            $this->dispatch('alert', type: 'success', message: 'ບັນທຶກຈຳນວນເງິນສຳເລັດ');
        }else{
            $this->dispatch('alert', type: 'error', message: 'ກະລຸນາເພີ່ມຈຳນວນເງິນກ່ອນ');
        }
    }

    public function store(){

            $bm = BhaiMorp::find($this->hiddenId);
            if($this->san2)  $bm->san = $this->san2;
            if($this->has2)  $bm->has = $this->has2;
            if($this->sow2)  $bm->sow = $this->sow2;
            if($this->sip2)  $bm->sip = $this->sip2;
            if($this->har2)  $bm->har = $this->har2;
            if($this->sng2)  $bm->sng = $this->sng2;
            if($this->nug2)  $bm->nug = $this->nug2;
            if($this->hal2)  $bm->hal = $this->hal2;

            
            $bm->valuedt = date('Y-m-d H:i:s');
            $bm->name_mop = $this->name_mop;
            $bm->address = $this->address;
            $bm->tel = $this->tel;
            $bm->detail = $this->name_mop;
            $bm->acno_fak = $this->acno_fak;
            $bm->money = $this->money;
            $bm->money_name = $this->money_name;
            $bm->acno_kou = $this->crc;

            if($this->check == true){
                $bm->type = 'AON';
            }
            //-----------------------------//
    
            $bm->name_hub = $this->name_hub;
            $bm->address_hub = $this->address_hub;
            $bm->tel_hub = $this->tel_hub;
            $bm->card_no = $this->card_no;
            $bm->card_type = $this->card_type;
            $bm->branch_name = $this->branch_name;
            $bm->unit = $this->unit;
            $bm->acno_hub = $this->acno_hub;
            $bm->bank_name = $this->bank_name;
            $bm->bank_no = $this->bank_no;
            $bm->money_aon = $this->money_fees;
            $bm->lek_ac = $this->lek_ac;
            $bm->user_id = auth()->user()->id;
            $bm->department_id = auth()->user()->dpart_id;
            $bm->del = 1;
            $bm->save();
    
            session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
            return redirect(route('bill-morp'));
    }
}
