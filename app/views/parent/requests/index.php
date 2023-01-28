<?php require APPROOT . '/views/inc/parent/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card bg-light mt-5 card-body text-center">

                <?php foreach($data['lists_s'] as $list) : ?>
                <?php 
                   if ($list->meetings_status == 0) {
                       echo '<div class="row d-inline-flex">';
                       echo '<div class="col-md-auto"><p class="">'. $list->to_id_user .'</p></div>';
                       echo '<div class="col-sm"><p class=" text-danger">Declined</p></div>';
                       echo '</div>'; // end row
                   } else {
                    echo '<div class="row d-inline-flex">';
                    echo '<div class="col-md-auto"><p class="">'. $list->to_id_user .'</p></div>';
                    echo '<div class="col-sm"><p class=" text-success">Approved</p></div>';
                    echo '</div>'; // end row
                   }
                ?><hr>
                <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <div id="responseText">
                    </div>
                    <h2>Send Request to Attend To Open Door Meeting</h2>
                    <p id="msg">Please fill out this form to send request</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="time">Time: <sup>*</sup></label>
                            <input type="time" name="time" id="time" class="form-control form-control-lg">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="date">Date: <sup>*</sup></label>
                            <input type="date" name="date" id="date" class="form-control form-control-lg">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="student">Student <sup>*</sup></label>
                            <select name="student" id="student" class="form-control form-control-lg <?php echo (!empty($data['students_err'])) ? 'is-invalid' : '' ?>">
                                <option value='' selected>.....Select a student.....</option>
                                <?php foreach ($data['students'] as $student) : ?>
                                   <option value="<?php echo $student->id_student; ?>">
                                    <?php echo $student->first_name . " " . $student->last_name; ?>
                                   </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback text-danger"><?php echo $data['students_err']; ?></span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="button" id="request-open-door" value="Request" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/parent/footer.php'; ?>
