$("#thumbnail-container > img").click(function() {
    $("#large-image").css("opacity", 0);
    $("#large-image").attr("src", $(this).attr("src"));
    $("#large-image").animate({
        opacity: '1'
    }, 1000);
});
