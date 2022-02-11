function next_state(state) {
    switch (state) {
        case "prep": return "send";
        case "send": return "sent";
        case "sent": return "delivered";
    }
}

function get_notification_text(state) {
    switch (state) {
        case "prep": return "we succesfully recived your order!";
        case "send": return "we prepared your order, soon it will be shipped";
        case "sent": return "your order has been shipped";
        case "delivered": return "your order has arrived";
        default: return "wtf";
    }
}

function get_notification_title(state, id){
    switch (state) {
        case "prep": return "order "+id.toString()+" accepted";
        case "send": return "order "+id.toString()+" ready";
        case "sent": return "order "+id.toString()+" shipped";
        case "delivered": return "order "+id.toString()+" delivered";
        default: return "errore";
    }
}

function order_button_message(state) {
    switch (state) {
    case "": return "preparato";
    case "send": return "spedito";
    case "sent": return "consegnato";
    }
}

$(document).ready(function() {
    $(".btn-order").click(function() {
        let btn = this;
        let values = $(this).val().split(",");
        let state = values[0];
        let order_id = values[1];
        let next = next_state(state);
        let to_send = { "action": "moveOrder", "value": order_id };

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
            let klass    = "order-" + state + "-" + order_id;
            let newClass = "order-" + next  + "-" + order_id;
            $("." + klass).appendTo("#" + next + "-body");
            $("." + klass).addClass(newClass);
            $("." + klass).removeClass(klass);
            $("." + klass + "-btn").addClass(newClass + "-btn");
            $("." + klass + "-btn").removeClass(klass + "-btn");
            $(btn).val(next + "," + order_id);
            $(btn).text("Sposta in \"" + order_button_message(next) + "\"");
            if (next === "delivered") {
                $("." + newClass + "-btn").hide();
            }
        });

        let notif = { "action": "sendNotification", "state": next,"title": get_notification_title(next, order_id), "text": get_notification_text(next), "value": order_id};
        $.ajax({
            type:"POST",
            url: "ajaxHandler.php",
            data: notif
        }).done(function(response) {
            let obj = JSON.parse(response);
        });

    });
});
