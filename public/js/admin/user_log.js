function checkUserActivity() {
    var entireRow = $('.col-lg-12');
    var currentTimeAndDate = new Date($.now());
    // creating a div that and adding bootstrap class that will make the table responsive
    var divTableResponsive = document.createElement('div');
    divTableResponsive.setAttribute('class','table-responsive');
    // creating table tag and adding bootstrap class for a stripped table
    var logTable = document.createElement('table');
    logTable.setAttribute('class', 'table table-striped');
    // creating table head and appending row to it
    var logTableHead = document.createElement('thead');
    var tableHeadingRow = document.createElement('tr');
    logTableHead.append(tableHeadingRow);
    // creating table body
    var logTableBody = document.createElement('tbody');

    logTable.appendChild(logTableHead);
    logTable.appendChild(logTableBody);
    divTableResponsive.appendChild(logTable);
    
    entireRow.append(divTableResponsive);

    $.ajax({
        url : 'http://localhost/electronic_diary/users/showLastLoggedInTime',
        method: 'POST',
        data: '',
        dataType: 'json',
        success: function (data) {
            //Getting all log data from DB
            var data = data;
            
            for (let i = 0; i < data.length; i++) {
                
                var logTableRow = document.createElement('tr');
                logTableBody.appendChild(logTableRow);
                
                for (var jsonKey in data[i]) {

                    if (i == 1 && jsonKey !== 'id_user') {
                        var tableHeadingTxt = document.createTextNode(jsonKey.toUpperCase());
                        var tableHeading = document.createElement('th');
                        tableHeading.setAttribute("class", "p-2");
                        tableHeadingRow.append(tableHeading);
                        tableHeading.appendChild(tableHeadingTxt); 
                    }
                    
                    var logTableCell = document.createElement("td");
                    // for each json object it adds format of text like this key: value 
                    var contentOfDiv = data[i][jsonKey];
                    // created text out of Json data
                    var  logDataText = document.createTextNode(contentOfDiv);
                    
                    if (jsonKey === 'id_user') {
                        // we will not show id_user on the page
                        continue;
                    } else if ( jsonKey === 'login_time') {
                        // added a login time so we can compare logout and login time
                        var loginTime = data[i][jsonKey];
                        logTableCell.setAttribute("class","logout-time p-2 text-white");
                    } else if (jsonKey === 'logout_time') {
                        logTableRow.setAttribute("id", i);
                        var lastLoggedOutTime = data[i][jsonKey];
                        // added logout-time class so we can compare logout time to current time
                        logTableCell.setAttribute("class","logout-time p-2 text-white");
                    } else {
                        logTableCell.setAttribute("class","p-2 text-white");
                    }

                    // filled each logTableCell with text 
                    logTableCell.appendChild(logDataText);

                    // filled entire row with all columns and their data
                    logTableRow.append(logTableCell);
                    
                }
                
                function rowColor(currentTimeAndDate,lastLoggedOutTime) {

                    if (lastLoggedOutTime === null) {
                        logTableRow.setAttribute("class","bg-success");
                        // added when logout time is null to write Logged in
                        logTableCell.innerHTML = 'Logged In';
                    } else {
                        logTableRow.setAttribute("class","bg-danger");
                    }
                    
                }

                rowColor(currentTimeAndDate,lastLoggedOutTime);
            }
            
        }
    });

}

function newLogoutTime() {
    $.ajax({
        type: `POST`,
        data: ``,
        url: `http://localhost/electronic_diary/users/logout_new`
    });
}

$(document).ready(function () {
    
    setInterval(checkUserActivity(), 120000);

    setInterval(newLogoutTime, 60000);
    
});