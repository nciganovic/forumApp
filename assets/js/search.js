$(document).ready(function(){
    console.log("search");

    $(".search-btn").click(function(){
        var search = $("#search-txt").val().trim();
        var offset = 0;

        $("#loader").text("Load more");
        $(".load").attr("search", search);
        $(".load").attr("offset", 2); // Change later to different number
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
                        $("#loader").text("");
                    }
                    else{
                        //Display load more link
                        $(".load").removeClass("d-none");
                        $(".load").addClass("d-block");

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
        const step = 2;

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