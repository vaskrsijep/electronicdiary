<audio class="ring" id="ring">
    <source src="<?php echo URLROOT . "/public/music/msg_ton.mp3" ?>" type="audio/mpeg">
</audio>
</div>
<!-- /#wrapper -->

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

<script src="<?php echo URLROOT; ?>/js/teacher/response.js"></script>

<script>
    let wrapper = document.getElementById("wrapper");
    let body = document.getElementById("page-top");
    let model = document.getElementById("popup_add");
    let add_open_door = document.getElementById("add_open_door");
    let add_save = document.getElementById("add_save");
    let add_cansel = document.getElementById("add_cansel");
    let add_cansel_x = document.getElementById("add_cansel_x");
    let data_for_time = document.getElementById("id_time");
    let data_for_date = document.getElementById("id_date");



    let messages = document.getElementById('messages');
    let ring = document.getElementById('ring');
    let id_user = document.getElementById('to_id');
    let msg;


    let meetings = {}; 

meetings.showParent = () => {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             
              let txt = "";  
               let meeting; 
               let cc = this.responseText
               meeting = JSON.parse(cc);
                let y = 0; 
              for (i in meeting) {
                y++
                txt += `<div class='container border-bottom m-1'>
                        <div class='row text-dark text-center'>
                        <div class='col-4 p-1'><b>${y}:</b> Data and Time: <b>${meeting[i].meetings}</b></div>
                        <div class='col-3 p-1'>Username: <b>${meeting[i].name}</b></div>
                        <div class='col-1 offset-4 p-1'>${meeting[i].div}</div>
                        </div></div>`;
              }
              document.getElementById('show_consultation').innerHTML = txt;
          }
      };
      xmlhttp.open("GET", "<?php echo URLROOT; ?>/meetings/showTeacher", true);
      xmlhttp.send();
}
meetings.showParent();
meetings.add_popup = () => {
      model.style.display = "block"; 
}

meetings.close_popup = () => {
      model.style.display = "none"; 
}

meetings.close = () => {

}

meetings.save = () => {
    model.style.display = "none";  

    let dataFromInputDate;
    let dataFromInputTime;

    dataFromInputDate = data_for_date.value;
    dataFromInputTime = data_for_time.value;
    

    $.ajax({
        type: 'POST', 
        url: "<?php echo URLROOT; ?>/meetings/add_meetings", 
        data: 'date=' + dataFromInputDate + '&time=' + dataFromInputTime,
        success: function(msg) {
             
        }
    });
}


add_open_door.addEventListener("click", meetings.add_popup);
add_cansel.addEventListener("click", meetings.close_popup); 
add_cansel_x.addEventListener("click", meetings.close_popup); 
add_save.addEventListener("click", meetings.save);



    // show background transparent and heidt
    function showBG() {
        wrapper.insertAdjacentHTML("afterend", "<div id='bgd' class='modal-backdrop fade show'></div>");
    }

    function heighBG() {
        body.removeChild(model);
    }

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
        xmlhttp.onreadystatechange = function() {
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
        xmlhttp.onreadystatechange = function() {
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
                par = document.createElement('p'),
                date = document.createElement('span');

            new_message.className = 'outgoing_msg message';
            outgoing.className = 'sent_msg';
            date.className = 'time_date';

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
            xmlhttp.onreadystatechange = function() {
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
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText > 0) {
                    new_message.innerHTML = this.responseText;
                }
            }
        };

        xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/notification", true);

        xmlhttp.send();

    }

    notification_message();
    $d = setInterval(notification_message, 1000);
</script>

<script>
    $(document).ready(function() {
        let id;

        $("#update_trimester").on('click', function() {

            var updateData = $('#form-update').val();
            document.getElementById(id).innerHTML = updateData;
            $('.modal').hide()
            $.post("<?php echo URLROOT; ?>/grades/updateTrimester", {
                id: id,
                updateData: updateData
            }, function(data) {

            });


        });

        $(".trimester").on('click', function() {

            id = $(this).attr('rel');
            console.log(id);

        });

    });
</script>

</body>

</html>