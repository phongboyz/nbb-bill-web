<table border="2" width="100%">
    <thead>
        <tr class="text-center">
            <th style="font-family: 'Phetsarath OT';"> ເລກທຸລະກຳ </th>
            <th style="font-family: 'Phetsarath OT';"> ຈຳນວນເງິນ </th>
            <th style="font-family: 'Phetsarath OT';"> ລາຍລະອຽດ </th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @forelse ($data as $key => $item)
        <tr class="text-center">
            <td>{{$item->no}}</td>
            <td>{{$item->money}}</td>
            <td style="font-family: 'Phetsarath OT';">ວັນທີ: {{date('d/m/Y', strtotime($item->valuedt))}} | ສາຂາ: {{$item->branch_send}} | ຜູ້ໂອນ: {{$item->name_aon}} | ຈຳນວນເງິນໂຕໜັງສື: {{$item->money_name}} | ປະເພດ: ໃບໂອນ</td>
        </tr>
        @empty
        <tr class="text-center">
            <td colspan="8" style="color: #787878;" style="font-family: 'Phetsarath OT';">ບໍ່ມີຂໍ້ມູນໃບໂອນ</td>
        </tr>
        @endforelse
    </tbody>
</table>