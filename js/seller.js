function next_state(state) {
    switch (state) {
        case "prep": return "send";
        case "send": return "sent";
        case "sent": return "delivered";
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
            $(btn).val(next + "," + order_id);
        });
    });
});
