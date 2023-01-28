<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Classes
                </h1>
                <?php flash('student_message') ?>
                <?php flash('student_updated') ?>
                <?php flash('student_deleted_msg') ?>

                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT; ?>/classes/insert">Insert class</a>

                <table class="table table-striped">

                    <thead>

                        <tr>
                            <th></th>
                            <th>Class</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <?php $i = 0; ?>

                    <?php foreach ($data['classes'] as $class) : ?>

                        <tbody>

                            <tr>




                                <?php echo '<td>' . ++$i . '</td><td>' . $class->name . '</td><td>'

                                    . '<a href =' . URLROOT . "/classes/edit/" . $class->id_school_class . '>Edit</a>' . '</td><td>' ?>


                                <form action="<?php echo URLROOT . "/classes/delete/" . $class->id_school_class ?>" method="POST">

                                    <input type="submit" name="delete" value="Delete">

                                </form>


                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>






            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?> 