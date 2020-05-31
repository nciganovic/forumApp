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
                showFirstPosts(data.posts);
                $("#loaded-posts").html("");
                $("#load-more").text("Load more");
                $("#load-more").attr("offset", offset);
            },
            error:function(err){
                console.log(err.responseJSON.msg);
            }
        });
    })
});

function showFirstPosts(data){
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
    
    $("#first-posts").html(html);
}