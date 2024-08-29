<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນໃບຖອນເງິນສົດ</li>
                    </ol>
                </div>
                <h4 class="page-title">ຂໍ້ມູນໃບຖອນເງິນສົດ</h4>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12 QA_section">
            <div class="card QA_table ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('bill-thon')}}" class="btn btn-danger float-end">ກັບຄືນ</a>
                            @if($data['del'] != 0)
                            <a href="{{route('pdf-mop',$hidId)}}" target="_bank"
                                class="btn btn-primary float-end mx-2">ພິມບິນ</a>
                            @endif
                        </div>
                        <div class="col-9 text-right">
                            ວັນທີ :
                            <strong>{{date('d/m/Y H:i:s', strtotime($data['created_at']))}}</strong>
                            <span class="float-end"> <strong>ສະຖານະ:</strong> <span class="text-danger">@if($data['del']
                                    == 1)
                                    ລໍຖ້າປິ່ນ @elseif($data['del'] == 2) ປິ່ນສຳເລັດ @else ຍົກເລີກ @endif</span></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">

                            <table width="100%">
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    </td>
                                </tr>
                            </table> <br>
                            <table width="100%">
                                <tr>
                                    <td width="30%" rowspan="11">
                                        <table border="1" width="100%">
                                            <tr>
                                                <td class="td-border1 text-center py-2" colspan="2">
                                                    ລາຍລະອຽດ / Details
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="py-2">
                                                    ປະເພດໃບ <br> Deno
                                                </td>
                                                <td class="py-2">
                                                    ຈຳນວນເງິນ <br> Amount
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">100,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->san,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">50,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->has,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">20,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->sow,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">10,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->sip,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">5,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->har,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">2,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->sng,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">1,000</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->nung,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="timenewroman-font py-2">500</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->hal,0,'.',',')}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="py-2">ລວມ / Total</td>
                                                <td class="timenewroman-font py-2">
                                                    {{number_format($data->san + $data->has + $data->sow + $data->sip + $data->har + $data->sng + $data->nung +$data->hal,0,'.',',')}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="70%">
                                        <table width="100%">
                                            <tr>
                                                <td width="50%" class="text-center">
                                                    <p
                                                        style="font-size:28px;"><b>ໃບຖອນເງິນສົດ</b></p>
                                                    <p 
                                                        style="font-size:14px;"><b>CASH PAID OUT</b></p>
                                                </td>
                                                <td width="50%" class="text-right">
                                                    <p style="font-size:14px;">
                                                        
                                                            ເລກທີ / Bill No: ............
                                                       
                                                    </p>
                                                    <p style="font-size:14px;">
                                                       
                                                            ວັນທີ / Date
                                                            {{date('d / m / Y',strtotime($data->valuedt))}}
                                                        
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <p style="line-height:5px">ຊື່ບັນຊີ</p>
                                                    <p style="line-height:0px">Name of A/C</p>
                                                </td>
                                                <td class="text-center" width="90.5%">
                                                    <p style="line-height:5px; color: red;">
                                                        {{$data->acname}}</p>
                                                    <p style="line-height:0px">
                                                        <hr>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td width="10%">
                                                    <p style="line-height:5px">ເລກບັນຊີ</p>
                                                    <p style="line-height:0px" class="timenewroman-font">Account No </p>
                                                </td>
                                                <td class="td-border1">
                                                    <p style="line-height:0px;padding-left: 200px;padding-top:15px;color:red;"
                                                        class="timenewroman-font">{{$data->acno}} </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td width="10%">
                                                    <p style="line-height:5px;padding-top: 5px;">ສະກຸນເງິນ</p>
                                                    <p style="line-height:0px" class="timenewroman-font">Currency Code
                                                    </p>
                                                </td>
                                                <td width="20%" class="td-border1">
                                                    <p style="line-height:0px;padding-left: 50px;padding-top:15px;">
                                                        {{$data->crc}} </p>
                                                </td>
                                                <td width="10%">
                                                    <p style="line-height:5px;padding-left: 10px;padding-top: 5px;">
                                                        ຈຳນວນເງິນ</p>
                                                    <p style="line-height:0px;padding-left: 10px;"
                                                        class="timenewroman-font">Amount</p>
                                                </td>
                                                <td class="td-border1">
                                                    <p style="line-height:0px;padding-left: 200px;padding-top:15px;color:red;"
                                                        class="timenewroman-font">#{{number_format($data->money)}}#</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td width="20%">
                                                    <p style="line-height:5px; padding-top: 5px;">
                                                        ຈຳນວນເງິນຂຽນເປັນຕົວໜັງສື</p>
                                                    <p style="line-height:0px" class="timenewroman-font">Anount in words
                                                    </p>
                                                </td>
                                                <td class="td-border1">
                                                    <p
                                                        style="line-height:0px;padding-left: 200px;padding-top:15px;color:red;">
                                                        ({{$data->money_name}})</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p style="line-height:5px">ຄ່າທຳນຽມ</p>
                                                                <p style="line-height:0px">Fee</p>
                                                            </td>
                                                            <td width="85%" class="text-center">
                                                                <p style="line-height:5px; color: red;">
                                                                    {{number_format($data->fees)}}</p>
                                                                <p style="line-height:0px">
                                                                    <hr>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p style="line-height:5px">ເລກບັນຊີ</p>
                                                                <p style="line-height:0px">A/C No</p>
                                                            </td>
                                                            <td class="text-center" width="90%">
                                                                <p style="line-height:5px; color: red;">
                                                                    {{$data->acno2}}</p>
                                                                <p style="line-height:0px">
                                                                    <hr>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>