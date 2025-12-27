<?php
require_once "../includes/scripts/connection.php";
?>
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
                        <h4>Teams List</h4>
                        <h6>Manage Teams</h6>
                    </div>  
                    <div class="page-btn">
                        <a href="addteam" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add Team</a>
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
                                        <th>Team Name</th>
                                        <th>Team Members</th>
                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch all teams
                                    $teams = $conn->query("SELECT team_id, team_name FROM maintenance_team ORDER BY team_name ASC");

                                    if ($teams && $teams->num_rows > 0):
                                        while ($team = $teams->fetch_assoc()):
                                            $teamId   = (int)$team['team_id'];
                                            $teamName = $team['team_name'];

                                            // Fetch members for this team from technician_grp + user_master
                                            $membersSql = "SELECT u.user_name
                                                           FROM technician_grp tg
                                                           JOIN user_master u ON tg.user_id = u.user_id
                                                           WHERE tg.team_id = {$teamId}";
                                            $membersRes = $conn->query($membersSql);

                                            $memberNames = [];
                                            if ($membersRes && $membersRes->num_rows > 0) {
                                                while ($m = $membersRes->fetch_assoc()) {
                                                    $memberNames[] = $m['user_name'];
                                                }
                                            }

                                            $membersText = !empty($memberNames) ? implode(', ', $memberNames) : 'No members';
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($teamName); ?></td>
                                        <td><?php echo htmlspecialchars($membersText); ?></td>
                                        <td>
                                            <a class='me-3' href="editteam?team_id=<?php echo $teamId; ?>">
                                                <img src='../assets/img/icons/edit.svg' alt='img'>
                                            </a>
                                            <a class='me-3' href="teamdelete?team_id=<?php echo $teamId; ?>">
                                                <img src='../assets/img/icons/delete.svg' alt='img'>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        endwhile;
                                    else:
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-center">No teams found.</td>
                                    </tr>
                                    <?php endif; ?>
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