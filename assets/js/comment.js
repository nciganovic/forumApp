$(document).ready(function(){
    console.log("comment.js");

    $(".cmt").click(function(){
        var formID = $(this).attr("formid");

        var text = $(`#f-${formID} textarea`).val();
        text = text.trim();
        

        var postID = $("h1").attr("postid");
        console.log(formID,text, postID);

        if(text != ""){
            $.ajax({
                url: "models/comments/insert_comment.php",
                method: "post",
                dataType: "json",
                data:{
                    commentID: formID,
                    text: text,
                    postID:postID
                },
                success: function(data){
                    if(data.result == "0"){
                        console.log(data);
                        console.log(data.result);
                    }
                    if(data.result == "1"){
                        alert(data.msg);
                    }
                },
                error: function(err){
                    console.log(err);
                }
            })
        }

    })

    $(".reply").click(function(e){
        e.preventDefault();
        console.log("reply");

        var commentID = $(this).attr("commentid");
        console.log(commentID);

        $(".comment-form").each(function() {
            $(this).addClass("d-none");
            $(this).removeClass("d-block");
        });

        $(`#f-${commentID}`).addClass("d-block");
        $(`#f-${commentID}`).removeClass("d-none");
    });

    $(".cancel").click(function(e){
        e.preventDefault();
        console.log("cancel");

        $(".comment-form").each(function() {
            $(this).addClass("d-none");
            $(this).removeClass("d-block");
        });
        
        $(".comment-form textarea").each(function() {
            $(this).val("");
        });
        
    });
});
