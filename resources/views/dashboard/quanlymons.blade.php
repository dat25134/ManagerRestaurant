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
    <h1 class="h3 mb-0 text-gray-800">Danh sách món ăn trong cửa hàng</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-5"
        onclick="mons.openModal(this)">Tạo mới</a>
</div>
<div class="container">
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên món</th>
                <th>Tên tiếng anh</th>
                <th>Giá</th>
                <th>Nhóm món</th>
                <th>Đơn vị tính</th>
                <th>Ngày tạo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <td class="spinner text-center" colspan="8"><i class="fa fa-spinner fa-spin" style="font-size:48px"></i>
            </td>
        </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{asset('js/mons.js')}}"></script>
<!-- Default dropleft button -->

@endsection

<div class="modal fade" style="display: none;" id="add-edit" tabindex="-1" aria-labelledby="add-edit"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-edit-title">Thêm món mới</h5>
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
                                    <span class="input-group-text" id="basic-addon0" style="width:150px">Tên món</span>
                                </div>
                                <input type="text" class="form-control" name="name" id="name"
                                    data-rule-required="true" data-msg-required="Tên không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="name-error" class="error" for="name"></label>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="width:150px">Tên tiếng anh</span>
                                </div>
                                <input type="text" class="form-control"
                                    aria-label="email" aria-describedby="basic-addon1" name="nameEng" id="nameEng">
                            </div>
                            <div class="text-right" style="">
                                <label id="nameEng-error" class="error" for="nameEng"></label>
                            </div>

                            <div class="input-group mb-3 none-show-edit">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2" style="width:150px">Giá</span>
                                </div>
                                <input type="text" class="form-control" aria-label="gia"
                                    aria-describedby="basic-addon2" name="gia"
                                    id="gia" data-rule-required="true"
                                    data-msg-required="Giá không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="gia-error" class="error" for="gia"></label>
                            </div>

                            <div class="input-group mb-3 none-show-edit">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3" style="width:150px">Nhóm món</span>
                                </div>
                                <input type="text" class="form-control"
                                    aria-describedby="basic-addon3" name="nhommons"
                                    id="nhommons" data-rule-required="true"
                                    data-msg-required="Nhóm món không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="nhommons-error" class="error" for="nhommons"></label>
                            </div>

                            <div class="input-group mb-3 none-show-edit">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon4" style="width:150px">Đơn vị tính</span>
                                </div>
                                <input type="text" class="form-control"
                                    aria-describedby="basic-addon4" name="donvitinhs"
                                    id="donvitinhs" data-rule-required="true"
                                    data-msg-required="Đơn vị không được để trống">
                            </div>
                            <div class="text-right" style="">
                                <label id="donvitinhs-error" class="error" for="donvitinhs"></label>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="mons.create()" id="button-submit">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
<style></style>



