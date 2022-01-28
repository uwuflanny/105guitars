$(document).ready(function() {
    $('#btnProduct').click(function() {
        data_to_send = { "action": "addToCart",
                         "value" : $(this).val() };
        $.ajax({
            type:"POST",
            url: "ajaxHandler.php",
            data: data_to_send
        }).done(function(response) {
            alert(response);
        });
    });
});
