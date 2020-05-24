$(document).ready(function(){
    console.log("deleteRow.js");

    $(".del").click(function(e){    
        e.preventDefault();

        var table = $(this).attr("table");
        var id = $(this).attr("id");
    
        console.log(table, id);

        $.ajax({
            url:"models/admin/delete_row.php",
            method:"post",
            data:{
                table:table,
                id:id,
            },
            dataType:"json",
            success:function(data){
                if(data.result == "1"){
                    populateTableRows();
                }
            },
            error:function(err){
                console.log(err);
            }
        });

    });
    
});

function populateTableRows(){
    html = "";
}