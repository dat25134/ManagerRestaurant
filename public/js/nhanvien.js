
var nhanvien = nhanvien || {};

// nhanvien.snipping = function(){
//     $(document).on({
//         ajaxStart: function () {
//             $(".spinner").show();
//         },
//         ajaxStop: function () {
//              $(".spinner").hide();
//         },
//         ajaxError: function () {
//             $(".spinner").hide();
//         }
//     });
// }
nhanvien.show = function(){
    $.ajax({
        url : 'http://localhost:8000/dashboard/apiNhanvien',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                date = new Date(v.created_at);
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.name}</td>
                        <td><img src="${v.image64}" style="width:60px; height: 60px; border-radius:50%"></td>
                        <td>${v.email}</td>
                        <td>${date.toDateString()}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="nhanvien.openModal(this),nhanvien.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="nhanvien.confirm(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            $('#myTable').DataTable();
        }
    })
};

nhanvien.changeIMG = function(element){
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
      $("#Avatar").attr("src",reader.result);
    }
    reader.readAsDataURL(img);
}

nhanvien.openModal = function(element){
    if (element.innerHTML == 'Create'){
        nhanvien.resetModal();
        $('#add-edit-title').html('Thêm nhân viên mới');
        $('#button-submit').html('Save changes');
        $('#button-submit').attr('onclick','nhanvien.create()')
        $('.none-show-edit').show();
    }else {
        $('.none-show-edit').hide();
        $('#add-edit-title').html('Chỉnh sửa thông tin nhân viên');
        $('#button-submit').html('Edit');
        $('#button-submit').attr('onclick','nhanvien.edit()')
    }
    $("#add-edit").modal('show');
}

nhanvien.closeModal = function(){
    $("#add-edit").modal('hide');
}

nhanvien.resetModal = function(){
    $('#reg-form').trigger("reset");
    $('#Avatar').attr('src','http://localhost:8000/images/no-avatar.png')
}

nhanvien.toastrNoti = function(type,string){
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


nhanvien.create =function(){
     if ($('#reg-form').valid()){
        var data = {};
        data.name = $('#name').val();
        data.email = $('#email').val();
        data.password = $('#password').val();
        data.password_confirmation= $('#password-confirm').val();
        data.image64 = $('#Avatar').attr('src');
         $.ajax({
            url:"http://localhost:8000/register",
            method: 'POST',
            data:data,
            success : function(){
                nhanvien.closeModal();
                nhanvien.resetModal();
                nhanvien.toastrNoti('success','Thêm mới nhân viên thành công');
                $('#myTable').DataTable().destroy();
                nhanvien.show();
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

nhanvien.infoModal = function(id){
    $.ajax({
        url: `http://localhost:8000/dashboard/apiNhanvien/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#Avatar').attr('src',data.image64);
            $('#email').val(data.email);
        },
    });
}

nhanvien.edit = function(){
    id = $('#id').val();
    name = $('#name').val();
    email = $('#email').val();
    image64 = $('#Avatar').attr('src');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/dashboard/apiNhanvien/${id}`,
        method:'put',
        dataType:'json',
        data: {
            name:name,
            email:email,
            image64:image64,
        },
        success: function(data){
            nhanvien.closeModal();
            nhanvien.resetModal();
            nhanvien.toastrNoti('success',`Chỉnh sửa nhân viên ${name} thành công`);
            $('#myTable').DataTable().destroy();
            nhanvien.show();
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

nhanvien.confirm =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                nhanvien.del(id);
            }
        }
    })
}

nhanvien.del = function(id){
    $.ajax({
        url: `http://localhost:8000/dashboard/apiNhanvien/${id}/del`,
        method: 'get',
        dataType: 'json',
        success: function(user){
            nhanvien.toastrNoti('success',`Xóa thành công ${user.name}`);
            $('#myTable').DataTable().destroy();
            nhanvien.show();
        },
        error: function(){

        }
    })

}


nhanvien.init = function(){
    nhanvien.show();
};

$(document).ready( function () {
    nhanvien.init();
} );
