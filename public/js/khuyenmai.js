var ctkms = ctkms || {};

ctkms.show = function(){
    $.ajax({
        url : 'http://family-nhahanggiadinh.herokuapp.com/dashboard/ctkm/ctkmsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                date = new Date(v.created_at);
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.tenKM}</td>
                        <td>${v.phantramKM}</td>
                        <td>${v.tungay}</td>
                        <td>${v.denngay}</td>
                        <td>${date.toDateString()}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="ctkms.openModal(this),ctkms.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="ctkms.confirm(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            $('#myTable').DataTable();
        }
    })
};

ctkms.openModal = function(element){
    if (element.innerHTML == 'Tạo mới'){
        ctkms.resetModal();
        $('#add-edit-title').html('Thêm KM mới');
        $('#button-submit').html('Thêm');
        $('#button-submit').attr('onclick','ctkms.create()')
    }else {
        $('#add-edit-title').html('Chỉnh sửa thông tin KM');
        $('#button-submit').html('Áp dụng');
        $('#button-submit').attr('onclick','ctkms.edit()')
    }
    $("#add-edit").modal('show');
}

ctkms.infoModal = function(id){
    $.ajax({
        url: `http://family-nhahanggiadinh.herokuapp.com/dashboard/ctkm/ctkmAPI/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#name').val(data.tenKM);
            $('#tungay').val(data.tungay);
            $('#denngay').val(data.denngay);
        },
    });
}

ctkms.resetModal = function(){
    $('#reg-form').trigger("reset");
}

ctkms.closeModal = function(){
    $("#add-edit").modal('hide');
}

ctkms.toastrNoti = function(type,string){
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

ctkms.create =function(){
    if ($('#reg-form').valid()){
       var data = {};
       data.name = $('#name').val();
       data.phantramKM = $('#phantramKM').val();
       data.tungay = $('#tungay').val();
       data.denngay = $('#denngay').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
        $.ajax({
           url:"http://family-nhahanggiadinh.herokuapp.com/dashboard/ctkm/create",
           method: 'POST',
           data:data,
           success : function(){
            ctkms.closeModal();
            ctkms.resetModal();
            ctkms.toastrNoti('success','Thêm mới CTKM thành công');
            $('#myTable').DataTable().destroy();
            ctkms.show();
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

ctkms.edit = function(){
    id = $('#id').val();
    name = $('#name').val();
    phantramKM = $('#phantramKM').val();
    tungay = $('#tungay').val();
    denngay = $('#denngay').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://family-nhahanggiadinh.herokuapp.com/dashboard/ctkm/editCTKM/${id}`,
        method:'put',
        dataType:'json',
        data: {
            name:name,
            phantramKM:phantramKM,
            tungay:tungay,
            denngay:denngay,
        },
        success: function(data){
            ctkms.closeModal();
            ctkms.resetModal();
            ctkms.toastrNoti('success',`Chỉnh sửa món ${name} thành công`);
            $('#myTable').DataTable().destroy();
            ctkms.show();
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

ctkms.confirm =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                ctkms.del(id);
            }
        }
    })
}

ctkms.del = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://family-nhahanggiadinh.herokuapp.com/dashboard/ctkm/delCTKM/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(data){
            ctkms.toastrNoti('success',`Xóa thành công ${data.tenKM}`);
            $('#myTable').DataTable().destroy();
            ctkms.show();
        },
        error: function(){

        }
    })

}

ctkms.init = function(){
    ctkms.show();
};

$(document).ready( function () {
    ctkms.init();
} );
