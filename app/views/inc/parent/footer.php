<audio class="ring" id="ring">
         <source src="<?php echo URLROOT . "/public/music/msg_ton.mp3" ?>" type="audio/mpeg">
</audio>
  </div>
  <!-- /#wrapper -->

  <!-- custom js function to prevent default event of submit on parrent page and send data 
  to teacher request page using ajax call in json format -->
  <script src="<?php echo URLROOT; ?>/js/parent/request.js"></script>
  
  <!-- jQuery -->
  <script src="<?php echo URLROOT; ?>/js/dashboard/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo URLROOT; ?>/js/dashboard/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript-->
  <script src="<?php echo URLROOT; ?>/css/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT; ?>/css/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URLROOT; ?>/css/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URLROOT; ?>/js/dashboard/sb-admin.js"></script>

  <!-- -->
  <script>
var messages = document.getElementById('messages');
var ring = document.getElementById('ring');
var to_id = document.getElementById('to_id');
var msg

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
            par = document.createElement('span'),
            date = document.createElement('span');

        new_message.className = 'outgoing_msg message';
        outgoing.className = 'sent_msg';
        date.className = 'time_date';
        par.className = 'msgbg1';

        new_message.appendChild(outgoing);
        outgoing.appendChild(par);
        outgoing.appendChild(date);

        var d = new Date();

        //// 

        var datetext = document.createTextNode('');

        date.appendChild(datetext);

        var text = document.createTextNode(message);

        par.appendChild(text);

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
            }
            else {
                new_message.innerHTML = "";
            }
        }
    };

    xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/notification", true);

    xmlhttp.send();

}
notification_message();
$d = setInterval(notification_message, 1000); 
  </script>

  </body>

  </html>