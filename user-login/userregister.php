<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <title>Register | Maintenance System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-image {
      background: url("login-bg.png") no-repeat center center/cover;
      height: 100vh;
    }

    .scroll-container {
      height: 90vh;
      overflow-y: auto;
      padding-right: 10px;
    }

    .scroll-container::-webkit-scrollbar {
      width: 6px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
      background: #c4dfdf;
      border-radius: 10px;
    }
  </style>
</head>

<body class="bg-image flex items-center justify-center p-4">

  <div class="bg-[#F8F6F4] shadow-lg rounded-lg flex flex-col md:flex-row-reverse overflow-hidden w-full max-w-4xl">
    <div class="hidden md:flex w-2/5 bg-[#D2E9E9] flex-col justify-center items-center p-6 md:p-10">
      <a href="index">
        <img src="../logo2.png" alt="Illustration" class=" h-32 md:h-48" />
      </a>
      <h2 class="text-black font-bold text-lg md:text-xl mt-4 text-center">
        Smart Maintenance & Asset Tracking System
      </h2>
      <p class="text-black text-sm text-center mt-2">
        Register now to join your organization's maintenance portal, track equipment health,
        submit repair requests, and collaborate with technical teams.
      </p>
      <div class="flex space-x-2 mt-6 md:mt-10 justify-center">
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm">📋 Terms</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm">📢 Policy</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm">🚨 Guidelines</span>
      </div>
    </div>

    <div class="w-full md:w-3/5 relative p-6 md:p-10 scroll-container ">
      <div class="absolute top-6 left-1/2 transform -translate-x-1/2">
        <img src="../logo1.png" alt="Logo" class="h-10 md:h-12" />
      </div>

      <h2 class="text-xl md:text-2xl font-bold text-center mt-12 md:mt-10">
        Create Account 🛠
      </h2>
      <p class="text-gray-600 text-xs md:text-sm text-center">
        Register to access your Maintenance Dashboard
      </p>

      <div class="flex space-x-2 mt-2 justify-center">
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm text-center">🏭 Equipment Tracking</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm text-center">🔧 Repair Requests</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm text-center">🗓 Preventive Calendar</span>
      </div>

      <form class="mt-6" action="process_register" method="POST">
        <label class="block mb-2 text-sm">Email ID</label>
        <div class="relative">
          <i class="fa fa-envelope absolute left-3 top-3 text-[#C4DFDF]"></i>
          <input type="email" name="email" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Email" />
        </div>

        <label class="block mt-4 mb-2 text-sm">Full Name</label>
        <div class="relative">
          <i class="fa fa-user absolute left-3 top-3 text-[#C4DFDF]"></i>
          <input type="text" name="username" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Full Name" />
        </div>

        <div class="md:flex-row mt-4 gap-4">
          <div>
            <label class="block mb-2 text-sm">Password</label>
            <div class="relative">
              <i class="fa fa-lock absolute left-3 top-3 text-[#C4DFDF]"></i>
              <input type="password" name="password" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
                placeholder="Create Password" />
            </div>
          </div>
          <div class="mt-4">
            <label class="block mb-2 text-sm">Confirm Password</label>
            <div class="relative">
              <i class="fa fa-lock absolute left-3 top-3 text-[#C4DFDF]"></i>
              <input type="password" name="confirm_password" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
                placeholder="Confirm Password" />
            </div>
          </div>
        </div>

        <button class="w-full mt-4 bg-[#a5d0d0] hover:bg-[#83b7b7] text-white py-2 transition-all delay-75 rounded-lg text-sm md:text-base">
          Register →
        </button>
      </form>

      <p class="text-xs md:text-sm text-gray-600 mt-4 text-center">
        Already registered?
        <a href="userlogin" class="text-blue-500">Sign in →</a>
      </p>
      <br>
    </div>
  </div>
</body>

</html>
