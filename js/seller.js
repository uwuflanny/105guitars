$(document).ready(function() {
    $('.btn-order').click(function() {
        console.log("clicked");
        let to_send = { "action": "move", "value" : $(this).val() };
        $.ajax({
            type:"POST",
            url: "ajaxHandler.php",
            data: to_send
        }).done(function(response) {
            let obj = JSON.parse(response);
            if (obj.statusCode !== 0)
                alert(obj.statusString);
            else
                alert("L'ordine è stato spostato");
        });
    });
});
