<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Index</title>
</head>
<style>
    /* Container for the input and icon */
    .search-input-container {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
    }

    /* Maginfying glass icon positioning */
    .search-icon {
        position: absolute;
        left: 15px;
        width: 16px;
        height: 16px;
        pointer-events: none;
        /* This makes the icon greyish like your image */
        filter: invert(40%) sepia(10%) saturate(500%) hue-rotate(170deg) brightness(90%) contrast(85%);
    }

    /* The search input styling */
    .custom-search-input {
        width: 100% !important;
        padding-left: 45px !important;
        /* Space for the icon */
        height: 40px;
        border-radius: 8px !important;
        border: 1px solid #E0E4E8 !important;
        /* Light border color */
        font-size: 14px;
        color: #555;
    }

    /* Border color change on click */
    .custom-search-input:focus {
        border-color: #A3C2C2 !important;
        box-shadow: none !important;
        outline: none;
    }
</style>

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
                    <div class="row align-items-center w-100">
                        <div class="col-auto">
                            <div class="page-btn">
                                <a href="requestadd" class="btn btn-added">
                                    <img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add Request
                                </a>
                            </div>
                        </div>

                        <div class="col d-flex justify-content-end mt-2 mt-md-0">
                            <div class="search-set w-100" style="max-width: 500px;">
                                <div class="search-input-container">
                                    <img src="../assets/img/icons/search.svg" class="search-icon" alt="search">
                                    <input type="text" id="myInput" class="form-control custom-search-input"
                                        placeholder="Search requests...">
                                </div>
                            </div>
                        </div>
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
                                        <tbody id="maintenanceTable">
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
                                    <div id="noDataMessage" class="text-center p-5" style="display: none;">
                                        <h5 class="text-muted">No matching requests found.</h5>
                                    </div>
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
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();

                // Target only the rows in the specific table body
                var $tableRows = $("#maintenanceTable").children("tr");
                var foundCount = 0;

                $tableRows.each(function () {
                    var rowText = $(this).text().toLowerCase();

                    // Search logic
                    if (rowText.indexOf(value) > -1) {
                        $(this).show();
                        foundCount++;
                    } else {
                        $(this).hide();
                    }
                });

                // Toggle the message div
                // We do NOT hide the <thead> so the <th> tags stay visible
                if (foundCount === 0 && value !== "") {
                    $("#noDataMessage").show();
                } else {
                    $("#noDataMessage").hide();
                }
            });
        });
    </script>
</body>

</html>