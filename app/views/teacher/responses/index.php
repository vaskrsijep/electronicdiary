<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

  <div class="container-fluid">


<!-- Button trigger modal -->
<button type="button" id="add_open_door" class="btn btn-primary">
 Add open door
</button>

<!-- Modal -->

<hr>
   <div id="show_consultation" class="container-fluid">
   </div>

  </div>
    <!-- /.container-fluid -->

    <div class="modal fade show" id="popup_add" style="padding-right: 17px; display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" id="add_cansel_x">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="id_data">Select date:</label>
                <input class="form-control" type="date"  min="<?php echo Date("Y-m-d"); ?>" id="id_date">
              </div>
              <div class="col">
                <label for="id_time">Select time:</label>
                <input class="form-control" type="time" value="" id="id_time">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="add_save" type="button" class="btn btn-primary">Save</button>
            <button id="add_cansel" type="button" class="btn btn-secondary">Calsel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End popup_add modal -->

  </div>
  <!-- /#page-wrapper -->

  <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>
