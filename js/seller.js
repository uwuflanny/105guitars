function next_state(state) {
    switch (state) {
        case "prep": return "send";
        case "send": return "sent";
        case "sent": return "delivered";
    }
}

$(document).ready(function() {
    $(".btn-order").click(function() {
        let info = $(this).attr("id").split("-");
        let order_id = info[2];
        let state = info[1];
        let next = next_state(state);
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
            $(".order-" + order_id).appendTo("#" + next + "-body");
            $(this).id = "btn-" + next + "-" + order_id;
        });
    });
});
