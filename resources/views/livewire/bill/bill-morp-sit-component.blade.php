<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນໃບມອບສິດການໂອນ</li>
                    </ol>
                </div>
                <h4 class="page-title">ຂໍ້ມູນໃບມອບສິດການໂອນ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{route('create-mop')}}" class="btn btn-info text-white mt-3">
                            ເພີ່ມຂໍ້ມູນ
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: center; text-align: right;">ສະແດງ &emsp;</td>
                                <td>
                                    <select wire:model="dataQ" wire:click="dataQ" name="Q" id="Q" class="form-control">
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="999999999">ທັງໝົດ</option>
                                    </select>
                                    <!-- <input type="number" wire:model="dataQ" name="dataQ" id="dataQ" class="form-control col-12"> -->
                                </td>
                                <td style="vertical-align: center;"><span>&emsp; ລາຍການ</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2">
                        <input type="date" name="date" id="date" wire:model="dateS" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="text" name="search" id="search" wire:model="search" class="form-control"
                            placeholder="ຄົ້ນຫາ">
                    </div>
                    <div class="col-1 ">
                        <button type="button" class="btn btn-primary" wire:click="searchData">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                    <div class="table-responsive py-3">
                                <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2"> ລຳດັບ </th>
                                            <th class="p-2"> ວັນທີ </th>
                                            <th class="p-2"> ຊື່ຜູ້ມອບ </th>
                                            <th class="p-2"> ທີ່ຢູ່ </th>
                                            <th class="p-2"> ເບິໂທ </th>
                                            <th class="p-2"> ຈຳນວນເງິນ </th>
                                            <th class="p-2"> ຊື່ຜູ້ຮັບ </th>
                                            <th class="p-2"> ລາຍລະອຽດປາຍທາງ </th>
                                            <th class="p-2"> ສະຖານະ </th>
                                            <th class="p-2"> ປຸ່ມກົດ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($data as $key => $item)
                                        <tr>
                                            <td class="text-center p-2">{{$no++}}</td>
                                            <td class="text-center p-2">
                                                {{date('d/m/Y', strtotime($item->valuedt))}}</td>
                                            <td class="text-center p-2">{{$item->name_mop}}</td>
                                            <td class="text-center p-2">{{$item->address}}</td>
                                            <td class="text-center p-2">{{$item->tel}}</td>
                                            <td class="text-right p-2" style="text-align: right;">
                                                {{number_format($item->money)}}</td>
                                            <td class="text-center p-2">
                                                {{$item->name_hub}}
                                            </td>
                                            <td class="text-center p-2">
                                                {{$item->address_hub}}
                                            </td>
                                            <td class="text-center p-2">
                                                @if ($item->del == 1)
                                                <span class="badge bg-primary">ຍັງບໍ່ທັນພິມ</span>
                                                @elseif($item->del == 2)
                                                <span class="badge bg-success">ພິມສຳເລັດ</span>
                                                @else
                                                <span class="badge bg-danger">ຍົກເລີກ</span>
                                                @endif
                                            </td>
                                            <td class="text-center p-2">

                                            <div class="btn-group btn-group-justified text-white mb-2">
                                                    <a class="btn btn-warning waves-effect waves-light"
                                                        href="{{route('edit-mop',$item->id)}}"><i
                                                            class="mdi mdi-pencil-remove-outline"></i></a>
                                                    <a class="btn btn-danger waves-effect waves-light"
                                                        wire:click="delete({{$item->id}})"><i
                                                            class="mdi mdi-window-close"></i></a>
                                                    <a class="btn btn-info waves-effect waves-light"
                                                        href="{{route('print-mop',$item->id)}}"><i
                                                            class="mdi mdi-eye"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td class="p-2" colspan="10" style="color: #787878;">ບໍ່ມີຂໍ້ມູນໃບມອບສິດການໂອນ</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span><br> ລວມທັງໝົດ <span class="text-danger">{{$count}}</span> ລາຍການ</span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.seft class="modal fade" id="modal-delete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <h2><label>ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ່ ?</label></h2>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ປິດ</button>
                    <button wire:click="destroy" type="button" data-dismiss="modal"
                        class="btn btn-danger">ຕົກລົງ</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
window.addEventListener('show-modal-delete', event => {
    $('#modal-delete').modal('show');
})
window.addEventListener('hide-modal-delete', event => {
    $('#modal-delete').modal('hide');
})
</script>
@endpush