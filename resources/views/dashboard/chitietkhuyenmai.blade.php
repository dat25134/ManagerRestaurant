@if (Auth::user()->role==1)

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

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Chi tiết chương trình khuyến mãi</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-5"
        onclick="cupon.showCTKM(),cupon.showMon(),cupon.openModal(this)">Tạo mới</a>
</div>
<div class="container">
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>CTKM</th>
                <th>Tên món</th>
                <th>Nhóm món</th>
                <th>Ngày tạo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <td class="spinner text-center" colspan="6"><i class="fa fa-spinner fa-spin" style="font-size:48px"></i>
            </td>
        </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{asset('js/cupon.js')}}"></script>
<script src="{{asset('js/snipping.js')}}"></script>
<!-- Default dropleft button -->

@endsection

<div class="modal fade" style="display: none;" id="add-edit" tabindex="-1" aria-labelledby="add-edit"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-edit-title">Thêm mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reg-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3" style="display:none">
                                <input type="text" name="id" id="id">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">CTKM</span>
                                </div>
                                <select class="custom-select custom-select" name="CTKM" id="CTKM">

                                </select>
                            </div>
                            <div class="text-right" style="">
                                <label id="CTKM-error" class="error" for="CTKM"></label>
                            </div>

                            <div class="input-group mb-3 none-show-edit">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2" style="width:150px">Chọn món</span>
                                </div>
                                <select class="custom-select custom-select" name="tenmons" id="tenmons">

                                </select>
                            </div>
                            <div class="text-right" style="">
                                <label id="denngay-error" class="error" for="denngay"></label>
                            </div>
                        </div>
                    </div>
                    <div class="text-left" style="padding-left: 8rem !important">
                        <div id="note-error"></div>
                        <ul id="error">

                        </ul>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="cupon.create()" id="button-submit">Thêm</button>
            </div>
        </div>
    </div>
</div>
@else
<script>
    alert('Bạn không đủ quyền hạn truy cập trang này');
        function goBack() {
  window.history.back();
}
goBack();
</script>
@endif
