<?php
// require_once 'google-config.php';
// $google_login_url = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="icon" type="image/png" href="Logo_Title.png">
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-image {
      background: url("registerbg.jpg") no-repeat center center/cover;
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

        <img src="yatra.png" alt="Illustration" class="w-32 md:w-48 h-32 md:h-48" />
      </a>
      <h2 class="text-black font-bold text-lg md:text-xl mt-4 text-center">
        Discover Jharkhand’s Hidden Treasures
      </h2>
      <p class="text-black text-sm text-center mt-2">
        Join a vibrant community and explore Jharkhand’s breathtaking landscapes, tribal heritage, and unforgettable
        travel experiences.
      </p>
      <div class="flex space-x-2 mt-6 md:mt-10 justify-center">
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm">📋 Terms</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm">📢 Policy</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm">🚨 Guideline</span>
      </div>
    </div>

    <div class="w-full md:w-3/5 relative p-6 md:p-10 scroll-container">
      <div class="absolute top-6 left-1/2 transform -translate-x-1/2">
        <img src="gandiv.png" alt="Logo" class="h-10 md:h-12" />
      </div>

      <h2 class="text-xl md:text-2xl font-bold text-center mt-12 md:mt-10">
        Join Yatra Today! 🚀
      </h2>
      <p class="text-gray-600 text-xs md:text-sm text-center">
        Create Your Account & Begin an Unforgettable Journey
      </p>

      <div class="flex space-x-2 mt-2 justify-center">
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm text-center">🏰 Heritage Sites</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm text-center">🚆 Travel & Connectivity</span>
        <span class="bg-[#E3F4F4] px-2 py-1 rounded text-xs md:text-sm text-center">🛕 Cultural Landmarks</span>
      </div>
      <?php
        if (isset($_SESSION['error_messages'])):
        ?>
      <br>
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded-lg shadow-md mb-4">

        <strong class="block font-semibold">⚠️ Oops! Something went wrong.</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
          <li>
            <?php echo $_SESSION['error_messages']; ?>
          </li>

        </ul>
      </div>
      <?php
        endif;
        unset($_SESSION['error_messages']); // Clear errors after displaying
        ?>

      <form class="mt-6" action="process_register" method="POST">
        <label class="block mb-2 text-sm">Email ID</label>
        <div class="relative">
          <i class="fa fa-envelope absolute left-3 top-3 text-[#C4DFDF]"></i>
          <input type="email" name="email" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Email" />
        </div>

        <label class="block mt-4 mb-2 text-sm">Mobile No</label>
        <div class="relative">
          <i class="fa fa-phone absolute left-3 top-3 text-[#C4DFDF]"></i>
          <input type="text" name="mobile" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Mobile No" />
        </div>

        <label class="block mt-4 mb-2 text-sm">User Name</label>
        <div class="relative">
          <i class="fa fa-user absolute left-3 top-3 text-[#C4DFDF]"></i>
          <input type="text" name="username" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
            placeholder="Enter your Username" />
        </div>

        <label class="block mt-4 mb-2 text-sm">Gender</label>
        <select class="w-full px-3 py-2 border rounded-lg text-sm" name="gender">
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        <div class="flex flex-col md:flex-row mt-4 gap-4">
          <div class="w-full md:w-1/2">
            <label class="block mb-2 text-sm">Password</label>
            <div class="relative">
              <i class="fa fa-lock absolute left-3 top-3 text-[#C4DFDF]"></i>
              <input type="password" name="password" class="w-full pl-10 px-3 py-2 border rounded-lg text-sm"
                placeholder="Password" />
            </div>
          </div>
          <div class="w-full md:w-1/2">
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
        Already have an account?
        <a href="userlogin" class="text-blue-500">Sign in →</a>
      </p>
      <br>
     
    </div>
  </div>
</body>

</html>