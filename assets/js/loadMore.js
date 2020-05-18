$(document).ready(function(){

    $("#load-more").click(function(){
        console.log("load more");
        
        var offset = $(this).attr("offset");
        console.log(offset);
   
        $.ajax({
            url: "models/posts/get_more_posts.php",
            method: "get",
            dataType: "json",
            data:{
                offset:offset
            },
            success:function(data){
                console.log(data);
                if(data.result == "0"){
                    console.log(data.msg);
                }
                else{
                    showPosts(data.posts);
                }

            },
            error:function(err){
                console.log(err);
            }
          
        });
        
    });

})

function showPosts(data){
    var html = "";
    html += "<ul>";
    for(d of data){
        html =  `
                <li>${d.id}</li>
                <li><a href="index.php?page=post&id=${d.id}"> ${d.title} </a></li>
                <li> ${d.name} </li>
                <li> ${d.createdat} </li>
                <li> ${d.username} </li>
                <li>Likes: <span class="l-${d.id}"> ${d.likes} </span></li>
                `
    }
    html += "</ul>";
    $("#loaded-posts").html(html);
}