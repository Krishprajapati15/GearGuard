<?php
session_start();
require "../includes/scripts/connection.php";

if (isset($_POST['update'])) {

    $id  = $_POST['wc_id'];
    $name = $_POST['workcenter'];
    $code = $_POST['code'];
    $tag  = $_POST['tag'];
    $alt  = $_POST['alternative'];
    $cost = $_POST['cost'];
    $cte  = $_POST['cte'];
    $oee  = $_POST['oee'];

    $sql = "UPDATE work_center_master SET
            workcenter_name = ?,
            code = ?,
            tag = ?,
            alternative_wc = ?,
            cost_per_hour = ?,
            capacity_time_efficiency = ?,
            oee_target = ?
            WHERE wc_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $code, $tag, $alt, $cost, $cte, $oee, $id);

    if($stmt->execute()){
        $_SESSION['success'] = "Work Center Updated Successfully!";
        header("Location: workcenterlist.php");
    } else {
        echo "Error: ".$stmt->error;
    }
}
?>
