<?php
$currentURL = $_SERVER['PHP_SELF'];
$currentPage = basename($currentURL);
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li <?php if($currentPage=="index.php" || $currentPage=="requestadd.php" ){echo 'class="active"' ;}?>>
                    <a href="index"><img src="../assets/img/icons/dashboard.svg" alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li <?php if($currentPage=="maintenance_calendar.php" ){echo 'class="active"' ;}?>>
                    <a href="maintenance_calendar"><img src="../assets/img/icons/calendars.svg" alt="img"><span>
                            Calendar</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="../assets/img/icons/equipment.svg" alt="img"><span>
                            Equipment</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="workcenterlist" <?php if($currentPage=="workcenterlist.php" || $currentPage=="addworkcenter.php" || $currentPage=="editworkcenter.php"){echo 'class="active"' ;}?>>Work Center</a></li>
                        <li><a href="equipmentlist" <?php if($currentPage=="equipmentlist.php" || $currentPage=="editequipment.php" || $currentPage=="addequipment.php"){echo 'class="active"' ;}?>>Machine & Tools</a></li>
                    </ul>
                </li>
                <li <?php if($currentPage=="reporting.php" ){echo 'class="active"' ;}?>>
                    <a href="reporting"><img src="../assets/img/icons/report.svg" alt="img"><span>
                            Reporting</span> </a>
                </li>
                <li <?php if($currentPage=="teamlist.php" || $currentPage=="addteam.php" || $currentPage=="editteam.php" ){echo 'class="active"' ;}?>>
                    <a href="teamlist"><img src="../assets/img/icons/team.svg" alt="img"><span>
                            Teams</span> </a>
                </li>   
            </ul>
        </div>
    </div>
</div>