<?php require APPROOT . '/views/inc/parent/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                  Notifications
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <?php foreach ($data['notifications'] as $notification) : ?>

        <!-- Page Body -->
        <div class="row">
            <div class="col-lg-12">
                
                <?php echo $notification->notification_content; ?>
                
            </div>
        </div>
        <!-- /.row -->
        
        <?php endforeach; ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/parent/footer.php'; ?>
