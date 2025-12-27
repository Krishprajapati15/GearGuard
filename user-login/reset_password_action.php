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

    // Database connection validation
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch email based on reset token
    $stmt = $conn->prepare("SELECT email FROM forget_password_master WHERE reset_token=? AND used=FALSE");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Update user password
        $stmt2 = $conn->prepare("UPDATE user_master SET password=? WHERE email=?");
        $stmt2->bind_param("ss", $hashedPassword, $email);

        if ($stmt2->execute()) {
            // Mark token as used
            $stmt3 = $conn->prepare("UPDATE forget_password_master SET used=TRUE WHERE reset_token=?");
            $stmt3->bind_param("s", $token);
            $stmt3->execute();

            // SUCCESS MESSAGE updated only 👇
            $_SESSION['success_message'] = "Your password has been successfully reset! Please log in.";
            header("Location: userlogin");
        } else {
            // ERROR TEXT updated only 👇
            $_SESSION['Yatra_error_message'] = "Failed to update password. Please try again.";
            header("Location: setpass?token=$token");
        }
    } else {
        // ERROR TEXT updated only 👇
        $_SESSION['Yatra_error_message'] = "Invalid or expired password reset link.";
        header("Location: setpass?token=$token");
    }

    $conn->close();
} else {
    header("location: forgotpass");
}
?>
