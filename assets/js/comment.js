$(document).ready(function(){
    console.log("comment.js");

    $(".cmt").click(function(){
        console.log("comment");
        var formID = $(this).attr("formid");
        console.log(formID);

        var text = $(`#f-${formID} textarea`).val();
        text = text.trim();
        console.log(text);

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
