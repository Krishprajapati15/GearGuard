<?php
session_start();
require "../includes/scripts/connection.php";

if(isset($_SESSION['odoo_logedin_user_id']) && (trim ($_SESSION['odoo_logedin_user_id']) !== '')){
    $user_id = $_SESSION['odoo_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    if($user_role != 3){
        header("Location: 404.php");
    }
} else {
    header("Location: ../user-login/userlogin.php");
} 

if(isset($_POST['submit'])){

    $eq_name   = $_POST['equipment'];
    $emp       = $_POST['employee'];
    $dept      = $_POST['dept'];
    $sno       = $_POST['sno'];
    $tech      = $_POST['technician'];
    $cat       = $_POST['eq_cat_id'];
    $company   = $_POST['company'];
    $assign    = $_POST['assign_date'];
    $scrap     = $_POST['scrap_date'];
    $location  = $_POST['location'];
    $workc     = $_POST['work_center'];
    $desc      = $_POST['desc'];

    $sql = "INSERT INTO equipment_master
    (eq_cat_id, company, used_by, maintaining_team, assign_date, technician_id, emp_id, scrap_date, location, work_center, `desc`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssiiissss", 
        $cat, $company, $dept, $eq_name, $assign, $tech, $emp, $scrap, $location, $workc, $desc
    );

    if($stmt->execute()){
        $_SESSION['success'] = "Equipment added!";
        header("Location: equipmentlist.php");
        exit;
    } else {
        echo "Error: ".$stmt->error;
    }
}
?>
