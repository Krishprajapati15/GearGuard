<?php 
session_start();
require_once '../includes/scripts/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $token = $_POST['token'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate password match
    if ($newPassword !== $confirmPassword) {
        $_SESSION['Yatra_error_message'] = "Passwords do not match.";
        header("Location: setpass?token=$token");
        exit();
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Connect to the database again
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the user's email based on the reset token from the `forget_password_master` table
    $stmt = $conn->prepare("SELECT email FROM forget_password_master WHERE reset_token=? AND used=FALSE");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Update the password in the `user_master` table using the email
        $stmt2 = $conn->prepare("UPDATE user_master SET password=? WHERE email=?");
        $stmt2->bind_param("ss", $hashedPassword, $email);

        if ($stmt2->execute()) {
            // Mark the token as used
            $stmt3 = $conn->prepare("UPDATE forget_password_master SET used=TRUE WHERE reset_token=?");
            $stmt3->bind_param("s", $token);
            $stmt3->execute();

            // Show success message
            $_SESSION['success_message'] = "Password updated successfully!";
            header("Location: userlogin");
        } else {
            $_SESSION['Yatra_error_message'] = "Error updating password.";
            header("Location: setpass?token=$token");
        }
    } else {
        $_SESSION['Yatra_error_message'] = "Invalid or expired token.";
        header("Location: setpass?token=$token");
    }

    $conn->close();
}else{
    header("location: forgotpass");
}
?>