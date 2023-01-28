<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update
                </h1>

                <div class="card card-body bg-light mt-5 col-sm-4 float-left">


                    <form action="<?php echo URLROOT; ?>/schedules/update/<?php echo $data['schedule']->id_schedules; ?>" method="post">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control form-control-lg" value="">
                            <input type="hidden" id="id_schedule" name="id_schedule" value="<?php echo $data['schedule']->id_schedules; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
                    </form>
                </div>
                <div class="col-sm-2 float-left">
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php require APPROOT . '/views/inc/admin/footer.php'; ?>