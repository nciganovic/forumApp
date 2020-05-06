$(document).ready(function(){
    console.log("register.js");

    $(".btn").click(function(){

        var username = $("#username").val();
        var email = $("#email").val();
        var psw = $("#password").val();
        var pswR = $("#password2").val();

        var usernameRgx = /^(?=.{5,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
        var isValidUsername = usernameRgx.test(username);

        var emailRgx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var isValidEmail = emailRgx.test(email);

        var isValidPsw = true;
        if(psw.length > 25 || psw.length <= 4 || pswR.length > 25 || pswR.length <= 4){
            isValidPsw = false;
        }

        $(".message").html("");
        $(".server-erros").html("");
        if(!isValidUsername || !isValidEmail || !isValidPsw || psw != pswR){
            if(!isValidUsername){
                $(".message").append("<p class='text-danger text-center'>Username is in wrong format. Valid formats are: user_15 , user.15 , user15 .</p>");
            }

            if(!isValidEmail){
                $(".message").append("<p class='text-danger text-center'>Email is in wrong format.</p>");
            }

            if(!isValidPsw){
                $(".message").append("<p class='text-danger text-center'>Password is invalid. Must be between 5 and 25 characters.</p>");
            }

            if(psw != pswR){
                $(".message").append("<p class='text-danger text-center'>Passwords are not identical.</p>");
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

            $(".message").html("<p class='text-center'>Sending...</p>");
            
            //AJAX request
            $.ajax({
                url:"models/user/insertuser.php",
                method:"post",
                data:{
                    username:username,
                    email:email,
                    password:psw,
                    password2:pswR
                },
                dataType:"json",
                success:function(data){
                    console.log(data);
                    
                    if(data.result == "0"){
                        $(".message").html(data.msg);
                    }
                    else{
                        $(".message").html(data.msg);
                        
                        $("#username").val("");
                        $("#email").val("");
                        $("#password").val("");
                        $("#password2").val("");
                    }
                    
                },
                error:function(err){
                    console.log(err);
                }
            })
        }
        
        
    
        
    
    })
})