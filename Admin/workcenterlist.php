<?php
include("../includes/scripts/connection.php");   // DB connect
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Work-Center List</title>
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
                <!-- alert-box -->
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Place List</h4>
                        <h6>Manage Places</h6>
                    </div>  
                    <div class="page-btn">
                        <a href="addworkcenter" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add Work-Center</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="../assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Work Center</th>
                                        <th>Code</th>
                                        <th>Tag</th>
                                        <th>Alternative WorkCenters</th>
                                        <th>Cost Per Hour</th>
                                        <th>Capacity Time Efficiency</th>
                                        <th>OEE Target</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$sql = "SELECT * FROM work_center_master ORDER BY wc_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['workcenter_name']}</td>
            <td>{$row['code']}</td>
            <td>{$row['tag']}</td>
            <td>{$row['alternative_wc']}</td>
            <td>{$row['cost_per_hour']}</td>
            <td>{$row['capacity_time_efficiency']}</td>
            <td>{$row['oee_target']}</td>
            <td>
                <a class='me-3' href='editworkcenter?id={$row['wc_id']}'>
                    <img src='../assets/img/icons/edit.svg' alt='edit'>
                </a>
                <a class='me-3 delete-btn' href='workcenterdelete?id={$row['wc_id']}'>
                    <img src='../assets/img/icons/delete.svg' alt='delete'>
                </a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center text-danger'>No Records Found</td></tr>";
}
?>
</tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>



    <script src="../assets/js/script.js"></script>
</body>

</html>