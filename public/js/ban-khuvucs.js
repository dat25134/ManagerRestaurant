
var khuvuc_ban = khuvuc_ban || {};

khuvuc_ban.get = function(){
    $.ajax({
        url: 'https://family-nhahanggiadinh.herokuapp.com/dashboard/ban_an/bans',
        method: 'get',
        data: 'json',
        success: function(data){
            $('#khuvuc').empty();
            $.each(data,function(i,v){
                $('#khuvuc').append(
                    `<option value="${v.id}">${v.Tenkhuvuc}</option>`
                );
            })
        }
    });

}

khuvuc_ban.show = function(){
    $.ajax({
        url : 'https://family-nhahanggiadinh.herokuapp.com/dashboard/ban_an/bans',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                date = new Date(v.created_at);
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td class = "cursor" onclick = 'khuvuc_ban.get(),bans.show(${v.id})'>${v.Tenkhuvuc}</td>
                        <td>${v.bans.length}</td>
                        <td>${date.toDateString()}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="khuvuc_ban.openModal(this),khuvuc_ban.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="khuvuc_ban.confirm(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            $('#myTable').DataTable();
        }
    })
};

// khuvuc_ban.changeIMG = function(element){
//     var img = element.files[0];
//     var reader = new FileReader();
//     reader.onloadend = function() {
//       $("#Avatar").attr("src",reader.result);
//     }
//     reader.readAsDataURL(img);
// }

khuvuc_ban.openModal = function(element){
    if($('#myTable').css('display') == 'none'){
        if (element.innerHTML == 'Tạo mới'){
            khuvuc_ban.resetModal();
            $('#add-edit-title').html('Thêm bàn');
            $('#button-submit').html('Thêm');
            $('#input_soghe').show();
            $('#khuvuc_form').show();
            $('#button-submit').attr('onclick','bans.create()')
        }else {
            $('#add-edit-title').html('Chỉnh sửa thông tin bàn');
            $('#button-submit').html('Chỉnh sửa');
            $('#input_soghe').show();
            $('#khuvuc_form').show();
            $('#button-submit').attr('onclick','bans.edit()')
        }
    }else{
        if (element.innerHTML == 'Tạo mới'){
            khuvuc_ban.resetModal();
            $('#add-edit-title').html('Thêm khu vực bàn');
            $('#button-submit').html('Tạo');
            $('#input_soghe').hide();
            $('#khuvuc_form').hide();
            $('#button-submit').attr('onclick','khuvuc_ban.create()')
            // $('.none-show-edit').show();
        }else {
            // $('.none-show-edit').hide();
            $('#input_soghe').hide();
            $('#khuvuc_form').hide();
            $('#add-edit-title').html('Chỉnh sửa thông tin');
            $('#button-submit').html('Edit');
            $('#button-submit').attr('onclick','khuvuc_ban.edit()')
        }
    }
    $("#add-edit").modal('show');
}

khuvuc_ban.closeModal = function(){
    $("#add-edit").modal('hide');

}

khuvuc_ban.resetModal = function(){
    $('#reg-form').trigger("reset");
    $('#note-error').empty();
    $('#error').empty();
}

khuvuc_ban.toastrNoti = function(type,string){
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


khuvuc_ban.create =function(){
     if ($('#reg-form').valid()){
        var data = {};
        data.name = $('#name').val();
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            url:"https://family-nhahanggiadinh.herokuapp.com/dashboard/ban_an/createKV",
            method: 'POST',
            data:data,
            success : function(){
                khuvuc_ban.closeModal();
                khuvuc_ban.resetModal();
                khuvuc_ban.toastrNoti('success',`Thêm mới khu vực ${data.name} thành công`);
                $('#myTable').DataTable().destroy();
                khuvuc_ban.show();
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

khuvuc_ban.infoModal = function(id){
    $('#note-error').empty();
    $('#error').empty();
    $.ajax({
        url: `https://family-nhahanggiadinh.herokuapp.com/dashboard/ban_an/getKV/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#name').val(data.Tenkhuvuc);
        },
    });
}

khuvuc_ban.edit = function(){
    id = $('#id').val();
    name = $('#name').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`https://family-nhahanggiadinh.herokuapp.com/dashboard/ban_an/editKV/${id}`,
        method:'put',
        dataType:'json',
        data: {
            name:name,
        },
        success: function(data){
            khuvuc_ban.closeModal();
            khuvuc_ban.resetModal();
            khuvuc_ban.toastrNoti('success',`Chỉnh sửa khu vực ${name} thành công`);
            $('#myTable').DataTable().destroy();
            khuvuc_ban.show();
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


khuvuc_ban.confirm =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                khuvuc_ban.del(id);
            }
        }
    })
}

khuvuc_ban.del = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `https://family-nhahanggiadinh.herokuapp.com/dashboard/ban_an/delKV/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(user){
            khuvuc_ban.toastrNoti('success',`Xóa thành công ${user.name}`);
            $('#myTable').DataTable().destroy();
            khuvuc_ban.show();
        },
        error: function(){

        }
    })

}
khuvuc_ban.init = function(){
    khuvuc_ban.show();
    khuvuc_ban.get();
};

$(document).ready( function () {
    khuvuc_ban.init();
} );
