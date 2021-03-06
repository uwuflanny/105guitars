$(document).ready(function() {
    $('.btn-remove').click(function() {
        articleSerial = $(this).val();
        let dataToSend = { "action" : "removeFromCart",
                            "value" : articleSerial };

        $.ajax({
            type: "POST",
            url: "ajaxHandler.php",
            data: dataToSend
        }).done(function(response) {
            responseObj = JSON.parse(response);
            if(responseObj.statusCode !== 1) {
                alert("Article removed");
                updatePrice();
                $(".cart-number").text(responseObj.numProducts);
            } else {
                alert(responseObj.statusString);
            }
        });

    });

    $("#btn-checkout").click(function() {
        location.href = "checkout.php";
    });

    function updatePrice() {
        $("#" + articleSerial).remove();
        let newPrice = 0;
        $(".item-price").each(function(index) {
            let text = $(this).text();
            newPrice += parseInt(text.slice(0, -1));
        });

        if($(".item-price").length > 0) {
            $("#price").text(newPrice+"$");
        } else {
            $("article").remove();
            $(".alert").removeClass("visually-hidden");
        }
    }


});
