<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<style>
    .side {

  transition: all 0.2s;
}
.side:hover {

    transform: scale(1.02);
    
}
#settings {

    transition: all 0.2s;
}
#settings:hover {

transform: scale(1.02);

}
</style>
    
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="container">
            <a href="dashboard.php"><img src="images/trinidadLogo.png" alt="LOGO" style="height: 70px; width: 90px; margin-left:50px; margin-top:4px;" /> </a>
            </div>
    
            <div class="navbar-header">
                <a class="navbar-brand" href=""> </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <div class="side">
                        <li class="active mt-3">
                            <a href="dashboard.php" ><h6><span style="letter-spacing:1px;"><i class="bi bi-speedometer2"></i>  Dashboard </span></h6></a>
                        </li>
                    </div>
                  
 
                    <div class="side">
                        <li class="active">
                            <a href="official.php"><h6><span><i class="bi bi-person-lines-fill"></i>  Barangay Officials and Staff </span></h6></a>
                        </li>
                    </div>
                    <div class="side">
                        <li class="active">
                            <a href="residents.php"> <h6><span><i class="bi bi-people-fill"></i> Barangay Residents Info </span></h6></a>
                        </li>
                    </div>
                   
                   

                 <div class="side">
                 <li class="active">
                        <a href="household.php"> <h6><i class="bi bi-house-fill"></i>  Barangay Households</h6></a>
                    </li>

                 </div>
                 <div class="side">
                    <li class="active">
                            <a href="puroklist.php"> <h6><span><i class="bi bi-house-door"></i>  Barangay Purok</span></h6></a>
                        </li>
                </div>
                <div class="side">
                <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h6><i class="bi bi-award"> </i>Barangay Certificates</h6></a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon bi bi-file-earmark-text-fill"></i><a href="barangayclearance.php">Barangay Clearance</a></li>
                            <li><i class="menu-icon bi bi-file-earmark-word"></i><a href="barangayindigency.php">Barangay Indigency</a></li>
                            <!-- <li><i class="menu-icon bi bi-file-earmark-pdf"></i><a href="bussinesspermit.php">Bussiness Permit</a></li> -->
                            <!-- <li><i class="menu-icon bi bi-person-fill"></i><a href="user.php">Users</a></li> -->
                        </ul>
                    </li>
                </div>
                   
                  <div class="side">
                    <li class="active">
                        <a href="bwdates-report-ds.php"><h6><span><i class="bi bi-journal-arrow-down"> </i>  Reports</span></h6></a>
                    </li>
                 </div>
                    
                    
                    <li class="menu-item-has-children dropdown" id="settings">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h6><span><i class="bi bi-gear-fill"> </i>  Settings</span></h6></a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon bi bi-info-circle"></i><a href="barangayinfo.php">Barangay Info</a></li>
                            <li><i class="menu-icon bi bi-person-check-fill"></i><a href="chairmanship.php">Chairmanship</a></li>
                            <li><i class="menu-icon bi bi-list-task"></i><a href="position.php">Positions</a></li>
                            <li><i class="menu-icon bi bi-person-fill"></i><a href="user.php">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>