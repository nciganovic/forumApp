$(document).ready(function(){
    $(".upvote").click(function(e){
        e.preventDefault();

        var postID = $(this).attr("post");
        var userID = $(this).attr("user");
        
        var currentTag = $(this);

        $.ajax({
            url: "models/upvotes/upvote_post.php",
            method: "post",
            dataType: "json",
            data:{
                postID: postID,
                userID: userID
            },
            success: function(data){
                console.log(data.msg);
                if(data.msg == "upvoted"){
                    currentTag.text("Already upvoted");

                    likesCount = $(`.l-${postID}`).text();
                    var addLike = Number(likesCount) + 1;
                    $(`.l-${postID}`).text(addLike);

                }
            },
            error: function(err){
                console.log(err);
            }
        });

    });

    $(".set-alert").click(function(e){
        e.preventDefault();
        alert("You need to login in order to upvote.")
    });
})