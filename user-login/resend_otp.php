<?php
session_start();
require_once '../includes/scripts/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

// Check if session data exists
if (!isset($_SESSION['temp_data']['email'])) {
    header("location: userregister");
    echo json_encode(["status" => "error", "message" => "Session expired. Please register again."]);
    exit();
}

$email = $_SESSION['temp_data']['email'];

// Generate a new 4-character OTP
$new_otp = strtoupper(substr(str_shuffle('123456789'), 0, 4));

// Delete old OTP from the database
$deleteStmt = $conn->prepare("DELETE FROM otp_verifications WHERE email = ?");
$deleteStmt->bind_param("s", $email);
$deleteStmt->execute();

// Insert the new OTP into the database
$stmt = $conn->prepare("INSERT INTO otp_verifications (email, otp) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $new_otp);

if ($stmt->execute()) {
    // Send OTP via Email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'patelaryan5636@gmail.com';
        $mail->Password = 'xarq luyb tkix qwey';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // ONLY TEXT CHANGED 👇
        $mail->setFrom('patelaryan5636@gmail.com', 'Maintenance System');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your New OTP Code - Maintenance System';
        $mail->Body = "Hello,<br><br>Your new OTP Code to continue registering for the <b>Maintenance System</b> is:<br>
                       <h2 style='color:#2c7865;'>$new_otp</h2>
                       <br>If you did NOT request this, you may ignore this email.";

        $mail->send();

        echo json_encode(["status" => "success", "message" => "OTP resent successfully!"]);
        exit();
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Failed to send OTP. Try again."]);
        exit();
    }
} else {
    echo json_encode(["status" => "error", "message" => "Failed to generate new OTP."]);
    exit();
}
?>
