$(document).ready(function(){
    console.log("search");

    $("#search-btn").click(function(){
        var search = $("#search-txt").val().trim();
        console.log(search);

        $("#search-txt").val("");

        if(search != ""){
            $.ajax({
                url: "models/posts/search_post.php",
                method: "get",
                dataType: "json",
                data:{
                    search:search
                },
                success:function(data){
                    console.log(data);
                    showPosts(data.posts);

                    if(data.posts.length == 0){
                        showError(search);
                    }

                },
                error:function(err){
                    console.log(err);
                }
            });
        }

    });
});

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
    
    $("#search-posts").html(html);
}

function showError(search){
    html = `<p class="text-center"> Post '${search}' not found. </p>`;
    $("#search-posts").html(html);
}