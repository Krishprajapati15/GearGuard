<?php
session_start();
require '../includes/scripts/connection.php';

// Check if the token is set
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM forget_password_master WHERE reset_token=? AND used=FALSE");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Token valid
    } else {
        header("location: forgotpass");
        exit;
    }

    $conn->close();
} else {
    header("location: forgotpass");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .bg-image {
        background: url("login-bg.png") no-repeat center center/cover;
        height: 100vh;
      }

      .box {
        background: #f8f6f4;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 20px;
        width: 400px;
        height: 400px;
        text-align: center;
        position: relative;
      }

      .popup {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: #c4dfdf;
        color: white;
        padding: 12px 20px;
        border-radius: 6px;
        display: none;
        animation: fadeIn 0.3s ease-in-out;
      }

      .popup .close-btn {
        margin-left: 12px;
        cursor: pointer;
        font-weight: bold;
        color: black;
      }

      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .home-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #c4dfdf;
        padding: 6px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
      }

      .home-btn:hover {
        background: #d2e9e9;
      }
    </style>
  </head>
  <body class="bg-image flex items-center justify-center">
    
    <div class="box">
      <button class="home-btn" onclick="goHome()">🏠</button>
      <img src="../logo.png" alt="Logo" class="h-12 mx-auto mb-2 mt-5" />
      <h2 class="text-2xl font-bold text-gray-800">Reset Your Password</h2>
      <p class="text-gray-600 text-sm px-5">
        Enter your new password to regain access to your Maintenance System account.
      </p>
      
      <?php if(isset($_SESSION['Yatra_error_message'])): ?>
          <div id="errorAlert" class="fade-out bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
              <div class="flex items-center justify-between">
                  <div>
                      <strong class="font-semibold text-lg">⚠️ Error!</strong>
                      <p class="mt-1 text-sm"><?php echo $_SESSION['Yatra_error_message']; ?></p>
                  </div>
                  <button onclick="closeErrorAlert()" class="text-red-700 hover:text-red-900 text-lg font-bold">&times;</button>
              </div>
          </div>
          <?php unset($_SESSION['Yatra_error_message']); ?>
      <?php endif; ?>

      <form method="POST" action="reset_password_action.php">
        <input type="hidden" name="token" value="<?php echo $token; ?>" />

        <input
          type="password"
          id="newPassword"
          name="newPassword"
          class="w-full p-2 text-lg mt-4 border-2 border-[#c4dfdf] rounded-md focus:outline-none focus:ring-2 focus:ring-[#D2E9E9]"
          placeholder="Enter new password"
        />

        <input
          type="password"
          id="confirmPassword"
          name="confirmPassword"
          class="w-full p-2 text-lg mt-4 border-2 border-[#c4dfdf] rounded-md focus:outline-none focus:ring-2 focus:ring-[#D2E9E9]"
          placeholder="Confirm new password"
        />

        <button
          type="submit"
          class="w-full mt-8 bg-[#C4DFDF] text-gray-600 py-2 rounded-lg text-lg hover:bg-[#D2E9E9] transition"
        >
          Reset Password →
        </button>
      </form>
    </div>

    <script>
      function goHome() {
        window.location.href = "index.php";
      }

      function closeErrorAlert() {
        document.getElementById('errorAlert').classList.add('hidden');
      }

      setTimeout(() => {
        let errorAlert = document.getElementById('errorAlert');
        if (errorAlert) {
            errorAlert.classList.add('hidden');
        }
      }, 3000);
    </script>
  </body>
</html>
