<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Student
                </h1>

                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/students/update/<?php echo $data['student']->id_student; ?>" method="post">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['student']->first_name; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $data['student']->id_student; ?>">
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="last_name" class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['student']->last_name; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Select class:</label>
                            <select name='id_school_class' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                <option value="<?php echo $data['student']->id_school_class; ?>" selected>Chose</option>

                                <?php foreach ($data['classes'] as $class) : ?>

                                    <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                                <?php endforeach; ?>

                            </select>




                         <?php echo $data['id_school_class_err']; ?>

                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
                    </form>
                </div>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>