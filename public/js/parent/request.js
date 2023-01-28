var requestOpenDoor = document.getElementById("request-open-door");
/* preventing submiting and redirecting to other page while sending form data from parent
to mettings.php controller */
if (requestOpenDoor !== null) {
    
    requestOpenDoor.addEventListener("click",function (event) {
    
        event.preventDefault();
    
        let xhttp = new XMLHttpRequest();
        if(window.XMLHttpRequest) {
           let xhttp = new XMLHttpRequest();
        } else {
           let xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    
        var inputTime = document.getElementById("time").value;
        var inputDate = document.getElementById("date").value;
        var inputStudent = document.getElementById("student").value;
    
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('responseText').innerHTML = xhttp.responseText;
                console.log(xhttp.responseText);
                
                if(xhttp.responseText == "Successfully submitted the request"){
                    document.getElementById('responseText').setAttribute("class","alert alert-success");
                } else {
                    document.getElementById('responseText').setAttribute("class","alert alert-danger");
                }
            }
        };
    
        xhttp.open("POST","http://localhost/electronic_diary/meetings/add_meeting",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("time=" + inputTime + "&date=" + inputDate + "&student=" + inputStudent);
        
    });
}
