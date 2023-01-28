<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Assign to Professor
                </h1>

                <form action="<?php echo URLROOT; ?>/users/insert_in_professor_info" method="post">

                    <div class="form-group">
                        <label for="id_professor">Select professor<sup>*</sup></label>
                        <select name="professor_id" id="" class="form-control form-control-lg <?php echo (!empty($data['id_professor_err'])) ? 'is-invalid' : '' ?>">
                            <option value='' selected>--Select a professor--</option>
                            <?php foreach ($data['professors'] as $professor) : ?>


                                <option value='<?php echo $professor->id_user; ?>' <?php if ($data['id_professor'] == $professor->id_user) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php print($professor->username); ?></option>



                            <?php endforeach; ?>

                        </select>
                        <span class="invalid-feedback text-danger"><?php echo $data['id_professor_err']; ?></span>

                        <label for="id_subject">Select subject('s')<sup>*</sup></label>
                        <select name="subject_id[]" multiple id="" class="form-control form-control-lg <?php echo (!empty($data['id_subject_err'])) ? 'is-invalid' : '' ?>">

                            <?php foreach ($data['subjects'] as $subject) : ?>


                                <option value='<?php echo $subject->id_subject; ?>'> <?php print($subject->name); ?></option>



                            <?php endforeach; ?>

                        </select>
                        <span class="invalid-feedback text-danger"><?php echo $data['id_subject_err']; ?></span>

                        <label for="id_subject">Select class<sup>*</sup></label>
                        <select name="class_id" id="" class="form-control form-control-lg <?php echo (!empty($data['id_class_err'])) ? 'is-invalid' : '' ?>">
                            <option value='' selected>--Select class--</option>
                            <?php foreach ($data['classes'] as $class) : ?>


                                <option value='<?php echo $class->id_school_class; ?>' <?php if ($data['id_class'] == $class->id_school_class) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php print($class->name); ?></option>



                            <?php endforeach; ?>

                        </select>
                        <span class="invalid-feedback text-danger"><?php echo $data['id_class_err']; ?></span>

                    </div>

                    <input type="submit" class="btn btn-success" value="Assign">

                </form>


            </div>
        </div>

        <?php flash('professor_msg'); ?>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>