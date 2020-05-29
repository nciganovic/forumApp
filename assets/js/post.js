$(document).ready(function(){
    $("#submit").click(function(){
        console.log("Click submit");

        var title = $("#title").val();
        var desc = $("#desc").val();
        var ctg = $("#ctg").val();

        //Trimming strings
        title = title.trim();
        desc = desc.trim();
        ctg = ctg.trim();

        errors = [];

        if(title.length < 10){
            errors.push("Title is too short. Minimum 10 characters.");
        }
        else if(title.length > 100){
            errors.push("Title is too long. Maximum 100 characters.");
        }

        if(desc.length < 20){
            errors.push("Description is too short. Minimum 20 characters.");
        }
        else if(desc.length > 2000){
            errors.push("Description is too long. Maximum 2000 characters.");
        }

        if(ctg == "0"){
            errors.push("You need to select category.");
        }

        $(".message").html("");
        
        if(errors.length > 0){
            for(x of errors){
                $(".message").append("<p class='text-center text-danger'>" + x + "</p>");
            }
        }
        else{
            $.ajax({
                url: "models/posts/insert_post.php",
                method: "post",
                dataType: "json",
                data:{
                    title:title,
                    desc:desc,
                    ctg:ctg
                },
                success: function(data){
                    window.location.href = "http://localhost/forumApp/index.php";
                },
                error: function(err){
                    $(".message").append("<p class='text-center text-danger'>" + err.responseJSON.msg + "</p>");
                }
            })
        }
        console.log(title, desc, ctg);
    });
});