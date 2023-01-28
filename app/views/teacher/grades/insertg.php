<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="modal fade" id="modalUpdateForm" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Update trimester data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <input type="date" id="form-update" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="form3">Date</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id='update_trimester' class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h2>Trimesters</h2>
        <?php foreach ($data['gradeOptions'] as $gradeOptions) {
            echo '<p>' . $gradeOptions->name . ' starts  ' . '<a  id="' . $gradeOptions->id_grade_for . '" rel="' . $gradeOptions->id_grade_for . '"' . 'class="trimester" data-toggle="modal" data-target="#modalUpdateForm" title="Click to Edit" href="#">' . $gradeOptions->start_from . '</a></p>';
        } ?>
    </div>





    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Students</h6>
                        <p class="flashmessage">
                            <?php flash('grades_message') ?>
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center student_name_st">
                            <?php echo 'Student: ' . $data['student']->first_name . " " . $data['student']->last_name ?>


                        </h3>

                        <form action="<?php echo URLROOT; ?>/users/insertg/<?php echo $data['student']->id_student ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <table class="text-center table table-responsive">
                                        <thead>
                                            <td>Subject Name</td>
                                            <td>Grades</td>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['allsubjects'] as $subject) : ?>
                                                <tr>
                                                    <?php echo "<td>" . $subject->name . "</td>"; ?>
                                                    <?php echo "<td>" . $subject->grades . "</td>"; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>Select subject:</label>
                                        <select name='id_subject' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">

                                            <?php foreach ($data['subjects'] as $subject) : ?>

                                                <?php echo "<option value=\"$subject->id_subject\">$subject->name</option>"; ?>

                                            <?php endforeach; ?>

                                        </select>
                                        <span class="invalid-feedback text-danger"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="grades">Select a grade</label>
                                        <select class="custom-select my-1 mr-sm-2" name="grades" id="grades">
                                            <option default value="0">Choose Grade</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="grade">Grade Status</label>
                                        <select class="custom-select my-1 mr-sm-2" name="grade_status" id="grade_status">
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="hidden" name="id_student" id="id_student" value="<?php echo $data['student']->id_student ?>">
                                <input type="hidden" name="school_class_id" id="school_class_id" value="<?php echo $data['student']->id_school_class ?>">
                                <input type="submit" name="submit" class="btn btn-success text-center" value="Insert">
                            </div>
                        </form>
                    </div><!-- CARD-BODY END -->
                </div> <!-- /.CARD SHADOW -->

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



<?php require APPROOT . '/views/inc/teacher/footer.php'; ?>