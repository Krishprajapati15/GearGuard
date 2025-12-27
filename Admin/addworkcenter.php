<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Index</title>
</head>
<body>
    <div class="main-wrapper">

        <?php
            include("header.php");
        ?>

        <?php
            include("sidebar.php");
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Add New work-Center</h4>
                    </div>  
                </div>
                <form action="add_request_action.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Work-Center Name <b style="color:red">*</b></label>
                                        <input type="text" name="workcenter" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" name="code" placeholder="Code">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" name="Tag" placeholder="Enter Tag">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Alternative Work-Center</label>
                                        <input type="text" name="Tag" placeholder="Enter Tag">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Cost Per Hour</label>
                                        <input type="number" name="cost" class="form-control" placeholder="Enter cost">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Capacity Time Efficiency</label>
                                        <input type="text" name="cte" placeholder="Enter Capacity">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>OEE Target</label>
                                        <input type="number" name="oee" class="form-control" placeholder="OEE Target">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="workcenterlist" class="btn btn-cancel">Cancel</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="../assets/plugins/apexchart/chart-data.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>