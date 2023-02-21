// add notes bloc :
$("#add").click(function() {
    $("#addbloc").fadeIn(1000);
    $("#home").addClass("trns");

});

$("#concel").click(function() {
    $("#addbloc").fadeOut(1000);
    $("#home").removeClass("trns");

});
//  end add notes;


// like scriptes :
$(".lk").click(function() {
    $(this).toggleClass("btn-like");

});
// end like scriptes ;


//comments :
$(".cmt-lk").click(function() {
    $(this).toggleClass("text-danger");
});