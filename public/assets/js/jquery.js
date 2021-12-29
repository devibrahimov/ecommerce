///modal-compare
$(".compareOpen").each(function () {
    $(this).on("click", function () {
        $(".modal-compare").fadeIn("slow")
        $(".modal-compare").css({ "z-index": "999999", });
        $("body").css({ "overflow": "hidden" });
    });
});
$(".modal-compare .close2").on("click", function () {
    $(".modal-compare").fadeOut("fast");
    $("body").css({ "overflow": "auto" });
})


///model
$(".eye").each(function () {
    $(this).on("click", function () {
        $(".modal1").fadeIn("slow")
        $(".modal1").css({ "z-index": "999999", });
        $("body").css({ "overflow": "hidden" });
    });
});
$(".close1").on("click", function () {
    $(".modal1").fadeOut("fast");
    $("body").css({ "overflow": "auto" });
})


///cartitem
$( ".shopping_bag" ).on("click",function(){
        $( ".opencart" ).slideToggle();
})


//fixed
$(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
        $(".backtotop a").fadeIn("slow")
    }
    else {
        $(".backtotop a").fadeOut("slow")
    }
})
$(".backtotop a").click(function () {
    $("html, body").animate({ scrollTop: 10 }, 1000);
    return false;
})

//mobil
$(".barclick li").on("click",function(){
    $( ".ulMenu" ).fadeIn('slow');
    $("body").css({"overflow":"hidden","transition":"0.5s"})
})
$(".mobilClose a").on("click",function(){
    $( ".ulMenu" ).fadeOut('slow');
    $("body").css({"overflow":"auto"})
})

//login-register
$(".Login_Registr").on("click",function(){
        $(".login").fadeToggle("slow");
})
