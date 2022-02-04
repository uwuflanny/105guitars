$("#thumbnail-container > img").click(function() {
    $("#large-image").css("opacity", 0);
    $("#large-image").attr("src", $(this).attr("src"));
    $("#large-image").animate({
        opacity: '1'
    }, 1000);
});

$(document).ready(function() {
    $('#btnProduct').click(function() {
        dataToSend = { "action": "addToCart",
                       "value" : $(this).val() };
        $.ajax({
            type:"POST",
            url: "ajaxHandler.php",
            data: dataToSend
        }).done(function(response) {
            responseObj = JSON.parse(response);
            if(responseObj.statusCode !== 0)
                alert(responseObj.statusString);
            else {
                alert("Article added to the cart!");
                console.log(responseObj.numProducts);
                $(".cart-number").text(responseObj.numProducts);
            }
        });
    });
});
