@extends('layouts.formDashboard')
@section('title','Dashboard')

@section('content')


<link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<style>
    .error,
    #note-error {
        color: #dc3545 !important;
        font-size: 1rem !important;
        width: 20rem !important;
    }
</style>
<div class="container-fluid" id="listBill">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 row">
        <h1 class="h3 mb-0 text-gray-800 col-8">Thống kê hóa đơn</h1>
        <div class="container col-4">
            <label for="">Chọn ngày</label>
            <input type="date" name="dateCheck" id="dateCheck" onchange="bills.showDate(this)">
        </div>
    </div>
    <div class="container">
        <table id="myTablelist" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ngày lập</th>
                    <th scope="col">Giờ thanh toán</th>
                    <th scope="col">Vat</th>
                    <th scope="col">Bàn</th>
                    <th scope="col">Người lập</th>
                    <th scope="col">Tổng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <td class="spinner text-center" colspan="8"><i class="fa fa-spinner fa-spin" style="font-size:48px"></i>
                </td>
            </tbody>
        </table>
    </div>
</div>

<div class="container-fluid" id="chiTietBill" style="display:none">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết hóa đơn</h1>
    </div>
    <div class="container">
        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên món</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">KM</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <td class="spinner text-center" colspan="8"><i class="fa fa-spinner fa-spin" style="font-size:48px"></i>
                </td>
            </tbody>
        </table>
    </div>
</div>

<div class="container" id="back-btn">
    <button class="btn btn-primary" onclick="bills.back()">Back</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{asset('js/bill.js')}}"></script>
<script src="{{asset('js/snipping.js')}}"></script>
<!-- Default dropleft button -->

@endsection
