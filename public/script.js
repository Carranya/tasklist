$(document).ready(function(){
    $("#createList").click(function(){
        $("#newList").slideDown(500);
    });

    $("#closeNewList").click(function(){
        $("#newList").slideUp(500);
    });
});


function pick(id){
    alert(id);
}