$(document).ready(function () {
   toggleFields();
   $("#user_role").change(function () {
      toggleFields();
   });

});

function toggleFields() {
   if ($("#user_role").val() === "4") {
      $("#student").show();
   } else {
      $("#student").hide();
   }
   if ($("#user_role").val() === "3") {
      $("#teacher").show();
   } else {
      $("#teacher").hide();
   }
   if ($("#user_role").val() === "5") {
      $("#professor").show();
   } else {
      $("#professor").hide();
   }
}

function dragEnter(event) {
   if (event.target.className == "form-control") {
      event.target.style.border = "2px dotted blue";

   }
}

function dragLeave(event) {
   if (event.target.className == "form-control") {
      event.target.style.border = "2px solid #d1d3e2";
   }
}



function hideText(inputsSchedules) {
 
   inputsSchedules.value='';
}