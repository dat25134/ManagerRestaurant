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

    .cursor{
       cursor: pointer;
    }
    #myTableBans{
        display: none;
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quản lý khu vực bàn ăn</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-5"
        onclick="openModal(this)">Tạo mới</a>
</div>
<div class="container">
    <table id="myTable" class="table table-bordered text-center table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên khu vực</th>
                <th>Số lượng bàn</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <td class="spinner text-center" colspan="5"><i class="fa fa-spinner fa-spin" style="font-size:48px"></i>
            </td>
        </tbody>
    </table>
    <table id="myTableBans" class="table table-bordered text-center table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Bàn</th>
                <th>Số ghế</th>
                <th>Khu vực</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            {{-- <td class="spinner text-center" colspan="5"><i class="fa fa-spinner fa-spin" style="font-size:48px"></i>

            </td> --}}
        </tbody>
    </table>
    <button class="btn btn-secondary" onclick="back()"> Back </button>
    <button class="btn btn-primary" onclick="showAll_bans()"> Danh sách chi tiết bàn </button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{asset('js/ban-khuvucs.js')}}"></script>
<script src="{{asset('js/bans.js')}}"></script>
<script src="{{asset('js/snipping.js')}}"></script>
<script>
    openModal= function(e){
        khuvuc_ban.openModal(e);
        $('#khuvuc').val(bans.idKV);
        console.log(bans.idKV);
    }
</script>
@endsection

{{-- Modal-conttent --}}
<div class="modal fade" style="display: none;" id="add-edit" tabindex="-1" aria-labelledby="add-edit"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-edit-title">Thêm nhân viên mới</h5>
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
                            <div class="input-group mb-3" style="display:none" id="khuvuc_form">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-center" id="basic-addon0" style="width:100px ;justify-content: center;">Khu vực</span>
                                </div>
                                <select class="custom-select custom-select" name="khuvuc" id="khuvuc">

                                  </select>
                            </div>
                            <div class="text-right" style="">
                                <label id="name-error" class="error" for="name"></label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-center" id="basic-addon1" style="width:100px ;justify-content: center;">Tên</span>
                                </div>
                                <input type="text" class="form-control" name="name" id="name"
                                    data-rule-required="true" data-msg-required="Tên không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="name-error" class="error" for="name"></label>
                            </div>
                            <div class="input-group mb-3" style="display: none;" id="input_soghe">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2" style="width:100px; justify-content: center;">Số Ghế</span>
                                </div>
                                <input type="number" class="form-control" name="soghe" id="soghe"
                                    data-rule-required="true" data-msg-required="Số ghế không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="soghe-error" class="error" for="soghe"></label>
                            </div>
                        </div>
                    </div>
                    <div class="text-left" style="padding-left: 1rem !important">
                        <div id="note-error"></div>
                        <ul id="error">

                        </ul>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="nhanvien.create()" id="button-submit">Save
                    changes</button>
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
