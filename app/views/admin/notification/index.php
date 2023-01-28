<?php require APPROOT . '/views/inc/admin/header.php'; ?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <h1 class="page-header">
                  Notifications
                </h1>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm " href="<?php echo URLROOT . "/notifications/insert" ?>">Insert notification</a>
                <?php flash('notification_message') ?>
                <?php flash('notification_updated') ?>
                <?php flash('notification_deleted_msg') ?>
            </div>
        </div>
        <!-- /.row -->
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Content</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <!-- php subjects -->
    <?php $i = 0; ?>
    <?php foreach ($data['notifications'] as $notification) : ?>
  <tbody>
    <tr>
      <?php 
      echo '
        <td>' . ++$i . '</td>
        <td>' . $notification->notification_content . '</td>
        <td class="buttons-pos">
        <a class="btn btn-primary" href=' . URLROOT . "/notifications/edit/" . $notification->id_parent_notification . '>Edit</a>
        '?>
        <form action="<?php echo URLROOT . "/notifications/delete/" . $notification->id_parent_notification ?>" method="POST">

        <button class="btn btn-danger ml-1" type="submit" name="delete">Delete</button>

    </form></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
