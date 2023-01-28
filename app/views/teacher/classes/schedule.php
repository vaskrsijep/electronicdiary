<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper dt-bootstrap4">

                                <?php

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

                                                            display_row($row);

                                                            echo '</tr>';
                                                        }
                                                    }
                                                } ?>

                                        </tbody>
                                    </table>


                                </div><!-- bt4 end -->
                            </div><!-- table responsive end -->
                        </div><!-- CARD-BODY END -->
                    </div> <!-- /.CARD SHADOW -->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>