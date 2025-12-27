<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="Logo_Title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Success</title>
    <script
      src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
      type="module"
    ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .glass-container {
        background: #f8f6f4;
        backdrop-filter: blur(20px);
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 420px;
        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.1);
      }

      .success-button {
        background: #c4dfdf;
        border: 1px solid rgba(0, 0, 0, 0.2);
        padding: 12px;
        width: 100%;
        border-radius: 8px;
        color: #333;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s ease;
      }

      .success-button:hover {
        background: #e3f4f4;
        border-color: black;
      }
    </style>
  </head>
  <body class="h-screen w-screen flex items-center justify-center bg-[#C4DFDF]">
    <div class="glass-container">
      <dotlottie-player
        src="https://lottie.host/3d592763-fd6f-466c-ac57-e8abe12f5fcc/EjHwYJFiVB.lottie"
        background="transparent"
        speed="1"
        style="width: 250px; height: 250px; margin: auto"
        loop
        autoplay
      ></dotlottie-player>

      <h2 class="text-2xl font-bold text-gray-800 mt-4">Success!</h2>
      <p class="text-gray-600 text-sm mt-2">
        A password reset link has been sent to your email.<br />Please check
        your inbox and follow the instructions.
      </p>

      <button onclick="window.location.href='index'" class="success-button mt-6">
        Go to Home →
      </button>
    </div>
    <script>
  setTimeout(function () {
    window.location.href = "userlogin";
  }, 5000);
</script>
  </body>
</html>
