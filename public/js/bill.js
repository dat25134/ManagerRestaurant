var bills = bills || {};
bills.showpublic =function(data){
    $.each(data,function(i,v){
        $('#myTablelist tbody').append(
            `<tr>
            <th scope="row">${i+1}</th>
            <td>${v.ngay_gio_lap}</td>
            <td>${v.giothanhtoan}</td>
            <td>${v.vats}</td>
            <td>${v.ban.tenban}</td>
            <td>${v.user.name}</td>
            <td>${Number(v.total).toLocaleString('en')+ ' VNĐ'}</td>
            <td><button class="btn btn-warning" onclick="bills.chitiet(${v.id})">Chi tiết</button></td>
        </tr>`
        )
    })
}
bills.show = function(){
    $.ajax({
        url : location.origin+'/dashboard/bills/billsAPI',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTablelist tbody').empty();
            // $('#myTablelist').DataTable.destroy();
            bills.showpublic(data);
            $('#myTablelist').DataTable();
        }
    })
};

bills.showDate = function(element){
    day = $(element).val();
    $.ajax({
        url : location.origin+'/dashboard/bills/getBillDay',
        method : "get",
        dataType : "json",
        data: {day:day},
        success : function(data){
            $('#myTablelist tbody').empty();
            // $('#myTablelist').DataTable.destroy();
            bills.showpublic(data);
            $('#myTablelist').DataTable();
        }
    })
};

bills.chitiet = function(id){
    $('#listBill').hide();
    $('#chiTietBill').show();
    $.ajax({
        url : location.origin+`/dashboard/bills/getBillsAPI/${id}`,
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data.chitiet,function(i,v){
                $('#myTable tbody').append(
                    `<tr>
                    <th scope="row">${i+1}</th>
                    <td>${v.tenmon}</td>
                    <td>${v.gia}</td>
                    <td>${v.soluong}</td>
                    <td>${v.km}</td>
                    <td>${Number(v.gia*v.soluong*(100-v.km)/100).toLocaleString('en')+ ' VNĐ'}</td>
                </tr>`
                )
            })
            $('#myTable').DataTable();
        }
    })
}

bills.back = function(){
    $('#listBill').show();
    $('#chiTietBill').hide();
    $('#myTable').DataTable().destroy();
}

bills.init = function(){
    bills.show();
};

$(document).ready( function () {
    bills.init();
} );

