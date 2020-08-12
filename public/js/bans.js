
var bans = bans || {};
bans.idKV;
function back(){
    $('#myTable').show();
    khuvuc_ban.show();
    $('#myTableBans').hide();
    $('#myTableBans').DataTable().destroy();
}

function showAll_bans(){
    $('#myTable').hide();
    $('#myTableBans').show();
    $('#myTable').DataTable().destroy();
    $.ajax({
        url : `http://localhost:8000/dashboard/ban_an/showBans`,
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTableBans tbody').empty();
            $.each(data,function(i,v){
                date = new Date(v.created_at);
                $('#myTableBans tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.tenban}</td>
                        <td>${v.soghe}</td>
                        <td>${v.khuvuc.Tenkhuvuc}</td>
                        <td>${date.toDateString()}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="khuvuc_ban.openModal(this),bans.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="bans.confirmAll(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            // $('#myTableBans').DataTable().destroy();
            $('#myTableBans').DataTable();
        }
    })
}

bans.delAll = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://localhost:8000/dashboard/ban_an/delBan/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(data){
            khuvuc_ban.toastrNoti('success',`Xóa thành công bàn ${data.tenban}`);
            $('#myTable').DataTable().destroy();
            showAll_bans();
        },
        error: function(){

        }
    })

}

bans.show = function(idKV){
    $.ajax({
        url : `http://localhost:8000/dashboard/ban_an/bans/${idKV}`,
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTableBans tbody').empty();
            $('#myTable').hide();
            $('#myTableBans').show();
            bans.idKV=idKV;
            $.each(data,function(i,v){
                date = new Date(v.created_at);
                $('#myTableBans tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.tenban}</td>
                        <td>${v.soghe}</td>
                        <td>${v.khuvuc.Tenkhuvuc}</td>
                        <td>${date.toDateString()}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick="khuvuc_ban.openModal(this),bans.infoModal(${v.id})"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick="bans.confirm(${v.id})"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                        </td>
                    </tr>`
                )
            })
            $('#myTable').DataTable().destroy();
            $('#myTableBans').DataTable();
        }
    })
};



bans.create =function(){
     if ($('#reg-form').valid()){
        var data = {};
        data.name = $('#name').val();
        data.soghe = $('#soghe').val();
        data.id_khuvucs = $('#khuvuc').val();
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            url:"http://localhost:8000/dashboard/ban_an/createBan",
            method: 'POST',
            data:data,
            success : function(){
                khuvuc_ban.closeModal();
                khuvuc_ban.resetModal();
                khuvuc_ban.toastrNoti('success',`Thêm mới bàn ${data.name} thành công`);
                $('#myTable').DataTable().destroy();
                bans.show(data.id_khuvucs);
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

bans.infoModal = function(id){
    $('#note-error').empty();
    $('#error').empty();
    $.ajax({
        url: `http://localhost:8000/dashboard/ban_an/getBan/${id}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            $('#id').val(data.id);
            $('#name').val(data.tenban);
            $('#khuvuc').val(data.id_khuvucs);
            $('#soghe').val(data.soghe);
        },
    });
}

bans.edit = function(){
    id = $('#id').val();
    name = $('#name').val();
    id_khuvucs = $('#khuvuc').val();
    soghe = $('#soghe').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/dashboard/ban_an/editBan/${id}`,
        method:'put',
        dataType:'json',
        data: {
            name:name,
            id_khuvucs:id_khuvucs,
            soghe:soghe
        },
        success: function(data){
            khuvuc_ban.closeModal();
            khuvuc_ban.resetModal();
            khuvuc_ban.toastrNoti('success',`Chỉnh sửa bàn ${name} thành công`);
            $('#myTable').DataTable().destroy();
            bans.show(id_khuvucs);
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

bans.confirmAll =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                bans.delAll(id);
            }
        }
    })
}

bans.confirm =function(id){
    bootbox.confirm({
        size: "small",
        message: "Bạn có chắc chắn muốn xóa",
        callback: function(result){
            if (result){
                bans.del(id);
            }
        }
    })
}

bans.del = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://localhost:8000/dashboard/ban_an/delBan/${id}`,
        method: 'delete',
        dataType: 'json',
        success: function(data){
            khuvuc_ban.toastrNoti('success',`Xóa thành công bàn ${data.tenban}`);
            $('#myTable').DataTable().destroy();
            bans.show(data.id_khuvucs);
        },
        error: function(){

        }
    })

}
bans.init = function(){
    // bans.show();
};

$(document).ready( function () {
    bans.init();
} );
