<?php

require "includes/scripts/connection.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipment_name = trim($_POST['equipment_name'] ?? '');
    $employee_name  = trim($_POST['employee_name'] ?? '');
    $department     = trim($_POST['department'] ?? '');
    $serial_number  = trim($_POST['serial_number'] ?? '');
    $technician     = trim($_POST['technician'] ?? '');
    $category_raw   = trim($_POST['category'] ?? '');
    $company        = trim($_POST['company'] ?? '');

    // Basic validation
    if ($equipment_name === '' || $employee_name === '' || $department === '' ||
        $serial_number === '' || $technician === '' || $category_raw === '' || $company === '') {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: equipment.php');
        exit;
    }

    // Map form fields to equipment_master columns
    $eq_cat_id       = (int)$category_raw; // expect numeric category ID for now
    $used_by         = $employee_name;
    $maintaining_team = 0; // placeholder; adjust if you add a team selector
    $assign_date     = date('Y-m-d');
    $technician_id   = 0; // placeholder; map to real technician user_id if available
    $emp_id          = 0; // placeholder for employee ID if you have such table
    $scrap_date      = $assign_date; // initial value; can be updated later when scrapped
    $location        = $department;
    $work_center     = $department;
    $desc            = $equipment_name . ' | Serial: ' . $serial_number . ' | Technician: ' . $technician;

    // Insert into equipment_master
    $sql = "INSERT INTO equipment_master 
        (eq_cat_id, company, used_by, maintaining_team, assign_date, technician_id, emp_id, scrap_date, location, work_center, `desc`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        $_SESSION['error'] = 'Database error: ' . $conn->error;
        header('Location: equipment.php');
        exit;
    }

    $stmt->bind_param(
        'issisiissss',
        $eq_cat_id,
        $company,
        $used_by,
        $maintaining_team,
        $assign_date,
        $technician_id,
        $emp_id,
        $scrap_date,
        $location,
        $work_center,
        $desc
    );

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Equipment saved successfully.';
    } else {
        $_SESSION['error'] = 'Error saving equipment: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header('Location: equipment.php');
    exit;
}

// If accessed directly without POST
header('Location: equipment.php');
exit;
