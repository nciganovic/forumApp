$(document).ready(function(){
    console.log("deleteRow.js");

    $(document).on('click','.del',function(e){    
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
                populateTableRows(data.allrows, table);
            },
            error:function(err){
                alert(err.responseJSON.msg);
            }
        });

    });
    
});

function populateTableRows(all_rows, table){
    
    var len = Object.keys(all_rows[0]);
    var size = len.length;
    
    var html = "";
    console.log(all_rows)
    
    for(var i = 0; i < all_rows.length; i++){
        html += "<tr>";

        console.log(all_rows[i]);

        for(var y = 0; y < size / 2; y++){
            if(all_rows[i][y] != null){
                html += `<td class='p-3'> ${all_rows[i][y]} </td>`;
            }
            else{
                html += `<td class='p-3'>  </td>`;
            }
        }
         
        html += `
                <td class="p-3">
                    <a href="index.php?page=row&width=1&table=${table}&type=edit&id=${all_rows[i]["id"]}"> Update </a>
                </td>
                `

        html += `
                <td class="p-3"> 
                    <a href="#" class="del" table="${table}" id="${all_rows[i]["id"]}" > Delete </a>
                </td>
                `

        html += "</tr>";
    }
    console.log(html);

    $("#table-body").html(html);
}