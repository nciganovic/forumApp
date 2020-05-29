$(document).ready(function(){
    console.log("sort.js");
    var offset = $("#load-more").attr("offset"); 
    console.log(offset);

    $("#order").change(function(){
        console.log("changed order");
        var order = $("#order").val();
        var ctg = $("#load-more").attr("ctg"); 

        $("#load-more").attr("order", order);


        $.ajax({
            url:"models/posts/get_first_n_posts_ajax.php",
            method:"get",
            data:{
                order: order,
                ctg: ctg
            },
            dataType:"json",
            success:function(data){
                if(data.result == "1"){
                    showFirstPosts(data.posts);
                    $("#loaded-posts").html("");
                    $("#load-more").text("Load more");
                    $("#load-more").attr("offset", offset);
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    })
});

function showFirstPosts(data){
    var html = "";
    
    for(d of data){
        html += "<ul>";
        html +=  `
                <li>${d.id}</li>
                <li><a href="index.php?page=post&id=${d.id}"> ${d.title} </a></li>
                <li> ${d.name} </li>
                <li> ${d.createdat} </li>
                <li> ${d.username} </li>
                <li>Likes: <span class="l-${d.id}"> ${d.likes} </span></li>
                `
        html += "</ul>";
    }
    
    $("#first-posts").html(html);
}