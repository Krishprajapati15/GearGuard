<?php
session_start();
require_once "../includes/scripts/connection.php";

if (!isset($_POST['submit'])) {
    header('Location: addteam.php');
    exit;
}

// $company_name = trim($_POST['company_name'] ?? '');
$team_name    = trim($_POST['equipment'] ?? ''); // input name in addteam.php is "equipment"
$members      = $_POST['team_members'] ?? [];

if ($team_name === '') {
    $_SESSION['error'] = 'Team name is required.';
    header('Location: addteam.php');
    exit;
}

try {
    $conn->begin_transaction();

    // 1) Insert team into maintenance_team
    $stmtTeam = $conn->prepare("INSERT INTO maintenance_team (team_name) VALUES (?)");
    if (!$stmtTeam) {
        throw new Exception('Prepare failed for maintenance_team: ' . $conn->error);
    }

    $stmtTeam->bind_param('s', $team_name);
    if (!$stmtTeam->execute()) {
        throw new Exception('Could not insert team: ' . $stmtTeam->error);
    }

    $team_id = $conn->insert_id; // assumes team_id is AUTO_INCREMENT
    $stmtTeam->close();

    // 2) Add members to technician_grp for this team_id
    if (!empty($members)) {
        $stmtFindUser = $conn->prepare("SELECT user_id FROM user_master WHERE user_name = ? LIMIT 1");
        if (!$stmtFindUser) {
            throw new Exception('Prepare failed for user lookup: ' . $conn->error);
        }

        $stmtAddMember = $conn->prepare("INSERT INTO technician_grp (team_id, user_id) VALUES (?, ?)");
        if (!$stmtAddMember) {
            throw new Exception('Prepare failed for technician_grp: ' . $conn->error);
        }

        foreach ($members as $name) {
            $name = trim($name);
            if ($name === '') {
                continue;
            }

            // Look up user by name
            $stmtFindUser->bind_param('s', $name);
            $stmtFindUser->execute();
            $result = $stmtFindUser->get_result();
            $userRow = $result ? $result->fetch_assoc() : null;

            if ($userRow) {
                $user_id = (int)$userRow['user_id'];
                $stmtAddMember->bind_param('ii', $team_id, $user_id);
                if (!$stmtAddMember->execute()) {
                    throw new Exception('Could not insert member into technician_grp: ' . $stmtAddMember->error);
                }
            }
            // If no user found for this name, we silently skip it.
        }

        $stmtFindUser->close();
        $stmtAddMember->close();
    }

    $conn->commit();
    $_SESSION['success'] = 'Team created successfully.';
    header('Location: teamlist');
    exit;

} catch (Exception $e) {
    $conn->rollback();
    $_SESSION['error'] = 'Error creating team: ' . $e->getMessage();
    header('Location: addteam.php');
    exit;
}
