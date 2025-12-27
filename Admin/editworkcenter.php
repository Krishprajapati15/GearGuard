<?php
include("../includes/scripts/connection.php");
$id = $_GET['id'];

$sql = "SELECT * FROM work_center_master WHERE wc_id = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
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
                <form action="update_workcenter_action.php" method="post">
                    <input type="hidden" name="wc_id" value="<?= $data['wc_id'] ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>WorkCenter Name <b style="color:red">*</b></label>
                                        <input type="text" name="workcenter" placeholder="Enter Name" name="workcenter" value="<?= $data['workcenter_name'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" placeholder="Code" name="code" value="<?= $data['code'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" placeholder="Enter Tag" name="tag" value="<?= $data['tag'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Alternative WorkCenter</label>
                                        <input type="text" placeholder="Enter Alternative Workcenter" name="alternative" value="<?= $data['alternative_wc'] ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Cost Per Hour</label>
                                        <input type="number" class="form-control" placeholder="Enter cost"  name="cost" value="<?= $data['cost_per_hour'] ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Capacity Time Efficiency</label>
                                        <input type="text"  placeholder="Enter Capacity" name="cte" value="<?= $data['capacity_time_efficiency'] ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>OEE Target</label>
                                        <input type="number" class="form-control" placeholder="OEE Target" name="oee" value="<?= $data['oee_target'] ?>">
                                    </div>
                                </div>
                                 <div class="col-lg-12 mt-4">
                            <button type="submit" name="update" class="btn btn-submit me-2">Update</button>
                            <a href="workcenterlist.php" class="btn btn-cancel">Cancel</a>
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