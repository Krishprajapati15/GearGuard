<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Login | Maintenance System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .bg-image {
        background: url("loginbg.jpg") no-repeat center center/cover;
        height: 100vh;
      }
    </style>
  </head>
  <body class="bg-image flex items-center justify-center p-4">
    <div
      class="bg-[#F8F6F4] shadow-lg rounded-lg flex flex-col md:flex-row overflow-hidden w-full max-w-3xl"
    >
      <div
        class="hidden md:flex w-2/5 bg-[#D2E9E9] flex-col justify-center items-center p-6 md:p-10"
      >
        <img
          src="yatra.png"
          alt="Illustration"
          class="w-32 md:w-48 h-32 md:h-48"
        />
        <h2 class="text-black font-bold text-lg mt-4 text-center">
          Maintenance & Asset Management Portal
        </h2>
        <p class="text-black text-sm text-center mt-2">
          Track equipment, request repairs, and manage preventive maintenance anytime, anywhere.
        </p>
        <div class="flex space-x-2 mt-6 md:mt-10 justify-center">
          <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm"
            >📋 Terms</span
          >
          <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm"
            >📢 Policy</span
          >
        </div>
      </div>

      <div class="w-full md:w-3/5 relative p-6 md:p-10">
        <div class="absolute top-6 left-1/2 transform -translate-x-1/2">
          <img src="gandiv.png" alt="Logo" class="h-10 md:h-12" />
        </div>

        <h2 class="text-xl md:text-2xl font-bold text-center mt-12 md:mt-10">
          Welcome Back 👋
        </h2>
        <p class="text-gray-600 text-xs md:text-sm text-center">
          Sign in to access your Maintenance Dashboard
        </p>

        <div class="flex space-x-2 mt-2 text-center justify-center">
          <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm"
            >🏭 Equipment Tracking</span
          >
          <span class="bg-[#E3F4F4] px-2 text-center py-1 rounded text-xs md:text-sm"
            >🔧 Repair Requests</span
          >
          <span class="bg-[#E3F4F4] px-2 text-center py-1 rounded text-xs md:text-sm"
            >🗓 Preventive Calendar</span
          >
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
          <br>
                <div id="successAlert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <strong class="font-semibold text-lg">🎉 Success!</strong>
                            <p class="mt-1 text-sm"><?php echo $_SESSION['success_message']; ?></p>
                        </div>
                        <button onclick="closeSuccessAlert()" class="text-green-700 hover:text-green-900 text-lg font-bold">&times;</button>
                    </div>
                </div>
                <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['Yatra_error_message'])): ?>
            <br>
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

        <form class="mt-6" action="../includes/scripts/signmein.php" method="post">
          <label class="block mb-2 text-sm">Email address </label>
          <div class="relative">
            <i class="fa fa-envelope absolute left-3 top-3 text-[#C4DFDF]"></i>
            <input
              type="email"
              class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter your Email"
              name="Yatra_login_email"
            />
          </div>

          <label class="block mt-4 mb-2 text-sm">Password</label>
          <div class="relative">
            <i class="fa fa-lock absolute left-3 top-3 text-[#C4DFDF]"></i>
            <input
              type="password"
              name="Yatra_login_password"
              class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
              placeholder="Enter your Password"
            />
          </div>

          <div class="flex justify-between items-center mt-3">
            <a href="forgotpass" class="text-xs md:text-sm text-blue-500"
              >Forgot password?</a
            >
          </div>

          <button
            class="w-full mt-4 bg-[#a5d0d0] hover:bg-[#83b7b7] transition-all text-white py-2 rounded-lg text-sm md:text-base"
          >
            Sign in →
          </button>
        </form>

        <p class="text-xs md:text-sm text-gray-600 mt-4 text-center">
          New to the Maintenance System?
          <a href="userregister" class="text-blue-500">Create an account →</a>
        </p>
      </div>
    </div>
    <script>
        function closeErrorAlert() {
            document.getElementById('errorAlert').classList.add('hidden');
        }

        function closeSuccessAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }

        setTimeout(() => {
            let errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                errorAlert.classList.add('hidden');
            }
        }, 3000);
        setTimeout(() => {
            let sucessalert = document.getElementById('successAlert');
            if (sucessalert) {
                sucessalert.classList.add('hidden');
            }
        }, 3000);
  </script>
  </body>
</html>
