<?php
session_start();
require_once '../includes/scripts/connection.php'; // Include database connection

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
        $mail->Host = 'smtp.gmail.com'; // SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'patelaryan5636@gmail.com'; // Your email
        $mail->Password = 'xarq luyb tkix qwey'; // Your email app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('patelaryan5636@gmail.com', 'Yatra');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your New OTP Code';
        $mail->Body = "Your new OTP Code is <b>$new_otp</b>";

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
