@extends('layouts.formHomepage')
@section('title','Nhà Hàng Family')

@section('content')
<style>
    .error,
    #note-error {
        color: #dc3545 !important;
        font-size: 1rem !important;
        width: 20rem !important;
    }
</style>
<div class="container-fluid" style="background-color: #f7f7f7">
    <div class="row">
        <div class="col-7">
            <h2>Danh sách các món ăn</h2>
            <div class="container">
                <div class="row row-cols-2">
                    @foreach ($nhommons as $item)
                    <div class="col" style="min-height: 500px">
                        <h2>{{$item->nhommons}}</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mons as $mon)
                                @if ($mon->nhommons == $item->nhommons )
                                <tr>
                                    <th scope="row"><img src="{{asset($mon->imageURL)}}" alt="" style="width:50px; height:50px"></th>
                                    <td >{{$mon->tenmon}}</td>
                                    <td>{{number_format($mon->gia) . ' VNĐ'}}</td>
                                    <td><button class="btn btn-danger" onclick="orders.addCTHD({{$mon->id}})">Gọi</button></td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-5">
            <h2>ORDER TABLE</h2>
            <select class="form-control" id="id_ban" name="id_ban" onchange="orders.showBill(this)">
                <option disabled selected>Chọn bàn</option>
                @foreach ($bans as $item)
                    <option value="{{$item->id}}">{{$item->tenban}}</option>
                @endforeach
            </select>
            <input type="text" name="id_hoadons" id="id_hoadons" style="display:none">
            <table class="table" id="order-table" style="font-size: 70%">
                <thead>
                    <tr>
                        <th scope="col">Món</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn vị</th>
                        <th scope="col">KM</th>
                        <th scope="col">Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr colspan="5">
                        <div class="text-left" style="padding-left: 2rem !important">
                            <div id="note-error"></div>
                            <ul id="error">

                            </ul>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.footer')
<script src="{{asset('js/order.js')}}"></script>
@endsection
