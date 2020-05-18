$(document).ready(function(){
    console.log("search");

    $("#search-btn").click(function(){
        var search = $("#search-txt").val().trim();
        console.log(search);

        $("#search-txt").val("");

        if(search != ""){
            $.ajax({
                url: "models/posts/search_post.php",
                method: "get",
                dataType: "json",
                data:{
                    search:search
                },
                success:function(data){
                    console.log(data);
                },
                error:function(err){
                    console.log(err);
                }
            });
        }

    });
});

function showPosts(data){

}