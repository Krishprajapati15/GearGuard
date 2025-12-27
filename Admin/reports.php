<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Reports Dashboard | GearGuard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Maintain your panel's compatibility with Tailwind */
        :root {
            --mint: #d2e9e9;
            --dark-mint: #a5d0d0;
        }
        /* Prevents Tailwind from interfering with your existing sidebar widths */
        .page-wrapper {
            display: block !important;
        }
        canvas {
            max-width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">

        <?php include("header.php"); ?>
        <?php include("sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="content p-6 space-y-6">
                
                <div class="page-header mb-4">
                    <div class="page-title">
                        <h4 class="text-xl font-bold">Maintenance Reports</h4>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <p class="text-xs font-bold text-gray-400 uppercase">Total Requests</p>
                        <h2 class="text-2xl font-bold text-gray-800" id="totalReqCount">43</h2>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <p class="text-xs font-bold text-gray-400 uppercase">Completed</p>
                        <h2 class="text-2xl font-bold text-green-500" id="completedCount">31</h2>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <p class="text-xs font-bold text-gray-400 uppercase">Scrapped Assets</p>
                        <h2 class="text-2xl font-bold text-red-500" id="scrappedCount">2</h2>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <p class="text-xs font-bold text-gray-400 uppercase">Active Technicians</p>
                        <h2 class="text-2xl font-bold text-blue-500">12</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <h3 class="font-bold text-gray-700 mb-4">Requests by Maintenance Team</h3>
                        <canvas id="teamChart" height="200"></canvas>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <h3 class="font-bold text-gray-700 mb-4">Equipment Category Health</h3>
                        <div class="max-w-[300px] mx-auto">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-[#D2E9E9]">
                        <h3 class="font-bold text-gray-700 mb-4">Urgency (Priority) Breakdown</h3>
                        <div class="max-w-[250px] mx-auto">
                            <canvas id="priorityChart"></canvas>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-[#D2E9E9] overflow-hidden">
                        <h3 class="font-bold text-gray-700 mb-4">Top Performing Technicians</h3>
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="border-b text-gray-400 uppercase text-[10px]">
                                    <th class="pb-2">Name</th>
                                    <th class="pb-2">Completed</th>
                                    <th class="pb-2">Performance</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr>
                                    <td class="py-3 font-semibold">Aryan Patel</td>
                                    <td class="py-3">15 Tasks</td>
                                    <td class="py-3"><span class="text-green-500 text-xs">★★★★★</span></td>
                                </tr>
                                <tr>
                                    <td class="py-3 font-semibold">John Doe</td>
                                    <td class="py-3">12 Tasks</td>
                                    <td class="py-3"><span class="text-green-500 text-xs">★★★★☆</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/feather.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script src="../assets/js/script.js"></script>

    <script>
        // --- Chart 1: Team Distribution ---
        const ctxTeam = document.getElementById("teamChart").getContext("2d");
        new Chart(ctxTeam, {
            type: "bar",
            data: {
                labels: ["IT Team", "Mechanic Team", "Electrical", "Facilities"],
                datasets: [{
                    label: "Number of Requests",
                    data: [12, 19, 7, 5],
                    backgroundColor: "#A5D0D0",
                    borderRadius: 5,
                }],
            },
            options: { responsive: true, plugins: { legend: { display: false } } },
        });

        // --- Chart 2: Category Health ---
        const ctxCat = document.getElementById("categoryChart").getContext("2d");
        new Chart(ctxCat, {
            type: "pie",
            data: {
                labels: ["Software", "Hardware", "Heavy Machinery", "Vehicles"],
                datasets: [{
                    data: [30, 20, 15, 35],
                    backgroundColor: ["#D2E9E9", "#A5D0D0", "#83B7B7", "#5a8b8b"],
                }],
            },
        });

        // --- Chart 3: Priority Breakdown ---
        const ctxPrio = document.getElementById("priorityChart").getContext("2d");
        new Chart(ctxPrio, {
            type: "doughnut",
            data: {
                labels: ["High", "Medium", "Low"],
                datasets: [{
                    data: [10, 45, 45],
                    backgroundColor: ["#ff4d4d", "#ffcc00", "#2ecc71"],
                    borderWidth: 0,
                }],
            },
            options: { cutout: "70%" },
        });
    </script>
</body>

</html>