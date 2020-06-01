$(document).ready(function(){
    console.log("comment.js");
    
    $(document).on('click','.cmt',function(){
        var formID = $(this).attr("formid");
        var text = $(`#f-${formID} textarea`).val();
        var postID = $("h2").attr("postid");

        text = text.trim();
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
                    //alert(data.msg);
                    console.log(data.profileimg);

                    var html = `<div class="com-and-rep mt-4">
                                    <div class="comment">
                                        <div class="d-flex">
                                    `

                    if(data.profileimg){
                        html += `<img class="rounded-circle m-2" width="25px" src="uploads/${data.profileimg}" alt="profile"/>`
                    }
                    else{
                        html += `<img class="rounded-circle m-2" width="25px" src="uploads/user.jpg" alt="profile"/>`
                    }
                                        
                    html +=         `<small class="mb-0 mt-2"> ${data.username} now</small>
                                </div>
                                <p class="mb-0 p-3 bg-comment rounded"> ${data.text} </p>
                                <a href="#" class="reply" commentid="${data.id}"><small>reply</small></a>
                            </div>
                
                            <form id ="f-${data.id}" class="d-none comment-form">
                                <label for="exampleFormControlSelect2">Insert comment:</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class="btn btn-success mt-3 mr-3 cmt" formid="${data.id}" type="button">Send</button>
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
                },
                error: function(err){
                    alert(err.responseJSON.msg);
                }
            })
        }

    })

    $(document).on('click','.reply',function(e){
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

    $(document).on('click','.cancel',function(e){
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