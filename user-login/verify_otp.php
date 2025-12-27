<?php
session_start();
require_once '../includes/scripts/connection.php'; // Database connection


  // Check if the user came from the registration page
  if (!isset($_SESSION['registered']) || $_SESSION['registered'] !== true) {
      header("Location: userregister");
      exit();
  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['temp_data'])) {
      header("location: userregister");
      die("Session expired. Please register again.");
    }

    $email = $_SESSION['temp_data']['email'];
    $mobile = $_SESSION['temp_data']['mobile'];
    $username = $_SESSION['temp_data']['username'];
    $gender = $_SESSION['temp_data']['gender'];
    $password = $_SESSION['temp_data']['password'];
    $otp_entered = strtoupper(trim($_POST['otp']));

    // Fetch OTP from the database
    $stmt = $conn->prepare("SELECT otp FROM otp_verifications WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($otp_stored);
        $stmt->fetch();

        if ($otp_entered === $otp_stored) {
            // OTP is correct, insert user into user_master
            $insertStmt = $conn->prepare("INSERT INTO `user_master`(`user_name`, `email`, `phone`, `password`, `gender`, `is_verified`, `is_confirmed`, `user_role`) VALUES (?,?,?,?,?,0,0,3)");
            $insertStmt->bind_param("ssiss", $username, $email, $mobile, $password, $gender);

            if ($insertStmt->execute()) {
                // Delete OTP record after successful verification
                $deleteStmt = $conn->prepare("DELETE FROM otp_verifications WHERE email = ?");
                $deleteStmt->bind_param("s", $email);
                $deleteStmt->execute();

                // Unset session temp data
                unset($_SESSION['temp_data']);

                // Redirect to login page or success message
                $_SESSION['success_message'] = "Your account has been successfully created. Please login.";
                header("Location: userlogin");
                exit();
            } else {
                die("Failed to insert user data.");
            }
        } else {
            $_SESSION['otp_error'] = "The OTP you entered is incorrect. Please try again.";
            header("location: otppage");
            exit();
            // die("Invalid OTP. Please try again.");
        }
    } else {
        $_SESSION['otp_error'] = "OTP not found. Please request a new one.";
        header("location: otppage");
        exit();
    }
}
?>
