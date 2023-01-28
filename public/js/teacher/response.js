let xhttp = new XMLHttpRequest();
if (window.XMLHttpRequest) {
    let xhttp = new XMLHttpRequest();
} else {
    let xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}


 

function aprove(id_meeting, x, r) {
    
    var btn = document.getElementsByClassName('btn'); 
    var btn1 = "ab" + id_meeting;
    var btn2 = "db" + id_meeting; 

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var child = document.getElementById(id_meeting);
            var parent = document.getElementById('tabela1'); 
            if(x == 2) { 
                document.getElementById(btn1).innerHTML = ""; 
                document.getElementById(btn2).innerHTML = "<span class='text-success text-center'>Success</span>"
                //id_row.childNodes[3].innerHTML = "Accept"
            } else if(x == 1) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("tabela1").deleteRow(i);
            }
           
            

        }

    }

    xhttp.open("POST", "http://localhost/electronic_diary/meetings/updatemeetingstatus", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var inputFromTeacher1 = "status="+status+"&id_meeting=" + id_meeting;

    xhttp.send(inputFromTeacher1);
}



function un_aprove(id_meeting) {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (xhttp.readyState == 4) {
            alert('Status upadted');
        }

    }

    xhttp.open("POST", "http://localhost/electronic_diary/meetings/updatemeetingstatus", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var inputFromTeacher2 = "status=0&id_meeting=" + id_meeting;

    xhttp.send(inputFromTeacher2);

}