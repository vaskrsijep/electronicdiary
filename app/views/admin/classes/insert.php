<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Insert Class
                </h1>



                <div class="card card-body bg-light mt-5">

                    <form action="<?php echo URLROOT; ?>/classes/insert" method="post">

                        <div class="form-group">
                            <label for="last_name">Class Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['name']; ?>">
                            <span class="invalid-feedback text-danger"><?php echo $data['name_err']; ?></span>
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