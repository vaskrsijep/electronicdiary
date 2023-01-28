<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users
                </h1>
                <?php flash('user_message') ?>
                <?php flash('user_edited') ?>
                <?php flash('user_deleted_msg') ?>

                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT; ?>/users/insert">Insert user</a>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT; ?>/users/assign">Assign student</a>
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT; ?>/users/assign_to_professor">Assign to professor</a>

                <form action="<?php echo URLROOT; ?>/users/" method="post" class='mt-4'>
                    <div class="row select_role">
                        <div class="col-2">
                            <div class="form-group">
                                <select name="user_role" id="user_role" class="form-control form-control-lg<?php echo (!empty($data['user_role_err'])) ? 'is-invalid' : '' ?>">
                                    <option value='' selected>--Select a role--</option>
                                    <?php
                                    $users = new Users();
                                    foreach ($users->GetUserRoles() as $id_user_role => $name) :
                                        ?>
                                        <option value='<?php echo $id_user_role; ?>'><?php print($name); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success" value="Show">
                        </div>
                    </div>
                </form>
            </div>
            



            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>

                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>User Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <?php
                    $users = new Users();
                    // if isset post user role get that value if not get ''
                    foreach ($users->GetUsersByUserRole($_POST["user_role"] ?? '') as $user) : ?>

                        <tbody>

                            <tr>
                                <td><?php echo ($user->username); ?></td>
                                <td><?php print($user->email); ?></td>
                                <td><?php printf($user->name); ?></td>
                                <td>
                                    <form action="<?php echo URLROOT . '/users/edit/' . $user->id_user; ?>" method="POST">

                                        <a href="<?php echo URLROOT . '/users/edit/' . $user->id_user;; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Edit</a>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?php echo URLROOT . '/users/delete/'; ?>" method="POST">

                                        <input type="submit" value="Delete" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    </form>
                                </td>
                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>
            </div>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>