<?php require APPROOT . '/views/inc/director/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Class statistics
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Select class:</label>
                    <select name='id_school_class' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option value="">Choose</option>

                        <?php foreach ($data['classes'] as $class) : ?>

                            <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                        <?php endforeach; ?>

                    </select>

      

                </div>

            </div>
        </div>


    <!-- Page Body -->
        <div class="row">
            <div class="col-lg-12">

                <div id="chartdiv"></div>

            </div>
        </div>
         <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
 <!-- #page-wrapper -->

<?php require APPROOT . '/views/inc/director/footer2.php'; ?>