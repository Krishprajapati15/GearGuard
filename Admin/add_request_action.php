<?php
session_start();
include("../includes/scripts/connection.php");
if(!isset($_SESSION['odoo_logedin_user_id'])){ header("Location: ../user-login/userlogin.php"); exit(); }

$user_id = $_SESSION['odoo_logedin_user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT user_role,user_name FROM user_master WHERE user_id=$user_id"));

if($user['user_role'] != 3){ header("Location: 404.php"); exit(); }
if (isset($_POST['submit'])) {

    $subject         = $_POST['subject'];
    $created_by      = $_SESSION['odoo_logedin_user_id'];
    $team_name       = $_POST['team_name'];
    $catogery_name   = $_POST['catogery_name'];
    $equipment_name  = $_POST['equipment_name'];
    $schedule_date   = $_POST['schedule_date'];
    $request_date    = $_POST['request_date'];
    $priority        = $_POST['priority'];
    $maintance_type  = $_POST['maintance_type'];
    $company         = $_POST['company'];
    $technician_name = "null";
    $maintenance_for = $_POST["maintenance_for"];

    // Stage default value
    $req_stage = $_POST["status"];

    $sql = "INSERT INTO maintenance_request 
        (subject, created_by, maintenance_for, equipment_name, catogery_name, request_date, maintance_type, team_name, technician_name, schedule_date, req_stage, priority, company)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssssssssss", 
        $subject, 
        $created_by, 
        $maintenance_for,
        $equipment_name, 
        $catogery_name, 
        $request_date, 
        $maintance_type, 
        $team_name, 
        $technician_name, 
        $schedule_date, 
        $req_stage, 
        $priority, 
        $company
    );

    if ($stmt->execute()) {
        $_SESSION["success"] = "Maintenance request created successfully!";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
