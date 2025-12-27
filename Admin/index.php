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
                <!-- alert-box -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-btn">
                        <a href="placeadd" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img"
                                class="me-2">Add Request</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div>
                                <h5>Critical Equipment</h5>
                                <h5>5 Units</h5>
                                <h5>(Health < 30%)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div>
                                <h5>Technician Load</h5>
                                <h5>85% Utilized</h5>
                                <h5>(Assign Carefully)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div>
                                <h5>Open Requests</h5>
                                <h5>12 Pending</h5>
                                <h5>3 Overdue</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-12 d-flex">
                        <div class="card flex-fill bord">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Maintenance Requests</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Subjects</th>
                                                <th>Employee</th>
                                                <th>Technician</th>
                                                <th>Category</th>
                                                <th>Stage</th>
                                                <th>Company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Test Activity</td>
                                                <td>Rangat</td>
                                                <td>Priyanshu</td>
                                                <td>Computer</td>
                                                <td>New Request</td>
                                                <td>My Company</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Test Activity</td>
                                                <td>Rangat</td>
                                                <td>Priyanshu</td>
                                                <td>Computer</td>
                                                <td>New Request</td>
                                                <td>My Company</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Test Activity</td>
                                                <td>Rangat</td>
                                                <td>Priyanshu</td>
                                                <td>Computer</td>
                                                <td>New Request</td>
                                                <td>My Company</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card mb-0 bord">
                    <div class="card-body">
                        <h4 class="card-title">All Events</h4>
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>Participants</th>
                                        <th>Date</th>
                                        <th>Fees</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>56</td>
                                        <td>jhg</td>
                                        <td>ufuyt</td>
                                        <td>12-23</td>
                                        <td>5656</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
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

    <script src="../assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="../assets/plugins/apexchart/chart-data.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>