<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Place List</title>
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
                        <a href="placeadd" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add Place</a>
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
                                        <th>Place Name</th>
                                        <th>Category</th>
                                        <th>Rating</th>
                                        <th>Location</th>
                                        <th>Time</th>
                                        <th>Entry Fee</th>
                                        <th>Contact no</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Rajvant Palace
                                        </td>
                                        <td>
                                            Historical
                                        </td>
                                        <td>
                                            4.70
                                        </td>
                                        <td>
                                            Rajpipla, Gujarat
                                        </td>
                                        <td>
                                            08:00 AM - 07:00 PM
                                        </td>
                                        <td>
                                            100
                                        </td>
                                        <td>
                                            +91-9978343950
                                        </td>
                                        <td>
                                            <a class='me-3' href="placeedit">
                                                <img src='../assets/img/icons/edit.svg' alt='img'>
                                            </a>
                                            <a class='me-3' href="placedetails">
                                                <img src='../assets/img/icons/eye.svg' alt='img'>
                                            </a>
                                            <a class='me-3' href="placedelete">
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