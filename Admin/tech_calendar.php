<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Place List</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
<style>
    @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap");

    :root {
        --bg: #f8f6f4;
        --mint-soft: #d2e9e9;
        --mint-bold: #a5d0d0;
        --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    }

    body {
        background-color: var(--bg);
        font-family: "Plus Jakarta Sans", sans-serif;
        margin: 0;
        padding: 0;
    }

    /* --- Amazing Header Styling --- */
    .main-header {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--mint-soft);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .kanban-col {
        background: rgba(210, 233, 233, 0.3);
        border-radius: 24px;
        padding: 1.5rem;
        min-height: 75vh;
        border: 1px solid rgba(165, 208, 208, 0.2);
    }

    .task-card {
        background: white;
        border-radius: 20px;
        padding: 1.25rem;
        box-shadow: var(--card-shadow);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
        cursor: default;
    }

    .task-card:hover {
        transform: translateY(-5px);
        border-color: var(--mint-bold);
        box-shadow: 0 20px 30px -10px rgba(165, 208, 208, 0.4);
    }

    .priority-high {
        border-top: 6px solid #ff4d4d;
    }

    .priority-med {
        border-top: 6px solid #ffa500;
    }

    .priority-low {
        border-top: 6px solid #a5d0d0;
    }

    .btn-claim {
        background: linear-gradient(135deg, #a5d0d0 0%, #83b7b7 100%);
        box-shadow: 0 4px 15px rgba(165, 208, 208, 0.3);
    }

    .btn-calendar {
        background-color: #000;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-calendar:hover {
        background-color: #333;
        transform: translateY(-2px);
    }

    .dragging {
        opacity: 0.5;
        transform: scale(0.95);
    }

    /* Styling to make the calendar fill the page and handle custom dots */
    #calendar {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        min-height: 700px;
    }

    .fc-timegrid-event-harness-inset .fc-timegrid-event,
    .fc-timegrid-event.fc-event-mirror,
    .fc-timegrid-more-link {
        border-radius: 10px;
    }

    .fc-event-dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .dot-red {
        background-color: #ff0000;
    }

    .dot-yellow {
        background-color: #ffc107;
    }

    .dot-green {
        background-color: #28a745;
    }

    .fc-col-header-cell.fc-day-today .fc-col-header-cell-cushion {
        color: #ffc107 !important;
    }
</style>

<body>
    <header class="main-header px-8 py-4">
        <div class="max-w-[1600px] mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="h-10 rounded-xl flex items-center justify-center">
                    <img src="../logo2.png" alt="Logo" class="h-10 w-auto"
                        onerror="this.innerHTML='GG'; this.style.color='white';" />
                </div>
                <div>
                    <img src="../logo1.png" alt="Logo" class="h-10 w-auto"
                        onerror="this.innerHTML='GG'; this.style.color='white';" />
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <button onclick="window.location.href='technician_dashboard.php'"
                    class="btn-calendar flex items-center px-5 py-2.5 rounded-xl font-bold text-sm shadow-xl text-black bg-blue-200 hover:bg-blue-400"> Dashboard
                </button>
                <button onclick="window.location.href='tech_calendar.php'"
                    class="btn-calendar flex items-center px-5 py-2.5 rounded-xl font-bold text-sm shadow-xl">
                    <i class="fa fa-calendar-alt mr-2 text-[#A5D0D0]"></i> View Calendar
                </button>

                <div class="flex items-center pl-6 border-l border-gray-100">
                    <div class="text-right mr-3 hidden sm:block">
                        <p class="text-sm font-black text-gray-800">Aryan Patel</p>
                        <p class="text-[9px] font-bold text-gray-400">MECHANIC TEAM</p>
                    </div>
                    <div
                        class="w-11 h-11 rounded-2xl bg-[#D2E9E9] flex items-center justify-center text-[#83B7B7] font-black text-lg border-2 border-white shadow-sm">
                        AP
                    </div>
                </div>
            </div>
        </div>
    </header>

            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>



    <script src="../assets/js/script.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // Full-size weekly view like your image
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                slotMinTime: '06:00:00', // Matches your image start time
                slotMaxTime: '23:00:00', // Matches your image end time
                allDaySlot: false,
                height: 'auto',

                // Randomly placed dots (Events)
                events: [
                    {
                        title: 'Red Task',
                        start: '2025-12-22T10:00:00',
                        color: '#ff0000', // Red Dot
                        display: 'list-item'
                    },
                    {
                        title: 'Yellow Meeting',
                        start: '2025-12-26T14:30:00',
                        color: '#ffc107', // Yellow Dot
                        display: 'list-item'
                    },
                    {
                        title: 'Green Success',
                        start: '2025-12-21T09:00:00',
                        color: '#28a745', // Green Dot
                        display: 'list-item'
                    },
                    {
                        title: 'Current Time Line',
                        start: '2025-12-18T18:15:00',
                        color: '#ff0000',
                        display: 'block' // This mimics the red line in your image
                    }
                ],

                // This ensures the dots look like dots in the view
                eventDidMount: function (info) {
                    if (info.el.querySelector('.fc-list-event-dot')) {
                        info.el.querySelector('.fc-list-event-dot').style.backgroundColor = info.event.backgroundColor;
                    }
                }
            });
            calendar.render();
        });
    </script>
</body>

</html>