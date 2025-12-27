<?php
// session_start();
// require "includes/scripts/config.php";
require "includes/scripts/connection.php";


if (isset($_POST['submit'])){
    
    // Get form data
    $name = $_POST['name'];
    $company = $_POST['company'];
    $admin_id = $_POST['user_id'];

    echo "Received: Name = $name, Company = $company, Admin ID = $admin_id";

    // Validate input
    if (empty($name) || empty($company)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: add_catogery_action.php");
        exit;
    }

    // // Check if category already exists for this company
    $check_sql = "SELECT eq_cat_id FROM equipment_catgory WHERE name = ? AND company = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $name, $company);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $_SESSION['error'] = "Category '$name' already exists for company '$company'!";
        header("Location: add_catogery_action.php");
        exit;
    }

    // // Insert new category
    $sql = "INSERT INTO equipment_catgory (name, admin_id, company) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $name, $admin_id, $company);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Equipment category added successfully!";
        header("Location: categories.php");
        exit;
    } else {
        $_SESSION['error'] = "Error adding category: " . $conn->error;
        header("Location: add_catogery.php");
        exit;
    }

    $stmt->close();
    $check_stmt->close();
    $conn->close();

}else{
    echo "No form submission detected.";
}
?>
