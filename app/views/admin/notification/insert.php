<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Insert Notification
                </h1>

                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/notifications/insert" method="post">
                        <div class="form-group">

                            <textarea name="notification_content" id="notification_content" cols="100" rows="15"></textarea>

                            </select>
                        </div>
                        <input type="submit" class="btn btn-success" value="Insert">
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