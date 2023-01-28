<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <h1 class="page-header">
                Schedules
            </h1>
            <span class="invalid-feedback text-danger"><?php echo $data['class_err']; ?></span>

        </div>

        <form action="<?php echo URLROOT; ?>/schedules/insert" method="POST">
            <div class="col-lg-12">
                <div class="form-group">

                    <div class="row">
                        <div class="col-xs-2">
                            <label for="id_school_class">Student Class<sup>*</sup></label>
                            <select name="id_school_class" id="id_school_class" class="form-control form-control-lg input-medium">
                                <option value='' selected>--Select a class--</option>
                                <?php foreach ($data['classes'] as $key => $class) {

                                    if (in_array_r($class->name, $data['schedule_class'])) {

                                        $class->name = '';

                                        if ($class->name == '') {
                                            continue;
                                        }
                                    }

                                    echo "<option value=\"$class->id_school_class\">$class->name</option>";
                                } ?>

                            </select>
                            <div class='text-danger'><?php echo $data['class_err']; ?></div>

                        </div>
                    </div>

                    <input type="hidden" name="day1" value="1">
                    <input type="hidden" name="day2" value="2">
                    <input type="hidden" name="day3" value="3">
                    <input type="hidden" name="day4" value="4">
                    <input type="hidden" name="day5" value="5">

                </div> <!-- formgroup end -->
            </div> <!-- col end -->
            <div class="row">
                <div class="col-6">

                    <div class="table-responsive col-sm">
                        <table class="table-sm ">
                            <thead>
                                <tr>
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

                                    define('LETTERS', ['a', 'b', 'c', 'd', 'e']);

                                    /**
                                     * Displays insert form for schedule
                                     * 
                                     * 1.param - num of classes
                                     * 2.param - letters for name in input
                                     * @return void
                                     */

                                    displayInsertForSchedule(7, LETTERS);


                                    ?>

                            </tbody>

                        </table>
                        <div class="col-4 mt-3 pl-3">
                            <button class="btn btn-primary btn-lg insert-rand-button" type="submit" name="insert">Insert</button>
                        </div>

                    </div>
                </div>

                <div class="col">

                    <p>Already inserted schedules for classes</p>

                    <ul class="list-inline">
                        <?php

                        foreach ($data['schedule_class'] as $class) {

                            echo  '<li>' . $class['name'] . '  <i style="color:green;" class="fa fa-check-square">  </i></li>';
                        }

                        ?>
                    </ul>
                </div>
                <div class="col">
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
    </div>

    </form>
</div>



</div> <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



<?php require APPROOT . '/views/inc/admin/footer.php'; ?>