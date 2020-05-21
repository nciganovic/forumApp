$(document).ready(function(){
    console.log("change password");

    $(".btn").click(function(){
        console.log("click");

        var oldPassword = $("#old-psw").val();
        var newPassword1 = $("#new-psw-1").val();
        var newPassword2 = $("#new-psw-2").val();

        $(".message").html("");

        var isValidPsw = true;
        if(newPassword1.length > 25 || newPassword1.length < 5 || newPassword2.length > 25 || newPassword2.length < 5){
            $(".message").append("<p class='text-danger text-center'>New password is invalid. Must be between 5 and 25 characters.</p>");
            isValidPsw = false;
        }

        if(newPassword1 != newPassword2){
            $(".message").append("<p class='text-danger text-center'>New passwords are not identical.</p>");
            isValidPsw = false;
        }

        if(oldPassword == newPassword2 || oldPassword == newPassword1){
            $(".message").append("<p class='text-danger text-center'>Current and new password are same.</p>");
            isValidPsw = false;
        }

        if(oldPassword.length < 5 || oldPassword.length > 25){
            $(".message").html("<p class='text-danger text-center'>Wrong current password.</p>");
            isValidPsw = false;
        }

        if(isValidPsw){
            //AJAX request
            $.ajax({
                url:"models/user/update_password.php",
                method:"post",
                data:{
                    oldPassword: oldPassword,
                    newPassword1:newPassword1,
                    newPassword2:newPassword2
                },
                dataType:"json",
                success:function(data){
                    console.log(data);

                    if(data.result == "1"){
                        $(".message").html(`<p class='text-success text-center'>${data.msg}</p>`); 
                    }
                    else{
                        $(".message").html(`<p class='text-danger text-center'>${data.msg}</p>`);
                    }

                },
                error:function(err){
                    console.log(err);
                }
            })
        }

        

    })

});