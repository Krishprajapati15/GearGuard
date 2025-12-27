<?php
require "../includes/scripts/connection.php"; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Index</title>
</head>
<style>
    .stage-container {
        background: #f8f9fa;
        border-radius: 50px;
        padding: 10px 20px;
        display: inline-block;
        border: 1px dashed #ccc;
    }

    .stage-item {
        font-weight: 600;
        color: #666;
        font-size: 13px;
    }

    .stage-item.active {
        color: #2c3e50;
    }

    .form-label-custom {
        font-weight: 500;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    .data-underline {
        border-bottom: 2px solid #ddd;
        padding-bottom: 5px;
        margin-bottom: 15px;
        min-height: 30px;
    }

    /* Circular Status Button */
    .status-dot-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid #ccc;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .status-dot-btn::after {
        display: none;
        /* Removes the default arrow */
    }

    /* Button that expands to show text */
    .status-display-btn {
        background: white;
        border: 1px solid #ced4da;
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 13px;
        font-weight: 500;
        min-width: 140px;
        transition: all 0.2s;
    }

    .status-display-btn::after {
        margin-left: 10px;
        /* Moves the arrow slightly away from text */
    }

    /* Dots */
    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
    }

    .dot.grey {
        background-color: #dee2e6;
        border: 1px solid #adb5bd;
    }

    .dot.red {
        background-color: #e63946;
    }

    .dot.green {
        background-color: #2a9d8f;
    }

    /* Text colors based on status */
    .text-grey {
        color: #6c757d;
    }

    .text-red {
        color: #e63946;
        font-weight: 600;
    }

    .text-green {
        color: #2a9d8f;
        font-weight: 600;
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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge bg-light text-dark border mb-1">New</span>
                        <h3 class="mb-0">Maintenance Requests</h3>
                        <p class="text-muted">Test activity</p>
                    </div>
                    <div class="stage-container">
                        <span class="stage-item active">New Request</span>
                        <span class="mx-2 text-muted">></span>
                        <span class="stage-item">In Progress</span>
                        <span class="mx-2 text-muted">></span>
                        <span class="stage-item">Repaired</span>
                        <span class="mx-2 text-muted">></span>
                        <span class="stage-item">Scrap</span>
                    </div>
                </div>
                <form action="add_request_action.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Subject <b style="color:red">*</b></label>
                                        <input type="text" name="subject" placeholder="Enter Subject">
                                    </div>
                                </div>

                                <!-- <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Created By</label>
                                        <input type="text" name="created_by" placeholder="Created By">
                                    </div>
                                </div> -->



                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team</label>
                                        <select name="team_name" class="form-control">
                                            <option value="">Select Team</option>
                                            <?php
                                            $cat = $conn->query("SELECT * FROM maintenance_team ORDER BY team_name ASC");
                                            while($row = $cat->fetch_assoc()){
                                                echo "<option value='{$row['team_id']}'>{$row['team_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Maintenance For</label>
                                        <select name="maintenance_for" id="maintenanceFor" class="form-control">
                                            <option value="Equipment">Equipment</option>
                                            <option value="Work Center">Work Center</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Equipment Category</label>
                                        <select name="catogery_name" class="form-control">
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
                                        <label>Equipment / Work Center</label>
                                        <select name="equipment_name" id="equipmentSelect" class="form-control">
                                            <option value="">Select Equipment or Work Center</option>
                                            <?php
                                            // Fetch all equipment (devices)
                                            $equipments = $conn->query("SELECT eq_id,name FROM equipment_master ORDER BY name ASC");
                                            if ($equipments && $equipments->num_rows > 0) {
                                                while ($row = $equipments->fetch_assoc()) {
                                                    echo "<option value='E_{$row['eq_id']}' data-type='Equipment'>{$row['name']}</option>";
                                                }
                                            }

                                            // Fetch all work centers
                                            $workcenters = $conn->query("SELECT wc_id, workcenter_name FROM work_center_master ORDER BY workcenter_name ASC");
                                            if ($workcenters && $workcenters->num_rows > 0) {
                                                while ($row = $workcenters->fetch_assoc()) {
                                                    echo "<option value='W_{$row['wc_id']}' data-type='Work Center' style='display:none;'>{${'row'}['workcenter_name']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Scheduled Date? <b style="color:red">*</b></label>
                                        <input type="datetime-local" name="schedule_date" class="form-control"
                                            value="2025-12-28T14:30" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Request Date? <b style="color:red">*</b></label>
                                        <input type="date" name="request_date" class="form-control" value="2025-12-18"
                                            required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" value="Low" name="priority"
                                                    id="Low" checked>
                                                <label class="form-check-label" for="Low">Low</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Medium"
                                                    name="priority" id="Medium">

                                                <label class="form-check-label" style="margin-right: 20px;" for="Medium">Medium</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="High"
                                                    name="priority" id="High">
                                                <label class="form-check-label" for="High">High</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Maintenance Type</label>
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="maintance_type"
                                                    value="Corrective" id="corrective" checked>
                                                <label class="form-check-label" for="corrective">Corrective</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="maintance_type"
                                                    id="preventive" value="Preventive">
                                                <label class="form-check-label" for="preventive">Preventive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" name="company" placeholder="Company Name">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Status">Status</label>
                                        <div class="d-flex align-items-center">
                                            <span class="dot grey me-2" id="status-dot-preview"></span>

                                            <select name="status" id="statusSelect" class="form-control select2">
                                                <option value="In Progress" data-text="In Progress">In Progress</option>
                                                <option value="Blocked" data-text="Blocked">Blocked</option>
                                                <option value="Ready for next stage" data-text="Ready for next stage">Ready for next
                                                    stage</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Instruction</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="req_stage" value="New Request">


                                <div class="col-lg-12 mt-4">
                                    <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="placelist" class="btn btn-cancel">Cancel</a>
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
    <script>
        $(document).ready(function () {
            $('.custom-status-dropdown .dropdown-item').on('click', function (e) {
                e.preventDefault();

                // 1. Get the data from the clicked item
                var statusText = $(this).data('text');
                var statusColor = $(this).data('color');

                // 2. Update the button text
                $('#current-text').text(statusText);

                // 3. Update the dot color
                $('#current-dot').removeClass('grey red green').addClass(statusColor);

                // 4. Update the text color of the display button
                $('#current-text').removeClass('text-grey text-red text-green').addClass('text-' + statusColor);
            });
        });

        // Toggle equipment/work center options based on Maintenance For selection
        document.addEventListener('DOMContentLoaded', function () {
            var maintenanceForSelect = document.getElementById('maintenanceFor');
            var equipmentSelect = document.getElementById('equipmentSelect');

            function updateEquipmentOptions() {
                var selectedType = maintenanceForSelect.value; // "Equipment" or "Work Center"

                Array.prototype.forEach.call(equipmentSelect.options, function (opt) {
                    var type = opt.getAttribute('data-type');

                    if (!type) {
                        // Keep placeholder visible always
                        opt.style.display = '';
                        return;
                    }

                    if (type === selectedType) {
                        opt.style.display = '';
                    } else {
                        opt.style.display = 'none';
                    }
                });

                // Reset selection to placeholder after toggle
                equipmentSelect.selectedIndex = 0;
            }

            if (maintenanceForSelect && equipmentSelect) {
                updateEquipmentOptions();
                maintenanceForSelect.addEventListener('change', updateEquipmentOptions);
            }
        });
    </script>
</body>

</html>