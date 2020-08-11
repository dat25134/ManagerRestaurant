var mons = mons || {};

mons.show = function(){
    $.ajax({
        url : 'http://localhost:8000/dashboard/mons/monsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.tenmon}</td>
                        <td>${v.tentienganh}</td>
                        <td>${Number(v.gia).toLocaleString('en')+ ' VNĐ'}</td>
                        <td>${v.nhommons}</td>
                        <td>${v.donvitinhs}</td>
                        <td>${v.created_at}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="mons.openModal(this),mons.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="mons.confirm(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            $('#myTable').DataTable();
        }
    })
};


mons.openModal = function(element){
    if (element.innerHTML == 'Tạo mới'){
        mons.resetModal();
        $('#add-edit-title').html('Thêm món mới');
        $('#button-submit').html('Thêm');
        $('#button-submit').attr('onclick','mons.create()')
    }else {
        $('#add-edit-title').html('Chỉnh sửa thông tin món ăn');
        $('#button-submit').html('Áp dụng');
        $('#button-submit').attr('onclick','mons.edit()')
    }
    $("#add-edit").modal('show');
}

mons.closeModal = function(){
    $("#add-edit").modal('hide');
}

mons.infoModal = function(id){
    $.ajax({
        url: `http://localhost:8000/dashboard/mons/monAPI/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#name').val(data.tenmon);
            $('#nameEng').val(data.tentienganh);
            $('#gia').val(data.gia);
            $('#nhommons').val(data.nhommons);
            $('#donvitinhs').val(data.donvitinhs);
        },
    });
}

mons.confirm =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                mons.del(id);
            }
        }
    })
}

mons.resetModal = function(){
    $('#reg-form').trigger("reset");
}

mons.create =function(){
     if ($('#reg-form').valid()){
        var data = {};
        data.name = $('#name').val();
        data.nameEng = $('#nameEng').val();
        data.gia = $('#gia').val();
        data.nhommons = $('#nhommons').val();
        data.donvitinhs = $('#donvitinhs').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
            url:"http://localhost:8000/dashboard/mons/create",
            method: 'POST',
            data:data,
            success : function(){
                mons.closeModal();
                mons.resetModal();
                mons.toastrNoti('success','Thêm mới món ăn thành công');
                $('#myTable').DataTable().destroy();
                mons.show();
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

mons.toastrNoti = function(type,string){
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

mons.edit = function(){
    id = $('#id').val();
    name = $('#name').val();
    nameEng = $('#nameEng').val();
    gia = $('#gia').val();
    nhommons = $('#nhommons').val();
    donvitinhs = $('#donvitinhs').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/dashboard/mons/editMon/${id}`,
        method:'put',
        dataType:'json',
        data: {
            name:name,
            nameEng:nameEng,
            gia:gia,
            nhommons:nhommons,
            donvitinhs:donvitinhs
        },
        success: function(data){
            mons.closeModal();
            mons.resetModal();
            mons.toastrNoti('success',`Chỉnh sửa món ${name} thành công`);
            $('#myTable').DataTable().destroy();
            mons.show();
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

mons.del = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://localhost:8000/dashboard/mons/delMon/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(data){
            mons.toastrNoti('success',`Xóa thành công ${data.tenmon}`);
            $('#myTable').DataTable().destroy();
            mons.show();
        },
        error: function(){

        }
    })

}

mons.init = function(){
    mons.show();
};

$(document).ready( function () {
    mons.init();
} );

