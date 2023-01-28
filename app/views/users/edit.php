<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Update Users
                </h1>
                <?php flash('user_message') ?>
                <?php flash('user_updated_msg') ?>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Update User</h2>
                    <p>Please fill out this form to update user</p>
                    <form action="<?php echo URLROOT; ?>/users/update/<?php echo $data['user']->id_user; ?>" method="post">
                        <div class="form-group">
                            <label for="username">Name: <sup>*</sup></label>
                            <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['user']->username; ?>">
                            <span class="invalid-feedback text-danger"><?php echo isset($data['username_err']) ?? ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['user']->email; ?>">
                            <span class="invalid-feedback text-danger"><?php echo isset($data['email_err']) ?? ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="id_user_role">User Role <sup>*</sup></label>
                            <select name="id_user_role" id="user_role" class="form-control form-control-lg <?php echo (!empty($data['id_user_role_err'])) ? 'is-invalid' : '' ?>">
                                <option value='' >.....Select a role.....</option>
                                <?php
                                $users = new Users();
                                foreach ($users->GetUserRoles() as $id_user_role => $name) :
                                    ?>
                                    <option value='<?php echo $id_user_role; ?>' <?php echo $id_user_role == $data['user']->id_user_role ? 'selected' : '' ?>><?php print($name); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback text-danger"></span>
                        </div>
                        <div class="row hidden">
                            <input type="hidden" id="id_user" name="id_user" value="<?php echo $data['user']->id_user; ?>">
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Update" class="btn btn-primary btn-block">
                            </div>
                        </div>
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