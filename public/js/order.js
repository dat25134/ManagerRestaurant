var orders = orders || {};

orders.showBill = function(){
    id_bans = $('#id_ban').val();
    let tong = 0;
    $.ajax({
        url:`http://localhost:8000/family/hoaDonAPI/${id_bans}`,
        method : "get",
        dataType : "json",
        success: function(data){
            $('#order-table tbody').empty()
            $('#id_hoadons').val(data.id_hoadons);
            $.each(data.chitiet,function(index,value){
                tong +=  value.gia*value.soluong*(100-value.km)/100;
                $('#order-table tbody').append(
                    `<tr>
                    <th scope="row">${value.tenmon}</th>
                    <td>${value.gia}</td>
                    <td><input type="number" name="soluong" id="soluong" onchange="orders.updateSL(${value.id},this)" value="${value.soluong}" style="width:50px"></td>
                    <td>${value.donvi}</td>
                    <td>${value.km}</td>
                    <td>${Number(value.gia*value.soluong*(100-value.km)/100).toLocaleString('en') + " VNĐ"}</td>
                    <td>
                    <div style="background-color: white">
                        <button onclick="orders.confirm(${value.id},'${value.tenmon}')" type="button" class="close"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                     </button>
                    </div>
                    </td>
                    </tr>`
                )
            })
            tong = tong*(100+data.vats)/100;
            $('#order-table tbody').append(
                `<tr>
                    <td colspan="4" class='text-right'> VAT</td>
                    <td colspan="2" style='color:black'>${data.vats + " %"}</td>
                </tr>
                <tr style='font-size:120%'>
                    <td colspan="4" class='text-right'> Tổng cộng</td>
                    <td colspan="2" style='color:red'>${Number(tong).toLocaleString('en') + " VNĐ"}</td>
                </tr>
                <tr>
                    <td colspan="6" class='text-center'> <button class="btn btn-primary" onclick='orders.confirmTT(${tong},${data.id_hoadons})'>Thanh toán</button> </td>
                </tr>`
                )
        },
        error: function(errors){

        }
    });
}

orders.del = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/family/delCTHD/${id}`,
        method : "delete",
        dataType : "json",
        success: function(data){
            id_bans = $('#id_ban').val();
            orders.showBill();
            orders.toastrNoti('success','Xóa thành công!!');
        },
        error: function(errors){

        }
    });
}

orders.addCTHD = function(id_mon){
    id_hoadons = $('#id_hoadons').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/family/addCTHD`,
        method : "post",
        dataType : "json",
        data: {
            id_hoadons:id_hoadons,
            id_mons:id_mon,
        },
        success: function(data){
            orders.showBill();
            orders.toastrNoti('success','Thêm món thành công!!');
        },
        error: function(errors){
            orders.toastrNoti('error','Vui lòng chọn bàn rồi mới gọi món!!!');
        }
    });
}

orders.toastrNoti = function(type,string){
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

orders.confirm =function(id,tenmon){
    bootbox.confirm({
        size: "small",
        message: `Bạn có chắc chắn muốn xóa món ${tenmon}`,
        callback: function(result){
            if (result){
                orders.del(id);
            }
        }
    })
}

orders.confirmTT =function(total,id_hoadons){
    bootbox.confirm({
        size: "small",
        message: `Thanh toán hóa đơn???`,
        callback: function(result){
            if (result){
                orders.thanhtoan(total,id_hoadons);
            }
        }
    })
}

orders.thanhtoan = function(total,id_hoadons){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/family/pay/${id_hoadons}`,
        method : "delete",
        dataType : "json",
        data: {total:total},
        success: function(data){
            orders.showBill();
            orders.toastrNoti('success','Thanh toán thành công!!');
        },
        error: function(errors){

        }
    });
}

orders.updateSL = function(id,ele){
    soluong = $(ele).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:`http://localhost:8000/family/updateCTHD/${id}`,
        method : "put",
        dataType : "json",
        data : {soluong},
        success: function(data){
            $('#note-error').empty();
            $('#error').empty();
            orders.showBill();
            orders.toastrNoti('success','Thêm số lượng thành công!!');
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
    });
}

orders.init = function(){

};

$(document).ready( function () {
    orders.init();
} );

