<?php
require "../includes/scripts/connection.php";
session_start();

if (isset($_POST['submit'])) {

    $subject         = $_POST['subject'];
    $created_by      = $_POST['created_by'];
    $team_name       = $_POST['team_name'];
    $catogery_name   = $_POST['catogery_name'];
    $equipment_name  = $_POST['equipment_name'];
    $schedule_date   = $_POST['schedule_date'];
    $request_date    = $_POST['request_date'];
    $priority        = $_POST['priority'];
    $maintance_type  = $_POST['maintance_type'];
    $company         = $_POST['company'];
    $technician_name = "aryan";
    $maintenance_for = $_POST["maintenance_for"];

    // Stage default value
    $req_stage = "New Request";

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
