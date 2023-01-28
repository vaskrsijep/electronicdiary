<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit grade</h6>
                        <p class="flashmessage">
                            <?php flash('grades_message') ?>
                        </p>


                    </div>
                    <div class="card-body">

                        <form action="<?php echo URLROOT; ?>/users/updateGrade/<?php echo $data['id']; ?>" method="POST">
                            <div class="form-group row">
                                <div class="col-xs-2">
                                    <div class="mb-2">
                                        <input type="number" name='grade' min="1" max="5" class="form-control <?php echo (!empty($data['grade_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['grade']->grades ?? '' ?>">
                                        <span class="invalid-feedback text-danger"><?php echo $data['grade_err']; ?></span>
                                    </div>
                                    <div>
                                        <input type="hidden" name="grade_id" value="<?php echo $data['id']; ?>">
                                        <input type="submit" class="btn btn-primary btn-block" value="Update grade">
                                    </div>
                                </div>
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