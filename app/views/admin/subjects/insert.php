<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-4">
                <h1 class="page-header">
                    Insert Subject
                </h1>

                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/subjects/insert" method="post">

                        <div class="form-group">
                            <label for="last_name">Subject Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['name']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['name_err']; ?></span>
                        </div>

                        <input type="submit" class="btn btn-success" value="Insert">
                    </form>
                </div>


            </div>

            <div class="col-sm-3 offset-1">
                <div id="subjects_drag">
                    <h2>Drag subject </h2>
                    <div class="list-inline">
                        <?php foreach ($data['subjects'] as $subject) : ?>
                            <?php echo "<div class='list-group-item all-copy list-group-item-success sw-resize text'> $subject->name </div>" ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>