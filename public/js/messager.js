
var messages = document.getElementById('messages');
var ring = document.getElementById('ring');
var id_user = document.getElementById('to_id');
var msg;

//scroll div messager
function scroll() {
    messages.scrollTop = messages.scrollHeight;
    return;
}

//detect click Enter, assci code = 13 
function keySend(event) {
    var key = event.keyCode;
    if (key == 13) {
        sendMessage();
    }
}

// Read all message from user 
function readMessages(id) {
    to_id.value = id;

    document.getElementById('type_msg').style.display = 'block';

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            messages.innerHTML = this.responseText;
            scroll();
        }
    };
    xmlhttp.open("GET", "<?php echo URLROOT; ?> /messages/get_all?id=" + id, true);
    xmlhttp.send();

    msg = setInterval(queryMessager, 2000);
}

// Read new message 
function queryMessager() {

    var id = to_id.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "") {
                var new_dir = document.createElement("div");
                new_dir.innerHTML = this.responseText;
                messages.appendChild(new_dir);
                scroll();
                ring.play();
            }
        }
    };

    xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/get_msg?id=" + id, true);
    xmlhttp.send();
}

//Send message
function sendMessage() {
    id_user = to_id.value;
    var message = document.getElementById('message').value;
    if (message == "" || message == null) {
        document.getElementById('message').focus();
    } else {
        var new_message = document.createElement("div"),
            outgoing = document.createElement("div"),
            msgg = document.createElement('span'),
            date = document.createElement('span');

        new_message.className = 'outgoing_msg message';
        outgoing.className = 'sent_msg';
        date.className = 'time_date';
        msgg.className = 'msgbg';

        new_message.appendChild(outgoing);
        outgoing.appendChild(msgg);
        outgoing.appendChild(date);

        var d = new Date();

        //// 

        var datetext = document.createTextNode('');

        date.appendChild(datetext);

        var text = document.createTextNode(message);

        msgg.appendChild(text);

        document.getElementById('message').value = "";

        messages.appendChild(new_message);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

            }
        };
        xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/new_message?id=" + id_user + "&message_content=" + message, true);
        xmlhttp.send();
        messages.scrollTop = messages.scrollHeight;
    }
}

//Notificatio new messages 
function notification_message() {
    var new_message = document.getElementById('new_message');

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText > 0) {
                new_message.innerHTML = this.responseText;
                ring.play();
            }
            else {
                new_message.innerHTML = "";
            }
        }
    };

    xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/notification", true);

    xmlhttp.send();

}

$d = setInterval(notification_message, 1000);








