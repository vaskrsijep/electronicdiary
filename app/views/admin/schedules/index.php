<?php
require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Schedules
                </h1>

                <?php flash('schedule_deleted_msg') ?>
                <?php flash('schedule_insert_message') ?>
                <?php flash('schedule_update_message') ?>

                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT; ?>/schedules/insert">Insert schedule</a>

                <form action="<?php echo URLROOT; ?>/schedules/show/" method="post">

                    <div class="form-group col-1">
                        <label>Select class:</label>
                        <select name='id_class' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">


                            <?php foreach ($data['classes'] as $class) : ?>

                                <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                            <?php endforeach; ?>

                        </select>


                        <input type="submit" class="btn btn-dark" value="Show">

                    </div>

                </form>


                <?php


                if (isset($data['class_name'])) {

                    foreach ($data['class_name'] as $schedule) {

                        echo "<h2>Selected class: $schedule->name</h2>";
                    }
                }



                if (isset($data['schedules'])) {

                    foreach ($data['schedules'] as $schedule) {

                        switch ($schedule->order_id) {

                            case 1:
                                $row1[] = $schedule;
                                break;
                            case 2:
                                $row2[] = $schedule;
                                break;
                            case 3:
                                $row3[] = $schedule;
                                break;
                            case 4:
                                $row4[] = $schedule;
                                break;
                            case 5:
                                $row5[] = $schedule;
                                break;
                            case 6:
                                $row6[] = $schedule;
                                break;
                            case 7:
                                $row7[] = $schedule;
                                break;
                        }
                    }

                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">

                            <thead>

                                <tr class="bg-dark first_col">
                                    <th scope="col"></th>
                                    <th scope="col">Monday</th>
                                    <th scope="col">Tuesday</th>
                                    <th scope="col">Wednesday</th>
                                    <th scope="col">Thursday</th>
                                    <th scope="col">Friday</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <?php

                                    if (isset($row1, $row2, $row3, $row4, $row5, $row6, $row7)) {

                                        for ($i = 1; $i <= 7; $i++) {

                                            echo "<td>$i</td>";

                                            // make dynamic variable

                                            $var = "row$i";

                                            $row = $$var;

                                            // Inside Url Helper folder , displays table cells and link

                                            display_row_with_link($row);

                                            echo '</tr>';
                                        }
                                    }
                                } ?>

                        </tbody>
                    </table>

                    <form action="<?php echo URLROOT; ?>/schedules/delete/<?php echo $data['id_clas'] ?? ''; ?>" method="post">

                        <input type="submit" class="btn btn-danger" value="Delete Schedule">

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