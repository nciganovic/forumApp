$(document).ready(function(){

    $("#load-more").click(function(e){
        e.preventDefault();
        console.log("load more");
        
        var offset = $(this).attr("offset");
        console.log(offset);

        var ctg = $(this).attr("ctg");
        console.log(ctg);

        var order = $(this).attr("order");
        console.log(order);

        $(this).attr("offset", Number(offset) + 2);
   
        $.ajax({
            url: "models/posts/get_more_posts.php",
            method: "get",
            dataType: "json",
            data:{
                offset:offset,
                ctg:ctg,
                order:order
            },
            success:function(data){
                if(data.posts.length == 0){
                    $("#load-more").text("No more posts");
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
    
    $("#loaded-posts").append(html);
}