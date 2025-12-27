<?php 
session_start();
include("../includes/scripts/connection.php");
if(!isset($_SESSION['odoo_logedin_user_id'])){ header("Location: ../user-login/userlogin.php"); exit(); }

$user_id = $_SESSION['odoo_logedin_user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT user_role FROM user_master WHERE user_id=$user_id"));

if($user['user_role'] != 3){ header("Location: 404.php"); exit(); }

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
                        <h4>Add New Equipment</h4>
                    </div>  
                </div>
                <form action="add_request_action.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Equipment Name <b style="color:red">*</b></label>
                                        <input type="text" name="equipment" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <input type="text" name="employee" placeholder="Employee Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <input type="text" name="dept" placeholder="Department Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Serial Number</label>
                                        <input type="text" name="sno" placeholder="Serial Number">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Technician</label>
                                        <input type="text" name="technician" placeholder="Technician Name">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
    <div class="form-group">
        <label>Equipment Category</label>
        <select name="eq_cat_id" class="form-control">
            <option value="">Select Category</option>
            <?php
            $cat = $conn->query("SELECT * FROM equipment_catgory ORDER BY name ASC");
            while($row = $cat->fetch_assoc()){
                echo "<option value='{$row['eq_cat_id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
    </div>
</div>
                                
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" name="company" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="equipmentlist" class="btn btn-cancel">Cancel</a>
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