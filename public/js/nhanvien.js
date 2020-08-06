var nhanvien = nhanvien || {};

nhanvien.show = function(){
    $.ajax({
        url : 'http://localhost:8000/dashboard/apiNhanvien',
        method : "get",
        dataType : "json",
        success : function(data){
            $('#myTable tbody').empty();
            $.each(data,function(i,v){
                $('#myTable tbody').append(
                    `<tr>
                        <td>${v.id}</td>
                        <td>${v.name}</td>
                        <td><img src="${v.image64}" style="width:60px; height: 60px; border-radius:50%"></td>
                        <td>${v.email}</td>
                        <td>${v.created_at}</td>
                        <td class="text-center">
                            <a href="javascript:;" class="text-primary mr-5"
                                    onclick=""><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:;" class="text-danger"
                                    onclick=""><i class="fa fa-trash" aria-hidden="true"></i>
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
        $("#image64").attr("src",reader.result);
        $('#input-value').val(reader.result);
    }
    reader.readAsDataURL(img);
}

nhanvien.openModal = function(){
    $("#add-edit").modal('show');
}

nhanvien.create =function(){
     if ($('#reg-form').valid()){
        var obj = {};
        var reader= new FileReader();
        reader.onloadend = function() {
            console.log('reader ' + reader.result);
        }
        obj.name = $('#name').val();
        obj.email = $('#email').val();
        obj.password = $('#password').val();
        obj.image64 = $('#input-value').val();
         $.ajax({
            url:"http://localhost:8000/dashboard/apiNhanvien/dangki",
            method: 'POST',
            dataType:"json",
            contentType: "application/json",
            data:JSON.stringify(obj),
            success : function(data){
                console.log(data);
            },
            error : function(){
                console.log('123123');
            }
        })
     };
}

nhanvien.init = function(){
    nhanvien.show();
};

$(document).ready( function () {

    nhanvien.init();
} );
