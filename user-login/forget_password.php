<?php
session_start();
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; 
require '../includes/scripts/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists in the user table
    // $conn = new mysqli('localhost', 'root', '', 'xenesis2025');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email is in user table
    $result = $conn->query("SELECT * FROM user_master WHERE email = '$email' and user_role = 3");
    
    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50)); // Generate 50 bytes of random data
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour

        // Store the token in the forget_password_master table
        $stmt = $conn->prepare("INSERT INTO forget_password_master (email, reset_token, token_expiry) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expiry);
        $stmt->execute();

        // Send reset email with PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'patelaryan5636@gmail.com'; // Your Gmail Address
            $mail->Password = 'difi ggvt huif zkcp';   // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email settings
            $mail->setFrom('patelaryan5636@gmail.com', 'Yatra Support');
            $mail->addAddress($email);
            $mail->Subject = "Reset Your Password";

            // Body content with reset link
            $resetLink = "localhost/odoo/user-login/setpass?token=$token"; // Adjust your domain URL accordingly
            $mail->isHTML(true);
            $mail->Body = "
                <div style='max-width: 600px; margin: auto; font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ddd;'>
                    <div style='text-align: center;'>
                        <h2 style='color: #2c7865;'>🔐 Yatra Password Reset Request</h2>
                        <p style='color: #444;'>Hello,</p>
                        <p style='color: #444;'>You recently requested to reset your password for the <strong>Yatra Travel Platform</strong>. Click the button below to reset it and continue your journey with us.</p>
                        <a href='$resetLink' style='display: inline-block; padding: 12px 20px; margin-top: 10px; font-size: 16px; font-weight: bold; color: #fff; background-color: #2c7865; text-decoration: none; border-radius: 5px;'>Reset Password</a>
                        <p style='margin-top: 20px; color: #666;'>If you did not request this, please ignore this email. This link will expire in <strong>1 hour</strong>.</p>
                        <hr style='border: none; height: 1px; background: #ddd; margin: 20px 0;'>
                        <p style='color: #888; font-size: 12px;'>For any issues, contact <a href='mailto:support@yatra.com' style='color: #2c7865; text-decoration: none;'>support@yatra.com</a></p>
                    </div>
                </div>
            ";

            $mail->send();
            header("Location: mailsend");
            // echo "A reset link has been sent to your email!";
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION["Yatra_error_message"] = "Email not found";
        header("Location: forgotpass");
        exit();
    }

    $conn->close();
}else{
    header("location: forgotpass");
}
?>
