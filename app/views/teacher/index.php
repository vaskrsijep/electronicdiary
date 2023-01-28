<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of classes for today</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['n_classes']['number_of_classes'] ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total number of students in class</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['n_students']['number_of_students'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Namber of sent messages</div>
                <div id="all_msg" class="h5 mb-0 font-weight-bold text-gray-800"> </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script>
//Notificatio ALL messages 
function notification_all_message() {
    var all_message = document.getElementById('all_msg');

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText > 0) {
                all_message.innerHTML = this.responseText;
            }
            else {
                new_message.innerHTML = "";
            }
        }
    };

    xmlhttp.open("GET", "<?php echo URLROOT; ?>/messages/notificationAll", true);

    xmlhttp.send();

}
notification_all_message();
$nn = setInterval(notification_all_message, 1000);
</script>

<?php require APPROOT . '/views/inc/teacher/footer.php'; ?>