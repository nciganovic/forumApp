$(document).ready(function(){
    console.log("search");

    $(".search-btn").click(function(){
        var search = $("#search-txt").val().trim();
        var offset = 0;

        $("#loader").text("Load more");
        $("#loader").attr("search", search);
        $("#loader").attr("offset", 10); // Change later to different number
        $("#search-txt").val("");

        if(search != ""){
            $.ajax({
                url: "models/posts/search_post.php",
                method: "get",
                dataType: "json",
                data:{
                    search:search,
                    offset:offset
                },
                success:function(data){
                    console.log(data);
                    
                    if(data.posts.length == 0){
                        showError(search, true);
                        $("#loader").addClass("d-none");
                        $("#loader").removeClass("d-block");
                    }
                    else{
                        //Display load more link
                        $("#loader").removeClass("d-none");
                        $("#loader").addClass("d-block");

                        showPosts(data.posts, true);
                    }    
                    
                },
                error:function(err){
                    console.log(err);
                }
            });
        }
    });

    $(".load").click(function(e){
        e.preventDefault();
        const step = 10;

        var search = $(this).attr("search");
        var offset = $(this).attr("offset");

        $(this).attr("offset", Number(offset) + step);

        console.log("Offset", offset, "Search", search);

        $.ajax({
            url: "models/posts/search_post.php",
            method: "get",
            dataType: "json",
            data:{
                search:search,
                offset:offset
            },
            success:function(data){
                console.log(data);
        
                if(data.posts.length == 0){
                    showError(search, false);
                }
                else{
                    showPosts(data.posts, false);
                }    
                
            },
            error:function(err){
                console.log(err);
            }
        });

    });

});

function showPosts(data, isNew){
    var html = "";
    for(d of data){
        console.log(d["profileimg"]);
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
    
    if(isNew){
        $("#search-posts").html(html);
    }
    else{
        $("#search-posts").append(html);
    }
    
}

function showError(search, isFirst){
    html = `<p class="text-center"> Post '${search}' not found. </p>`;
    if(isFirst){
        $("#search-posts").html(html);
    }
    else{
        $("#loader").text("No more posts");
    }

}