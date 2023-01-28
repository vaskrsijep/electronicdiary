<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Notification
                </h1>

                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/notifications/update/<?php echo $data['notification']->id_parent_notification; ?>" method="post">
                        <div class="form-group">
                            <label>Notification Content:</label>
                            <input type="text" name="notification_content" class="form-control form-control-lg <?php echo (!empty($data['notification_content_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['notification']->notification_content; ?>">
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <input type="hidden" id="id_parent_notification" name="id_parent_notification" value="<?php echo $data['notification']->id_parent_notification; ?>">

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