<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Place List</title>
</head>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
<style>
    /* Styling to make the calendar fill the page and handle custom dots */
    #calendar {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        min-height: 700px;
    }

   .fc-timegrid-event-harness-inset .fc-timegrid-event, .fc-timegrid-event.fc-event-mirror, .fc-timegrid-more-link{
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
    <div class="main-wrapper">

        <?php
            include("header.php");
        ?>

        <?php
            include("sidebar.php");
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Schedule Calendar</h4>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
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