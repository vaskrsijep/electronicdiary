<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <h1 class="page-header">
                    Classes
                </h1>
                <?php flash('student_message') ?>
                <?php flash('student_updated') ?>
                <?php flash('student_deleted_msg') ?>

                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2 mb-2" href="<?php echo URLROOT; ?>/classes/insert">Insert class</a>

                <table class="table table-striped">

                    <thead>

                        <tr>
                            <th></th>
                            <th>Class</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    <?php $i = 0; ?>

                    <?php foreach ($data['classes'] as $class) : ?>
                        <tr>
                            <?php 
                            echo '
                                <td>' . ++$i . '</td>
                                <td>' . $class->name . '</td>
                                <td class="buttons-pos">
                                <a class="btn btn-primary btn-margin" href=' . URLROOT . "/classes/edit/" . $class->id_school_class . '>Edit</a>
                                '?>
                                <form action="<?php echo URLROOT . "/classes/delete/" . $class->id_school_class ?>" method="POST">

                                <button class="btn btn-danger" type="submit" name="delete">Delete</button>

                                </form></td>
                        </tr>
                        <tbody>

                            

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