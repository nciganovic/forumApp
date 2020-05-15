$(document).ready(function(){
    console.log("comment.js");

    $(".cmt").click(function(){
        console.log("comment");
    })

    $(".reply").click(function(e){
        e.preventDefault();
        console.log("reply");

        commentID = $(this).attr("commentid");
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

        formID = $(this).attr("commentid");
        console.log(commentID);
        
        $(`#f-${formID}`).removeClass("d-block");
        $(`#f-${formID}`).addClass("qweqwqwe");

        $(".comment-form").each(function() {
            $(this).addClass("d-none");
            $(this).removeClass("d-block");
        });
        
    });
});
