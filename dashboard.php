<?php
session_start(); // Start the session
include 'connect.php';

// Check if the user is not logged in, redirect them to the sign-in page
if (!isset($_SESSION['userId'])) {
   header("Location: index.php");
   exit();
}

// Retrieve user information from session variables
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];

$sqlEmployees = "SELECT COUNT(*) as employeeCount FROM employee";
$resultEmployees = $conn->query($sqlEmployees);

$employeeCount = 0;

if ($resultEmployees->num_rows > 0) {

   $rowEmployees = $resultEmployees->fetch_assoc();
   $employeeCount = $rowEmployees['employeeCount'];
}

$sqlLeave = "SELECT COUNT(*) as leaveCount FROM employee_leave";
$resultLeave = $conn->query($sqlLeave);

$leaveCount = 0;

if ($resultLeave->num_rows > 0) {
   
   $rowLeave = $resultLeave->fetch_assoc();
   $leaveCount = $rowLeave['leaveCount'];
}

$sqlDepartment = "SELECT COUNT(*) as departmentCount FROM department";
$resultDepartment = $conn->query($sqlDepartment);

$departmentCount = 0;

if ($resultDepartment->num_rows > 0) {
  
   $rowDepartment = $resultDepartment->fetch_assoc();
   $departmentCount = $rowDepartment['departmentCount'];
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <title>HR Mangement System</title>

   <link rel="shortcut icon" href="assets/img/icon.png">

   <link rel="stylesheet" href="assets/css/bootstrap.min.css">

   <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
   <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

   <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

   <div class="main-wrapper">

      <div class="header">

         <div class="header-left">
            <a href="dashboard.php" class="logo">
               <img src="assets/img/hrlogo.png" alt="Logo">
            </a>
            <a href="dashboard.php" class="logo logo-small">
               <img src="assets/img/hrlogo-small.png" alt="Logo" width="30" height="30">
            </a>
            <a href="javascript:void(0);" id="toggle_btn">
               <span class="bar-icon">
                  <span></span>
                  <span></span>
                  <span></span>
               </span>
            </a>
         </div>




         <div class="top-nav-search">
            <form>
               <input type="text" class="form-control" placeholder="">
               <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
         </div>


         <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
         </a>


         <ul class="nav user-menu">

            <li class="nav-item dropdown">
               <a href="#" class="dropdown-toggle nav-link pr-0" data-toggle="dropdown">
                  <i data-feather="bell"></i> <span class="badge badge-pill"></span>
               </a>
               <div class="dropdown-menu notifications">
                  <div class="topnav-dropdown-header">
                     <span class="notification-title">Notifications</span>
                     <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                  </div>
                  <div class="noti-content">
                     <ul class="notification-list">
                        <li class="notification-message">
                           <a href="activities.php">
                              <div class="media">
                                 <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt=""
                                       src="assets/img/profiles/avatar-02.jpg">
                                 </span>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Brian Johnson</span> paid the
                                       invoice <span class="noti-title">#DF65485</span></p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                        <li class="notification-message">
                           <a href="activities.php">
                              <div class="media">
                                 <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt=""
                                       src="assets/img/profiles/avatar-03.jpg">
                                 </span>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Marie Canales</span> has accepted
                                       your estimate <span class="noti-title">#GTR458789</span></p>
                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                        <li class="notification-message">
                           <a href="activities.php">
                              <div class="media">
                                 <div class="avatar avatar-sm">
                                    <span class="avatar-title rounded-circle bg-primary-light"><i
                                          class="far fa-user"></i></span>
                                 </div>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">New user registered</span></p>
                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                        <li class="notification-message">
                           <a href="activities.php">
                              <div class="media">
                                 <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt=""
                                       src="assets/img/profiles/avatar-04.jpg">
                                 </span>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Barbara Moore</span> declined the
                                       invoice <span class="noti-title">#RDW026896</span></p>
                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                        <li class="notification-message">
                           <a href="activities.php">
                              <div class="media">
                                 <div class="avatar avatar-sm">
                                    <span class="avatar-title rounded-circle bg-info-light"><i
                                          class="far fa-comment"></i></span>
                                 </div>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">You have received a new
                                          message</span></p>
                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="topnav-dropdown-footer">
                     <a href="activities.php">View all Notifications</a>
                  </div>
               </div>
            </li>


            <li class="nav-item dropdown has-arrow main-drop">
               <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img">
                     <img src="assets/img/user.jpg" alt="">
                     <span class="status online"></span>
                  </span>
                  <span><?php echo $firstName . " " . $lastName; ?></h4></span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="profile.php"><i data-feather="user" class="mr-1"></i> Profile</a>
                  <a class="dropdown-item" href="settings.php"><i data-feather="settings" class="mr-1"></i>
                     Settings</a>
                  <a class="dropdown-item" href="index.php"><i data-feather="log-out" class="mr-1"></i> Logout</a>
               </div>
            </li>

         </ul>
         <div class="dropdown mobile-user-menu show">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                  class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right ">
               <a class="dropdown-item" href="profile.php">My Profile</a>
               <a class="dropdown-item" href="settings.php">Settings</a>
               <a class="dropdown-item" href="index.php">Logout</a>
            </div>
         </div>

      </div>


      <div class="sidebar" id="sidebar">
         <div class="sidebar-inner slimscroll">
            <div class="sidebar-contents">
               <div id="sidebar-menu" class="sidebar-menu">
                  <div class="mobile-show">
                     <div class="offcanvas-menu">
                        <div class="user-info align-center bg-theme text-center">
                           <span class="lnr lnr-cross  text-white" id="mobile_btn_close">X</span>
                           <a href="javascript:void(0)" class="d-block menu-style text-white">
                              <div class="user-avatar d-inline-block mr-3">
                                 <img src="assets/img/profiles/avatar-18.jpg" alt="user avatar" class="rounded-circle"
                                    width="50">
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="sidebar-input">
                        <div class="top-nav-search">
                           <form>
                              <input type="text" class="form-control" placeholder="Search here">
                              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <ul>
                     <li class="active">
                        <a href="dashboard.php"><img src="assets/img/home.svg" alt="sidebar_img">
                           <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="employee.php"><img src="assets/img/employee.svg" alt="sidebar_img"><span>
                              Employees</span></a>
                     </li>
                     <li>
                        <a href="company.php"><img src="assets/img/company.svg" alt="sidebar_img"> <span>
                              Company</span></a>
                     </li>
                     <li>
                        <a href="calendar.php"><img src="assets/img/calendar.svg" alt="sidebar_img">
                           <span>Attendance</span></a>
                     </li>
                     <li>
                        <a href="leave.php"><img src="assets/img/leave.svg" alt="sidebar_img"> <span>Leave</span></a>
                     </li>
                     <li>
                        <a href="settings.php"><img src="assets/img/settings.svg"
                              alt="sidebar_img"><span>Settings</span></a>
                     </li>
                     <li>
                        <a href="profile.php"><img src="assets/img/profile.svg" alt="sidebar_img">
                           <span>Profile</span></a>
                     </li>
                  </ul>
                  <ul class="logout">
                     <li>
                        <a href="logout.php" onclick="return confirmLogout();"><img src="assets/img/logout.svg" alt="sidebar_img"><span>Log out</span></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>


      <div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-name 	mb-4">
               <h4 class="m-0"><img src="assets/img/user.jpg" class="mr-1" alt="profile" />
               <?php echo "Welcome! " . $firstName . " " . $lastName; ?></h4>
               <label><?php echo date("D, d M Y"); ?></label>
            </div>
            <div class="row mb-4">
               <div class="col-xl-12 col-sm-12 col-12">
                  <div class="breadcrumb-path ">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><img src="assets/img/dash.png" class="mr-3"
                                 alt="breadcrumb" />Home</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                     </ul>
                     <h3>Admin Dashboard</h3>
                  </div>
               </div>
               
            </div>
            <div class="row mb-4">
               <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card board1 fill1 ">
                     <div class="card-body">
                        <div class="card_widget_header">
                           <label>Employees</label>
                           <h4><?php echo $employeeCount; ?></h4>
                        </div>
                        <div class="card_widget_img">
                           <img src="assets/img/dash1.png" alt="card-img" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card board1 fill2 ">
                     <div class="card-body">
                        <div class="card_widget_header">
                           <label>Department</label>
                           <h4><?php echo $departmentCount ?></h4>
                        </div>
                        <div class="card_widget_img">
                           <img src="assets/img/dash2.png" alt="card-img" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card board1 fill3 ">
                     <div class="card-body">
                        <div class="card_widget_header">
                           <label>Leaves</label>
                           <h4><?php echo $leaveCount ?></h4>
                        </div>
                        <div class="card_widget_img">
                           <img src="assets/img/dash3.png" alt="card-img" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 col-12">
                  <div class="card board1 fill4 ">
                     <div class="card-body">
                        <div class="card_widget_header">
                           <label>Salary</label>
                           <h4>Hatdog</h4>
                        </div>
                        <div class="card_widget_img">
                           <img src="assets/img/dash4.png" alt="card-img" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-6 d-flex mobile-h">
                  <div class="card flex-fill">
                     <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                           <h5 class="card-title">Total Employees</h5>
                        </div>
                     </div>
                     <div class="card-body">
                        <div id="invoice_chart"></div>
                        <div class="text-center text-muted">
                           <div class="row">
                              <div class="col-4">
                                 <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="fas fa-circle text-primary mr-1"></i>
                                       Business</p>
                                 </div>
                              </div>
                              <div class="col-4">
                                 <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="fas fa-circle text-success mr-1"></i>
                                       Testing</p>
                                 </div>
                              </div>
                              <div class="col-4">
                                 <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="fas fa-circle text-danger mr-1"></i>
                                       Development</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 d-flex">
                  <div class="card flex-fill">
                     <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                           <h5 class="card-title">Total Salary By Unit</h5>
                        </div>
                     </div>
                     <div class="card-body">
                        <div id="sales_chart"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-6 col-sm-12 col-12 d-flex">
                  <div class="card card-list flex-fill">
                     <div class="card-header ">
                        <h4 class="card-title">Total Salary By Unit</h4>
                     </div>
                     <div class="card-body">
                        <div class="team-list">
                           <div class="team-view">
                              <div class="team-img">
                                 <img src="assets/img/profiles/avatar-03.jpg" alt="avatar" />
                              </div>
                              <div class="team-content">
                                 <label>Maria Cotton</label>
                                 <span>PHP</span>
                              </div>
                           </div>
                           <div class="team-action">
                              <ul>
                                 <li><a><i data-feather="trash-2"></i></a></li>
                                 <li><a><i data-feather="edit-2"></i></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="team-list">
                           <div class="team-view">
                              <div class="team-img">
                                 <img src="assets/img/profiles/avatar-04.jpg" alt="avatar" />
                              </div>
                              <div class="team-content">
                                 <label>Linda Craver</label>
                                 <span>IOS</span>
                              </div>
                           </div>
                           <div class="team-action">
                              <ul>
                                 <li><a><i data-feather="trash-2"></i></a></li>
                                 <li><a><i data-feather="edit-2"></i></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="team-list">
                           <div class="team-view">
                              <div class="team-img">
                                 <img src="assets/img/profiles/avatar-06.jpg" alt="avatar" />
                              </div>
                              <div class="team-content">
                                 <label>Jenni Sims</label>
                                 <span>Android</span>
                              </div>
                           </div>
                           <div class="team-action">
                              <ul>
                                 <li><a><i data-feather="trash-2"></i></a></li>
                                 <li><a><i data-feather="edit-2"></i></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="team-list">
                           <div class="team-view">
                              <div class="team-img">
                                 <img src="assets/img/profiles/avatar-11.jpg" alt="avatar" />
                              </div>
                              <div class="team-content">
                                 <label>Danny</label>
                                 <span>Design</span>
                              </div>
                           </div>
                           <div class="team-action">
                              <ul>
                                 <li><a><i data-feather="trash-2"></i></a></li>
                                 <li><a><i data-feather="edit-2"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-12 col-12 d-flex">
                  <div class="card card-list flex-fill">
                     <div class="card-header ">
                        <h4 class="card-title-dash">Your Upcoming Leave</h4>
                        <div class="dropdown">
                           <button class="btn btn-action " type="button" id="roomsBtn" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-h"></i>
                           </button>
                           <div class="dropdown-menu" aria-labelledby="roomsBtn">
                              <a class="dropdown-item" href="#">Action</a>
                           </div>
                        </div>
                     </div>
                     <div class="card-body p-0">
                        <div class="leave-set">
                           <span class="leave-inactive">
                              <i class="fas fa-briefcase"></i>
                           </span>
                           <label>Mon, 16 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                           <span class="leave-active">
                              <i class="fas fa-briefcase"></i>
                           </span>
                           <label>Fri, 20 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                           <span class="leave-active">
                              <i class="fas fa-briefcase"></i>
                           </span>
                           <label>Wed, 25 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                           <span class="leave-active">
                              <i class="fas fa-briefcase"></i>
                           </span>
                           <label>Fri, 27 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                           <span class="leave-active">
                              <i class="fas fa-briefcase"></i>
                           </span>
                           <label>Tue, 31 Dec 2021</label>
                        </div>
                        <div class="leave-viewall">
                           <a href="leave.php">View all <img src="assets/img/right-arrow.png" class="ml-2"
                                 alt="arrow" /></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>

   <script>
    function confirmLogout() {
      return confirm("Are you sure you want to log out?");
    }
   </script>

   <script src="assets/js/jquery-3.6.0.min.js"></script>

   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>

   <script src="assets/js/feather.min.js"></script>

   <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

   <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
   <script src="assets/plugins/apexchart/chart-data.js"></script>

   <script src="assets/js/script.js"></script>
</body>

</html>