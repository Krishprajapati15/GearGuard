<?php
$currentURL = $_SERVER['PHP_SELF'];
$currentPage = basename($currentURL);
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li <?php if($currentPage=="index.php" || $currentPage=="addrequest.php" ){echo 'class="active"' ;}?>>
                    <a href="index"><img src="../assets/img/icons/dashboard.svg" alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li <?php if($currentPage=="maintenance.php" ){echo 'class="active"' ;}?>>
                    <a href="maintenance"><img src="../assets/img/icons/Maintenance.svg" alt="img"><span>
                            Maintenance</span> </a>
                </li>
                <li <?php if($currentPage=="maintenance_calendar.php" ){echo 'class="active"' ;}?>>
                    <a href="maintenance_calendar"><img src="../assets/img/icons/calendars.svg" alt="img"><span>
                            Calendar</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="../assets/img/icons/equipment.svg" alt="img"><span>
                            Equipment</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="placelist" <?php if($currentPage=="workcenter.php"){echo 'class="active"' ;}?>>Work Center</a></li>
                        <li><a href="placelist" <?php if($currentPage=="workcenter.php"){echo 'class="active"' ;}?>>Machine & Tools</a></li>
                    </ul>
                </li>
                <li <?php if($currentPage=="reporting.php" ){echo 'class="active"' ;}?>>
                    <a href="reporting"><img src="../assets/img/icons/report.svg" alt="img"><span>
                            Reporting</span> </a>
                </li>
                <li <?php if($currentPage=="teams.php" ){echo 'class="active"' ;}?>>
                    <a href="teams"><img src="../assets/img/icons/team.svg" alt="img"><span>
                            Teams</span> </a>
                </li>
                
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="../assets/img/icons/enable.svg" alt="img"><span>
                            Approval</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="guiderequest" <?php if($currentPage=="guiderequest.php" ||
                                $currentPage=="guidereqdetails.php" ){echo 'class="active"' ;}?>>Guide Requests</a></li>
                        <li><a href="hotelrequest" <?php if($currentPage=="hotelrequest.php" ||
                                $currentPage=="hotel_req_details.php" ){echo 'class="active"' ;}?>>Hotel Requests</a>
                        </li>
                        <li><a href="storerequest" <?php if($currentPage=="storerequest.php" ||
                                $currentPage=="store_req_details.php" ){echo 'class="active"' ;}?>>Store Requests</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>