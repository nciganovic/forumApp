$(document).ready(function(){
    console.log("changeInfo.js");

    $(".btn").click(function(){
        var username = $("#username").val().trim();
        var bio = $("#bio").val().trim();
    
        console.log(username, bio);
        
        var usernameRgx = /^(?=.{5,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
        var isValidUsername = usernameRgx.test(username);

        if(isValidUsername && bio.length <= 255){
            return true;
        }
        else{
            $(".errors").html("");

            if(!isValidUsername){
                $(".errors").append("<p class='text-center text-danger'>Username is not valid.</p>");
            }
            if(bio.length > 255){
                $(".errors").append("<p class='text-center text-danger'>Bio is too long, max is 255 chars.</p>");
            }
        
            return false;
        }
    })

    $("#bio").keyup(function(){
        var text = $("#bio").val().trim();
        var len = text.length;
        $("#bio-count").text(len);
    })

});