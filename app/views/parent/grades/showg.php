<?php require APPROOT . '/views/inc/parent/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Student grades</h6>
                        <p class="flashmessage">
                            <?php flash('grades_message') ?>
                        </p>

                        <p><?php echo 'Student First Name : ' . $data['student']->first_name . "<br>" . 'Student Last Name: ' . $data['student']->last_name ?></p>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>Grade Status</th>
                            </tr>

                            <?php foreach ($data['student_grades'] as $grades) : ?>


                                <tr>
                                    <td> <?php echo $grades->name ?> </td>
                                    <td><?php echo ($grades->grade_status == 0) ? "$grades->grades" : "$grades->grades" ?></td>
                                    <td> <?php echo ($grades->grade_status == 0) ? 'Nije zakljucena' : 'Zakljucena' ?></td>

                                </tr>

                            <?php endforeach; ?>

                        </table>


                    </div><!-- CARD-BODY END -->
                </div> <!-- /.CARD SHADOW -->

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/parent/footer.php'; ?>