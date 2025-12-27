<?php
session_start();
require_once '../includes/scripts/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['error_messages'] = "Please fill all fields.";
        header("location: userregister");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error_messages'] = "Password and Confirm Password do not match.";
        header("location: userregister");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_messages'] = "Please enter a valid email address.";
        header("location: userregister");
        exit();
    }

    $sql = "SELECT * FROM user_master WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_messages'] = "This email address is already registered.";
        header("location: userregister");
        exit();
    }

    if (strlen($password) < 8 || strlen($password) > 14) {
        $_SESSION['error_messages'] = "Password must be between 8 and 14 characters.";
        header("location: userregister");
        exit();
    }

    if (strlen($username) > 16) {
        $_SESSION['error_messages'] = "Username must be a maximum of 16 characters.";
        header("location: userregister");
        exit();
    }

    // Generate OTP
    $otp = strtoupper(substr(str_shuffle('123456789'), 0, 4));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $_SESSION['temp_data'] = [
        'email' => $email,
        'username' => $username,
        'password' => $password
    ];

    $_SESSION['registered'] = true;

    $deleteStmt = $conn->prepare("DELETE FROM otp_verifications WHERE email = ?");
    $deleteStmt->bind_param("s", $email);
    $deleteStmt->execute();

    $stmt = $conn->prepare("INSERT INTO otp_verifications (email, otp) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $otp);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'patelaryan5636@gmail.com';
            $mail->Password = 'difi ggvt huif zkcp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // UPDATED TEXT ONLY
            $mail->setFrom('patelaryan5636@gmail.com', 'Maintenance System Support');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = '🔐 Your Maintenance System OTP Code';

            // HTML email body — TEXT UPDATED ONLY
            $mail->Body = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - Maintenance System</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 0; margin: 0; }
        .email-container {
            max-width: 600px; margin: 20px auto; background: #ffffff;
            padding: 20px; border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1); text-align: center;
        }
        .header {
            background: #0073e6; color: white;
            padding: 15px; font-size: 22px;
            font-weight: bold; border-radius: 10px 10px 0 0;
        }
        .otp-code {
            font-size: 24px; font-weight: bold;
            color: #0073e6; margin: 20px 0;
        }
        .content { font-size: 16px; color: #333; padding: 20px; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; }
        .verify-button {
            display: inline-block; padding: 12px 20px;
            background-color: #0073e6; color: white;
            text-decoration: none; font-weight: bold;
            border-radius: 5px; margin-top: 20px;
        }
        .verify-button:hover { background-color: #005bb5; }
        .yatra-logo { width: 80px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">Maintenance System - OTP Verification</div>
        <img class="yatra-logo" src="../logo1" alt="Logo">
        <div class="content">
            <p>Hello,</p>
            <p>Your One-Time Password (OTP) for securing your Maintenance System account is:</p>
            <div class="otp-code">'.$otp.'</div>
            <p>Please enter this OTP to complete your registration.</p>
            <p>If you did NOT request this email, you may ignore it.</p>
            <a href="localhost/odoo/otppage" class="verify-button">Verify Now</a>
        </div>
        <div class="footer">
            &copy; '.date("Y").' Maintenance System. All rights reserved.
        </div>
    </div>
</body>
</html>';

            $mail->send();

            $_SESSION['otp_success'] = 'OTP has been sent successfully. Please check your email.';
            header("Location: otppage");
            exit();
        } catch (Exception $e) {
            die("OTP Email could not be sent. Error: " . $mail->ErrorInfo);
        }
    } else {
        die("Failed to store OTP in database.");
    }
} else {
    header("location: userregister");
}
?>
