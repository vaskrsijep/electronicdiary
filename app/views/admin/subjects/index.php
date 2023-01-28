<?php require APPROOT . '/views/inc/admin/header.php'; ?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <h1 class="page-header">
                    Subjects
                </h1>
                <?php flash('subject_message') ?>
                <?php flash('subject_updated') ?>
                <?php flash('subject_deleted_msg') ?>
            </div>
            <div class="col-sm">
              <div class="buttons-loc">
                <a class="btn btn-primary" href="<?php echo URLROOT . "/subjects/insert" ?>">Insert subject</a>
              </div>
            </div>
        </div>
        <!-- /.row -->
        <table class="table table-hover col-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <!-- php subjects -->
    <?php $i = 0; ?>
    <?php foreach ($data['subjects'] as $subject) : ?>
  <tbody>
    <tr>
      <?php 
      echo '
        <td>' . ++$i . '</td>
        <td>' . $subject->name . '</td>
        <td class="buttons-pos">
        <a class="btn btn-primary btn-margin" href=' . URLROOT . "/subjects/edit/" . $subject->id_subject . '>Edit</a>
        '?>
        <form action="<?php echo URLROOT . "/subjects/delete/" . $subject->id_subject ?>" method="POST">

        <button class="btn btn-danger" type="submit" name="delete">Delete</button>

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