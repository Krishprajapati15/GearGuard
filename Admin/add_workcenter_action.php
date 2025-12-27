<?php
session_start();
require "../includes/scripts/connection.php";

if (isset($_POST['submit'])) {

    $workcenter   = $_POST['workcenter'];
    $code         = $_POST['code'];
    $tag          = $_POST['tag'];
    $alternative  = $_POST['alternative'];
    $cost         = $_POST['cost'];
    $cte          = $_POST['cte'];
    $oee          = $_POST['oee'];

    $sql = "INSERT INTO work_center_master 
            (workcenter_name, code, tag, alternative_wc, cost_per_hour, capacity_time_efficiency, oee_target) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", 
        $workcenter, 
        $code, 
        $tag, 
        $alternative, 
        $cost, 
        $cte, 
        $oee
    );

    if ($stmt->execute()) {
        $_SESSION['success'] = "Work center added successfully!";
        header("Location: workcenterlist.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
