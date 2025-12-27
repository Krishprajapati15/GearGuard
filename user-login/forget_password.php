<?php
session_start();
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; 
require '../includes/scripts/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email exists in the user table
    $result = $conn->query("SELECT * FROM user_master WHERE email = '$email' AND user_role = 3");
    
    if ($result->num_rows > 0) {
        // Generate token
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Insert token
        $stmt = $conn->prepare("INSERT INTO forget_password_master (email, reset_token, token_expiry) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expiry);
        $stmt->execute();

        // Send Reset Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'patelaryan5636@gmail.com'; 
            $mail->Password = 'difi ggvt huif zkcp';   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email Sender
            $mail->setFrom('patelaryan5636@gmail.com', 'Maintenance System Support');
            $mail->addAddress($email);
            $mail->Subject = "Reset Your Maintenance System Password";

            // Reset Link
            $resetLink = "localhost/gearguard/user-login/setpass?token=$token";

            // Body Content (TEXT ONLY UPDATED)
            $mail->isHTML(true);
            $mail->Body = "
                <div style='max-width: 600px; margin: auto; font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ddd;'>
                    <div style='text-align: center;'>
                        <h2 style='color: #2c7865;'>🔐 Maintenance System Password Reset</h2>
                        <p style='color: #444;'>Hello,</p>
                        <p style='color: #444;'>You recently requested to reset your password for the <strong>Maintenance and Asset Management Portal</strong>.</p>
                        <p style='color: #444;'>Click the button below to reset your password and access your system again.</p>
                        
                        <a href='$resetLink' style='display: inline-block; padding: 12px 20px; margin-top: 10px; font-size: 16px; font-weight: bold; color: #fff; background-color: #2c7865; text-decoration: none; border-radius: 5px;'>Reset Password</a>
                        
                        <p style='margin-top: 20px; color: #666;'>If you did NOT request this, you may safely ignore this email. The link will expire in <strong>1 hour</strong>.</p>
                        
                        <hr style='border: none; height: 1px; background: #ddd; margin: 20px 0;'>
                        <p style='color: #888; font-size: 12px;'>For help, contact <a href='mailto:support@maintenance.com' style='color: #2c7865; text-decoration: none;'>support@maintenance.com</a></p>
                    </div>
                </div>
            ";

            $mail->send();
            header("Location: mailsend");
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
