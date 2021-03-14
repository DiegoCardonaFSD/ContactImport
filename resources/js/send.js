$(document).ready(function(){
    var firstClick = false;
    $('#submit').on("click", function(){
        if(firstClick){
            $(this).attr("disabled", true);
        }
        $(this).html("Sending...");
        $(this).parent('form').submit();
        firstClick = true;
    });
})
