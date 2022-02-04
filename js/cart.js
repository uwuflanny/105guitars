$(document).ready(function() {
    $('.btnRemove').click(function() {
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
            } else {
                alert(responseObj.statusString);
            }
        }); 
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
