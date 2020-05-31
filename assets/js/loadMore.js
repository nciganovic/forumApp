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

        $(this).attr("offset", Number(offset) + 10);
   
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
        
        html +=  `<a class="text-dark text-decoration-none" href="index.php?page=post&id=${d["id"]}">
                    <div class="card mt-4 mb-4">
                        <div class="card-header d-flex">
                            <div class="img mr-3"> `

        if(d["profileimg"]){
            html += `<img class="rounded-circle" width="25px" src="uploads/${d["profileimg"]}" alt="profile"/>`
        }
        else{
            html += `<img class="rounded-circle" width="25px" src="uploads/user.jpg" alt="profile"/>`
        }
                                
        html +=`</div>
                    <div class="username">
                        ${d["username"]}
                    </div>
                    
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>${d["title"]}</p>
                        <p> <i class="fas fa-star"></i> ${d["likes"]} </p>
                        <footer class="blockquote-footer">${d["name"]} , ${d["createdat"]}</footer>
                    </blockquote>
                </div>
            </div>
        </a>`
       
    }
    
    $("#loaded-posts").append(html);
}