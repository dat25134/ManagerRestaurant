var cupon = cupon || {};

cupon.showCTKM = function(){
    $.ajax({
        url : 'http://localhost:8000/dashboard/ctkm/ctkmsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $.each(data,function(i,v){
                $('#CTKM').append(
                    `<option value='${v.id}'>${v.tenKM}</option>`
                )
            })
        }
    })
}

cupon.showMon = function(){
    $.ajax({
        url : 'http://localhost:8000/dashboard/mons/monsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $.each(data,function(i,v){
                $('#tenmons').append(
                    `<option value='${v.id}'>${v.tenmon}</option>`
                )
            })
        }
    })
}

cupon.show = function(){
    $.ajax({
        url : 'http://localhost:8000/dashboard/cupon/cuponAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.phantramKM}</td>
                        <td>${v.khuyenmai.tenKM}</td>
                        <td>${v.mon.tenmon}</td>
                        <td>${v.mon.nhommons}</td>
                        <td>${v.created_at}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="cupon.openModal(this),cupon.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="cupon.confirm(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            $('#myTable').DataTable();
        }
    })
};


cupon.openModal = function(element){
    if (element.innerHTML == 'Tạo mới'){
        cupon.resetModal();
        $('#add-edit-title').html('Thêm chi tiết khuyến mãi mới');
        $('#button-submit').html('Thêm');
        $('#button-submit').attr('onclick','cupon.create()')
    }else {
        $('#add-edit-title').html('Chỉnh sửa chi tiết khuyến mãi');
        $('#button-submit').html('Áp dụng');
        $('#button-submit').attr('onclick','cupon.edit()')
    }
    $("#add-edit").modal('show');
}

cupon.closeModal = function(){
    $("#add-edit").modal('hide');
}

cupon.infoModal = function(id){
    $.ajax({
        url: `http://localhost:8000/dashboard/cupon/monAPI/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#name').val(data.tenmon);
            $('#nameEng').val(data.tentienganh);
            $('#gia').val(data.gia);
            $('#nhomcupon').val(data.nhomcupon);
            $('#donvitinhs').val(data.donvitinhs);
        },
    });
}

cupon.confirm =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                cupon.del(id);
            }
        }
    })
}

cupon.resetModal = function(){
    $('#reg-form').trigger("reset");
}

cupon.create =function(){
     if ($('#reg-form').valid()){
        var data = {};
        data.name = $('#name').val();
        data.nameEng = $('#nameEng').val();
        data.gia = $('#gia').val();
        data.nhomcupon = $('#nhomcupon').val();
        data.donvitinhs = $('#donvitinhs').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
            url:"http://localhost:8000/dashboard/cupon/create",
            method: 'POST',
            data:data,
            success : function(){
                cupon.closeModal();
                cupon.resetModal();
                cupon.toastrNoti('success','Thêm mới món ăn thành công');
                $('#myTable').DataTable().destroy();
                cupon.show();
            },
            error : function(data){
                $('#note-error').empty();
                $('#error').empty();
                var v = JSON.parse(data.responseText);
                document.getElementById('note-error').innerHTML = 'Dữ liệu nhập vào không đúng';
                $.each(v.errors,function(i,val){
                    $('#error').append(
                        `<li><label class="error">${val[0]}</label></li>`
                    );
                });

            }
        })
     };
}

cupon.toastrNoti = function(type,string){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    toastr[type](string);
}

cupon.edit = function(){
    id = $('#id').val();
    name = $('#name').val();
    nameEng = $('#nameEng').val();
    gia = $('#gia').val();
    nhomcupon = $('#nhomcupon').val();
    donvitinhs = $('#donvitinhs').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/dashboard/cupon/editMon/${id}`,
        method:'put',
        dataType:'json',
        data: {
            name:name,
            nameEng:nameEng,
            gia:gia,
            nhomcupon:nhomcupon,
            donvitinhs:donvitinhs
        },
        success: function(data){
            cupon.closeModal();
            cupon.resetModal();
            cupon.toastrNoti('success',`Chỉnh sửa món ${name} thành công`);
            $('#myTable').DataTable().destroy();
            cupon.show();
        },
        error: function(data){
            $('#note-error').empty();
            $('#error').empty();
            var v = JSON.parse(data.responseText);
            document.getElementById('note-error').innerHTML = 'Dữ liệu nhập vào không đúng';
            $.each(v.errors,function(i,val){
                $('#error').append(
                    `<li><label class="error">${val[0]}</label></li>`
                );
                });
        }
    })
}

cupon.del = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://localhost:8000/dashboard/cupon/delMon/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(data){
            cupon.toastrNoti('success',`Xóa thành công ${data.tenmon}`);
            $('#myTable').DataTable().destroy();
            cupon.show();
        },
        error: function(){

        }
    })

}

cupon.init = function(){
    cupon.show();
};

$(document).ready( function () {
    cupon.init();
} );

