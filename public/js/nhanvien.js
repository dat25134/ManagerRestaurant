var nhanvien = nhanvien || {};

nhanvien.show = function(){
    $.ajax({
        url : 'http://localhost:8000/api/nhanvien',
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
                        <td>
                            <a href="javascript:;" class="btn btn-primary"
                                    onclick="">Edit</a>
                            <a href="javascript:;" class="btn btn-danger"
                                    onclick="">Delete</a>
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

nhanvien.openModal = function(){
    $("#add-edit").modal('show');
}

nhanvien.init = function(){
    nhanvien.show();
};

$(document).ready( function () {

    nhanvien.init();
} );
