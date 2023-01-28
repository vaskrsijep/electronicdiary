<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Assign Student
                </h1>

                <form action="" method="post">

                    <div id="">
                        <div class="form-group">
                            <label for="first_name_a">Student First Name: <sup>*</sup></label>
                            <input type="text" name="first_name_a" class="form-control form-control-lg <?php echo (!empty($data['first_name_a_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['first_name_a']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['first_name_a_err']; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Student Last Name: <sup>*</sup></label>
                            <input type="text" name="last_name_a" class="form-control form-control-lg <?php echo (!empty($data['last_name_a_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['last_name_a']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['last_name_a_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Parent Email: <sup>*</sup></label>
                            <input type="email" name="email_p" class="form-control form-control-lg <?php echo (!empty($data['email_p_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email_p']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['email_p_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="id_school_class">Student Class<sup>*</sup></label>
                            <select name="id_school_class_a" id="" class="form-control form-control-lg <?php echo (!empty($data['id_school_class_a_err'])) ? 'is-invalid' : '' ?>">
                                <option value='' selected>.....Select a class.....</option>
                                <?php foreach ($data['classes'] as $class) : ?>


                                    <option value='<?php echo $class->id_school_class; ?>' <?php if ($data['id_school_class_a'] == $class->id_school_class) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php print($class->name); ?></option>


                                <?php endforeach; ?>

                            </select>
                            <span class="invalid-feedback text-danger"><?php echo $data['id_school_class_a_err']; ?></span>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Assign">

                </form>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>