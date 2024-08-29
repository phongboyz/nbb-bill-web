<?php

namespace App\Livewire\Bill\Aon;

use Livewire\Component;
use App\Models\BhaiaonInside;

class EditComponent extends Component
{

    public $no, $type = 'OSD', $branch_send, $name_aon, $acno_nee, $money, $money_name,
    $name_hub, $acno_mee, $branch_receive, $note, $start;
    public $hiddenId;
    public $hideText;

    public function mount($id){
        $this->hiddenId = $id;
        $bm = BhaiaonInside::find($id);
        $this->type = $bm->type;
        $this->branch_send = $bm->branch_send;
        $this->name_aon = $bm->name_aon;
        $this->acno_nee = $bm->acno_nee;
        $this->money = number_format($bm->money);
        $this->money_name = $bm->money_name;
        $this->name_hub = $bm->name_hub;
        $this->acno_mee = $bm->acno_mee;
        $this->branch_receive = $bm->branch_receive;
        $this->note = $bm->note;
        $this->start = $bm->valuedt;
    }

    public function render()
    {
        return view('livewire.bill.aon.edit-component');
    }

    public function generate(){
        if(!empty($this->money)){
            $moneys = str_replace(',', '', $this->money);
            if (intval($moneys)) {
                $this->money_name = $this->convert($moneys);
            }else{
                $this->dispatch('alert',type: 'error', message:'ກະລຸນາປ້ອນຈຳນວນເງິນເປັນຕົວເລກ!');
            }
        }else{
            $this->money_name = null;
        }
    }


    public function convert($moneys){
        $numbers = $moneys;
        $digit=array('','ໜຶ່ງ','ສອງ','ສາມ','ສີ່','ຫ້າ','ຫົກ','ເຈັດ','ແປດ','ເກົ້າ','ສິບ');
        $num=array('','ສິບ','ຮ້ອຍ','ພັນ','ສິບພັນ','ແສນ','ລ້ານ','ສິບ','ຮ້ອຍ','ຕື້','ສິບ','ຮ້ອຍຕື້','ພັນ','ສິບ','ຮ້ອຍ');
        $number = explode(".",$numbers);
        $count = count($number);
        $convert='';
        $c_num[0]=$len=strlen($number[0]);
        $minus_len = 0;
        $minus = [];
        //ຄິດໄລ່ຈຳນວນເຕັມ
        for($n=0;$n< $len;$n++){
            $c_num[0]--;
            $c = $n;
            $c_digit=substr($number[0],$n,1);
            $c_digit2=substr($number[0],$c-1,1);
            $c_digit3=substr($number[0],$c+1,1);
            $c_digit4=substr($number[0],$c+2,1);
            $c_digit5=substr($number[0],$c+3,1);
            $c_digit6=substr($number[0],$c+4,1);

            $minus_len = $len - $n;
            // dd($len-$n);
            if($c_num[0]==0 && $c_digit==1 && $c_digit2!=0)$digit[$c_digit]='ເອັດ';
            if($c_num[0]==0 && $c_digit==1 && $c_digit2==0)$digit[$c_digit]='ໜຶ່ງ';
            if($c_num[0]==0 && $c_digit==2)$digit[$c_digit]='ສອງ';
            if($c_num[0]==1 && $c_digit==1)$digit[$c_digit]='';
            if($c_num[0]==1 && $c_digit==2)$digit[$c_digit]='ຊາວ';

            if($c_num[0]==2 && $c_digit==1)$digit[$c_digit]='ໜຶ່ງ';

            if($c_num[0]==3 && $c_digit==1 && $c_digit2!=0)$digit[$c_digit]='ເອັດ';
            if($c_num[0]==3 && $c_digit==1 && $c_digit2==0)$digit[$c_digit]='ໜຶ່ງ';
            if($c_num[0]==4 && $c_digit==1)$digit[$c_digit]='';
            if($c_num[0]==4 && $c_digit==2)$digit[$c_digit]='ຊາວ';

            if($c_num[0]==5 && $c_digit==1)$digit[$c_digit]='ໜຶ່ງ';

            if($c_num[0]==6 && $c_digit==1 && $c_digit2!=0)$digit[$c_digit]='ເອັດ';
            if($c_num[0]==6 && $c_digit==1 && $c_digit2==0)$digit[$c_digit]='ໜຶ່ງ';
            if($c_num[0]==7 && $c_digit==1)$digit[$c_digit]='';
            if($c_num[0]==7 && $c_digit==2)$digit[$c_digit]='ຊາວ';

            if($c_num[0]==8 && $c_digit==1)$digit[$c_digit]='ໜຶ່ງ';

            if($c_num[0]==9 && $c_digit==1 && $c_digit2!=0)$digit[$c_digit]='ເອັດ';
            if($c_num[0]==9 && $c_digit==1 && $c_digit2==0)$digit[$c_digit]='ໜຶ່ງ';
            if($c_num[0]==10 && $c_digit==1)$digit[$c_digit]='';
            if($c_num[0]==10 && $c_digit==2)$digit[$c_digit]='ຊາວ';

            if($c_num[0]==11 && $c_digit==1)$digit[$c_digit]='ໜຶ່ງ';

            if($c_num[0]==12 && $c_digit==1 && $c_digit2!=0)$digit[$c_digit]='ເອັດ';
            if($c_num[0]==12 && $c_digit==1 && $c_digit2==0)$digit[$c_digit]='ໜຶ່ງ';
            if($c_num[0]==13 && $c_digit==1)$digit[$c_digit]='';
            if($c_num[0]==13 && $c_digit==2)$digit[$c_digit]='ຊາວ';

            $convert.=$digit[$c_digit];
 
            if($digit[$c_digit] != 'ຊາວ' && $c_digit!=0){
                $convert.=$num[$c_num[0]];
            }
        }

        if($count == 1){
            $convert .= 'ກິບ';
            $convert .= 'ຖ້ວນ';
        }
        if($count > 1){
            $c_num[1]=$len2=strlen($number[1]);
            //ຄິດໄລ່ຈຸດທົດສະນິຍົມ
            for($n=0;$n< $len2;$n++){
                $c_num[1]--;
                $c_digit=substr($number[1],$n,1);
                $c_digit2=substr($number[1],$n-1,1);
                
                if($c_num[1]==1)$convert .= 'ຈຸດ';
                if($c_num[1]==0 && $c_digit==1 && $c_digit2!=0)$digit[$c_digit]='ເອັດ';
                if($c_num[1]==0 && $c_digit==1 && $c_digit2==0)$digit[$c_digit]='ໜຶ່ງ';
                if($c_num[1]==0 && $c_digit==2)$digit[$c_digit]='ສອງ';
                if($c_num[1]==1 && $c_digit==2)$digit[$c_digit]='ຊາວ';
                if($c_num[1]==1 && $c_digit==1)$digit[$c_digit]='';
                
                $convert.=$digit[$c_digit];
                // dd($c_num[1]);
                if($digit[$c_digit] != 'ຊາວ' && $c_digit!=0)$convert.=$num[$c_num[1]];
            }
            if($number[1]!='')$convert .= 'ອັດ';
        }
        return $convert;
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
        $money = str_replace(',', '', $this->money);
        if (intval($money)) {
                $bm = BhaiaonInside::find($this->hiddenId);
                $bm->valuedt = $this->start;
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
                $bm->del = 1;
                $bm->save();
        
                session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
                
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
