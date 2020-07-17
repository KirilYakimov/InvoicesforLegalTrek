$(document).ready(function () {
    $(".custom-nav-toggle").hover(
        function () {
            $("#navbarSupportedContent").slideDown("show");
        },
    );
    $("#navbarSupportedContent").mouseleave(function (){
        $(this).slideUp("slow");
    });
});