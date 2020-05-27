$(document).ready(function(){
    console.log("exportWord.js");

    $(".btn").click(function(){
        var bio = $("#bio").text();

        //AJAX request
        $.ajax({
            url:"models/author/export_word.php",
            method:"post",
            data:{
                bio:bio
            },
            dataType:"json",
            success:function(data){
                console.log(data);
            },
            error:function(err){
                console.log(err);
            }
        })
    });

});