<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Add New Team</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #DCDCDC;
            min-height: 40px;
        }
        .member-item {
            border-left: 4px solid #ff9b44 !important; /* Matches common admin dashboard accents */
        }
    </style>
</head>

<body>
    <div class="main-wrapper">

        <?php include("header.php"); ?>
        <?php include("sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Add New Team</h4>
                    </div>
                </div>
                
                <form action="add_request_action.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Company Name <b style="color:red">*</b></label>
                                        <input type="text" name="company_name" class="form-control" value="PYS" placeholder="Enter Company Name" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Team Name <b style="color:red">*</b></label>
                                        <input type="text" name="equipment" class="form-control" value="PYS" placeholder="Enter Team Name">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Select Members (Searchable)</label>
                                        <div class="input-group">
                                            <div style="flex-grow: 1;">
                                                <select id="memberSelector" class="form-control select2" multiple="multiple">
                                                    <option value="John Doe">John Doe</option>
                                                    <option value="Jane Smith">Jane Smith</option>
                                                    <option value="Alex Johnson">Alex Johnson</option>
                                                    <option value="Sarah Parker">Sarah Parker</option>
                                                </select>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="addMemberBtn">Add Members</button>
                                            </div>
                                        </div>

                                        <div id="membersList" class="mt-3"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="teamlist" class="btn btn-cancel">Cancel</a>
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="../assets/js/script.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Searchable Dropdown
            if($('#memberSelector').length > 0) {
                $('#memberSelector').select2({
                    placeholder: "Search and select...",
                    allowClear: true,
                    width: '100%'
                });
            }

            // Add Members to list logic
            $('#addMemberBtn').on('click', function() {
                var selectedData = $('#memberSelector').select2('data');

                if (selectedData.length > 0) {
                    selectedData.forEach(function(obj) {
                        // Prevent duplicates in the list
                        if ($('#member_' + obj.id.replace(/\s+/g, '')).length === 0) {
                            addMemberRow(obj.text);
                        }
                    });
                    // Reset dropdown
                    $('#memberSelector').val(null).trigger('change');
                }
            });

            function addMemberRow(name) {
                var safeId = name.replace(/\s+/g, '');
                var memberHtml = `
                    <div class="d-flex justify-content-between align-items-center border p-2 mb-2 bg-light rounded member-item" id="member_${safeId}">
                        <span><strong>Member:</strong> ${name}</span>
                        <input type="hidden" name="team_members[]" value="${name}">
                        <button type="button" class="btn btn-danger btn-sm remove-btn">Delete</button>
                    </div>
                `;
                $('#membersList').append(memberHtml);
            }

            // Delete Logic
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.member-item').remove();
            });
        });
    </script>
</body>
</html>