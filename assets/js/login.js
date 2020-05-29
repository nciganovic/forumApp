$(document).ready(function(){
    console.log("checklogin.js");

    var localEmail = localStorage.getItem("email");
    var localPsw = localStorage.getItem("psw");

    $("#exampleInputEmail").val(localEmail);
    $("#exampleInputPassword").val(localPsw);

    $(".btn").click(function(){
        var email = $("#email").val();
        var psw = $("#password").val();

        var emailRgx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var isValidEmail = emailRgx.test(email);

        var isValidPsw = true;
        if(psw.length > 25 || psw.length < 5){
            isValidPsw = false;
        }

        $(".message").html("");
    
        if(!isValidEmail || !isValidPsw){

            if(!isValidEmail){
                $(".message").append("<p class='text-danger text-center'>Email is in wrong format.</p>");
            }
            if(!isValidPsw){
                $(".message").append("<p class='text-danger text-center'>Wrong password.</p>");
            }
            
        }
        else{
            //Disable button for a few seconds
            var fewSeconds = 4;
            var btn = $(".btn");
            btn.prop('disabled', true);
            setTimeout(function(){
                btn.prop('disabled', false);
            }, fewSeconds*1000);

            //AJAX request
            $.ajax({
                url:"models/user/auth.php",
                method:"post",
                data:{
                    email:email,
                    password:psw,
                },
                dataType:"json",
                success:function(data){
                    console.log(data);
                    
                    if(data.msg == "Basic"){
                        window.location.href = "http://localhost/forumApp/index.php";
                    }
                    else{
                        window.location.href = "http://localhost/forumApp/index.php?page=dashboard&width=1";
                    }
                        
                },
                error:function(err){
                    $(".message").html(`<p class="text-danger">${err.responseJSON.msg}</p>`);
                }
            })
        }
    })
})