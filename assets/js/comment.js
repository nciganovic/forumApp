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
                        //alert(data.msg);
                        var html = `<div class="com-and-rep mt-4">
                                        <div class="comment">
                                            <p class="mb-0"> ${data.id}, ${data.username}, now</p>
                                            <p class="mb-0"> ${data.text} </p>
                                            <a href="#" class="reply" commentid="${data.id}">reply</a>
                                        </div>
                            
                                        <form id ="f-${data.id}" class="d-none comment-form">
                                            <label for="exampleFormControlSelect2">Insert comment:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            <button class="btn btn-success mt-3 cmt" formid="${data.id}" type="button">Send</button>
                                            <button class="btn btn-danger mt-3 cancel" formid="${data.id}" type="button">Cancel</button>
                                        </form>
                                    
                                        <div id ="r-${data.id}" class="replies pl-5 mt-4 border-left">
                                            
                                        </div>
                                    </div>`;

                        if(data.parent_id == "0"){
                            $("#comments").append(html);
                            $("#f-0 textarea").val("");
                        }
                        else{
                            $(`#r-${data.parent_id}`).append(html);
                            closeAndClearComments();
                        }
                        
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

        closeAndClearComments();
        
    });
});

function closeAndClearComments(){
    $(".comment-form").each(function() {
        $(this).addClass("d-none");
        $(this).removeClass("d-block");
    });
    
    $(".comment-form textarea").each(function() {
        $(this).val("");
    });
}