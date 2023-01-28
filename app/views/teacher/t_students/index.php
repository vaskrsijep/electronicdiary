<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <?php flash('grade_updated') ?>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Students</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper dt-bootstrap4">
                                <?php flash('student_grade_message') ?>
                                <?php flash('student_grade_updated') ?>
                                <?php flash('grade_deleted_msg') ?>

                                <?php echo '<p> Class ' . $data['students'][0]->name . '</p>';  ?>
                                <table class="table table-bordered dataTable text-center">
                                    <thead>

                                        <tr>
                                            <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Options</th>
                                            <!--<th>Grade status</th>-->
                                        </tr>
                                    </thead>
                                    <?php foreach ($data['students'] as $student) : ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $student->id_student; ?>
                                                </td>
                                                <td>
                                                    <?php echo $student->first_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $student->last_name; ?>
                                                </td>
                                                <td class="buttons-pos">
                                                    <a href="<?php echo URLROOT . "/users/insertg/" . $student->id_student ?>" class="btn btn-success btn-icon-split m1">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        <span class="text">Insert grades </span>
                                                    </a>
                                                </td>
                                                <td class="buttons-pos">
                                                    <a href="<?php echo URLROOT . "/users/showg/" . $student->id_student ?>" class="btn btn-success btn-icon-split m1">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        <span class="text">Show grades </span>
                                                    </a>
                                                </td>
                                                <!--<td>
                                                        <p class="text-success">Yes</p>
                                                    </td>-->
                                                </form>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                </table>
                            </div><!-- bt4 end -->
                        </div><!-- table responsive end -->
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