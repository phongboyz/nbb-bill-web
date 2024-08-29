<div>

<div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ລາຍງານ</li>
                    </ol>
                </div>
                <h4 class="page-title">ລາຍງານຂໍ້ມູນໃບຖອນ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <div>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-primary phetsarath-font">ວັນທີ</button>
                                    </span>
                                    <input type="date" name="start" id="start"
                                        class="form-control @error('start') is-invalid @enderror" wire:model="start">
                                    @error('start') <span style="color: red"
                                        class="error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-primary phetsarath-font">ຫາ</button>
                                    </span>
                                    <input type="date" name="end" id="end"
                                        class="form-control @error('end') is-invalid @enderror" wire:model="end">
                                    @error('end') <span style="color: red" class="error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <button class="btn btn-info phetsarath-font" wire:click="searchData"><i
                                class="mdi mdi-file-document-box-outline"></i>
                            ສະແດງ</button>

                            <button class="btn btn-success phetsarath-font" wire:click="exportExcel"><i
                                class="mdi mdi-file-excel"></i>
                        </button>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <div class="right_content">
                    <div class="row" style="display: {{$show}};">
                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 text-center">
                                    <span>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</span><br>
                                    <span>ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</span><br>
                                    -----------&&&-----------
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <img src="{{asset('logo/logo-nbb.png')}}" alt="" height="100px">
                                        </div>
                                        <div class="col-md-6">
                                            ທະນາຄານ ນະໂຍບາຍ
                                        </div>
                                        <div class="col-md-6 text-right">
                                            ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ: {{date('d/m/Y',strtotime(now()))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center py-4">
                                    <h4><b class="phetsarath-font text-black"
                                            style="color: black;"><u>ລາຍງານຂໍ້ມູນໃບຖອນເງິນສົດ</u></b></h4>
                                    <p class="py-1">
                                        ແຕ່ວັນທີ @if($starts) {{date('d/m/Y', strtotime($starts))}} @else
                                        ..........................@endif ຫາ @if($ends)
                                        {{date('d/m/Y', strtotime($ends))}}
                                        @else .......................... @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-12">
                                    <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2"> ລຳດັບ </th>
                                            <th class="p-2"> ວັນທີ </th>
                                            <th class="p-2"> ລະຫັດ </th>
                                            <th class="p-2"> ຊື່ຜູ້ຖອນ </th>
                                            <th class="p-2"> ເລກບັນຊີ </th>
                                            <th class="p-2"> ຈຳນວນເງິນ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($data as $key => $item)
                                        <tr>
                                            <td class="text-center p-2">{{$no++}}</td>
                                            <td class="text-center p-2">
                                                {{date('d/m/Y', strtotime($item->valuedt))}}</td>
                                            <td class="text-center p-2">{{$item->no}}</td>
                                            <td class="text-center p-2">{{$item->acname}}</td>
                                            <td class="text-center p-2">{{$item->acno}}</td>
                                            <td class="text-right p-2" style="text-align: right;">
                                                {{number_format($item->money)}}</td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td class="p-2" colspan="8" style="color: #787878;">ບໍ່ມີຂໍ້ມູນໃບຖອນເງິນສົດ</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
