var cupon = cupon || {};

cupon.showCTKM = function(){
    $.ajax({
        url : location.origin+'/dashboard/ctkm/ctkmsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#CTKM').empty();
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
        url : location.origin+'/dashboard/mons/monsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#tenmons').empty();
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
        url : location.origin+'/dashboard/cupon/cuponAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                date = new Date(v.created_at);
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.khuyenmai.tenKM}</td>
                        <td>${v.mon.tenmon}</td>
                        <td>${v.mon.nhommons}</td>
                        <td>${date.toDateString()}</td>
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
        url: location.origin+`/dashboard/cupon/cuponAPI/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#phantramKM').val(data.phantramKM);
            $('#CTKM').val(data.id_khuyenmais);
            $('#tenmons').val(data.id_mons);
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
        data.CTKM = $('#CTKM').val();
        data.tenmon = $('#tenmons').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
            url:location.origin+"/dashboard/cupon/create",
            method: 'POST',
            data:data,
            success : function(){
                cupon.closeModal();
                cupon.resetModal();
                cupon.toastrNoti('success','Thêm mới chi tiết KM thành công');
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
    id_khuyenmais = $('#CTKM').val();
    tenmon = $('#tenmons').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:location.origin+`/dashboard/cupon/editCupon/${id}`,
        method:'put',
        dataType:'json',
        data: {
            CTKM:id_khuyenmais,
            tenmon:tenmon,
        },
        success: function(data){
            cupon.closeModal();
            cupon.resetModal();
            cupon.toastrNoti('success',`Chỉnh sửa chi tiết KM thành công`);
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
        url: location.origin+`/dashboard/cupon/delCupon/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(data){
            cupon.toastrNoti('success',`Xóa thành công chi tiết KM`);
            $('#myTable').DataTable().destroy();
            cupon.show();
        },
        error: function(){

        }
    })

}

cupon.init = function(){
    cupon.show();
    cupon.showCTKM();
    cupon.showMon();
};

$(document).ready( function () {
    cupon.init();
} );

