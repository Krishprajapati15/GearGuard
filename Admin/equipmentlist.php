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
    <title>Equipment List</title>
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
                        <h4>Equipment List</h4>
                        <h6>Manage Equipment</h6>
                    </div>  
                    <div class="page-btn">
                        <a href="addequipment" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add Equipment</a>
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
                                        <th>Equipment Name</th>
                                        <th>Employee</th>
                                        <th>Department</th>
                                        <th>Serial Number</th>
                                        <th>Technician</th>
                                        <th>Equipment Category</th>
                                        <th>Company</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Samsung
                                        </td>
                                        <td>
                                            Tejasmodi
                                        </td>
                                        <td>
                                            Admin
                                        </td>
                                        <td>
                                            abc
                                        </td>
                                        <td>
                                            PYS
                                        </td>
                                        <td>
                                            Monitor
                                        </td>
                                        <td>
                                            My Company
                                        </td>
                                        <td>
                                            <a class='me-3' href="editequipment">
                                                <img src='../assets/img/icons/edit.svg' alt='img'>
                                            </a>
                                            <a class='me-3' href="equipmentdelete">
                                                <img src='../assets/img/icons/delete.svg' alt='img'>
                                            </a>
                                        </td>
                                    </tr>
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