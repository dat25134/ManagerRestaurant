@extends('layouts.formDashboard')
@section('title','Dashboard')

@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách nhân viên trong cửa hàng</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-5"
        onclick="nhanvien.openModal()">Create </a>
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
<script src="{{asset('js/nhanvien.js')}}"></script>
<script src="{{asset('js/snipping.js')}}"></script>
@endsection

<div class="modal fade" style="display: none;" id="add-edit" tabindex="-1" aria-labelledby="add-edit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-edit-title">Thêm nhân viên mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Họ và
                                        tên</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Trần Văn A" aria-label="name"
                                    aria-describedby="basic-addon1" name="name" id="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Email</span>
                                </div>
                                <input type="email" class="form-control" placeholder="example123@gmail.com"
                                    aria-label="email" aria-describedby="basic-addon1" name="email" id="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Mật khẩu</span>
                                </div>
                                <input type="password" class="form-control" aria-label="password"
                                    aria-describedby="basic-addon1" name="password" required autocomplete="new-password"
                                    id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Nhập lại mật
                                        khẩu</span>
                                </div>
                                <input type="password" class="form-control" aria-label="email"
                                    aria-describedby="basic-addon1" name="password_confirmation" required
                                    autocomplete="new-password" id="password-confirm">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01" style="width:150px">Ảnh đại diện</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" onchange="nhanvien.changeIMG(this)">
                                    <label class="custom-file-label" for="inputGroupFile01">Chọn file</label>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 justify-content-center col-4">
                            <img src="https://via.placeholder.com/200" alt="" id="Avatar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="">Save changes</button>
            </div>
        </div>
    </div>
</div>
