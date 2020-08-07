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
    <h1 class="h3 mb-0 text-gray-800">Danh sách nhân viên trong cửa hàng</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-5"
        onclick="nhanvien.openModal(this)">Create</a>
</div>
<div class="container">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Họ và tên</th>
                <th>Avatar</th>
                <th>Email(Tên Đăng Nhập)</th>
                <th>Ngày vào làm</th>
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
<script src="{{asset('js/nhanvien.js')}}"></script>
<script src="{{asset('js/snipping.js')}}"></script>
<!-- Default dropleft button -->

@endsection

<div class="modal fade" style="display: none;" id="add-edit" tabindex="-1" aria-labelledby="add-edit"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <div class="col-8">
                            <div class="input-group mb-3" style="display:none">
                                <input type="text" name="id" id="id">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Họ và
                                        tên</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Trần Văn A" name="name" id="name"
                                    data-rule-required="true" data-msg-required="Tên không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="name-error" class="error" for="name"></label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Email</span>
                                </div>
                                <input type="email" class="form-control" placeholder="example123@gmail.com"
                                    aria-label="email" aria-describedby="basic-addon1" name="email" id="email"
                                    data-rule-required="true" data-msg-required="Email không được để trống"
                                    data-rule-email=”true”>
                            </div>
                            <div class="text-right" style="">
                                <label id="email-error" class="error" for="email"></label>
                            </div>
                            <div class="input-group mb-3 none-show-edit">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Mật khẩu</span>
                                </div>
                                <input type="password" class="form-control" aria-label="password"
                                    aria-describedby="basic-addon1" name="password" autocomplete="new-password"
                                    id="password" data-rule-required="true"
                                    data-msg-required="Mật khẩu không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="password-error" class="error" for="password"></label>
                            </div>
                            <div class="input-group mb-3 none-show-edit">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Nhập lại mật
                                        khẩu</span>
                                </div>
                                <input type="password" class="form-control" aria-label="password_confirmation"
                                    aria-describedby="basic-addon1" name="password_confirmation"
                                    autocomplete="new-password" id="password-confirm" data-rule-required="true"
                                    data-msg-required="Nhập lại mật khẩu">
                            </div>
                            <div class="text-right" style="">
                                <label id="password-confirm-error" class="error" for="password-confirm"></label>
                            </div>
                        </div>

                        <div class="input-group mb-3 justify-content-center col-4">
                            <label class='border' for="inputGroupFile01"><img src="{{asset('images/no-avatar.png')}}"
                                    alt="" id="Avatar" style="width:201px;height:200px"></label>
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" onchange="nhanvien.changeIMG(this)"
                                name="inputGroupFile01" hidden>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="nhanvien.create()" id="button-submit">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
<style></style>



