$(document).ready(function(){
    $(".upvote").click(function(e){
        e.preventDefault();

        var id = $(this).attr("data");
        
        console.log("Click on ", id);
    });

    $(".set-alert").click(function(e){
        e.preventDefault();
        alert("You need to login in order to upvote.")
    });
})