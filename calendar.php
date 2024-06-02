<?php
session_start(); // Start the session

// Check if the user is not logged in, redirect them to the sign-in page
if (!isset($_SESSION['userId'])) {
  header("Location: index.php");
  exit();
}

// Retrieve user information from session variables
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <title>HR Management System</title>

    <link rel="shortcut icon" href="assets/img/icon.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fullcalendar/fullcalendar.min.css"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <di class="main-wrapper">
      <div class="header">
        <div class="header-left">
          <a href="dashboard.php" class="logo">
            <img src="assets/img/hrlogo.png" alt="Logo" />
          </a>
          <a href="dashboard.php" class="logo logo-small">
            <img
              src="assets/img/hrlogo-small.png"
              alt="Logo"
              width="30"
              height="30"
            />
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
            <input type="text" class="form-control" placeholder="" />
            <button class="btn" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>

        <a class="mobile_btn" id="mobile_btn">
          <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
          <li class="nav-item dropdown">
            <a
              href="#"
              class="dropdown-toggle nav-link pr-0"
              data-toggle="dropdown"
            >
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
                          <img
                            class="avatar-img rounded-circle"
                            alt=""
                            src="assets/img/profiles/avatar-02.jpg"
                          />
                        </span>
                        <div class="media-body">
                          <p class="noti-details">
                            <span class="noti-title">Brian Johnson</span> paid
                            the invoice <span class="noti-title">#DF65485</span>
                          </p>
                          <p class="noti-time">
                            <span class="notification-time">4 mins ago</span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="notification-message">
                    <a href="activities.php">
                      <div class="media">
                        <span class="avatar avatar-sm">
                          <img
                            class="avatar-img rounded-circle"
                            alt=""
                            src="assets/img/profiles/avatar-03.jpg"
                          />
                        </span>
                        <div class="media-body">
                          <p class="noti-details">
                            <span class="noti-title">Marie Canales</span> has
                            accepted your estimate
                            <span class="noti-title">#GTR458789</span>
                          </p>
                          <p class="noti-time">
                            <span class="notification-time">6 mins ago</span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="notification-message">
                    <a href="activities.php">
                      <div class="media">
                        <div class="avatar avatar-sm">
                          <span
                            class="avatar-title rounded-circle bg-primary-light"
                            ><i class="far fa-user"></i
                          ></span>
                        </div>
                        <div class="media-body">
                          <p class="noti-details">
                            <span class="noti-title">New user registered</span>
                          </p>
                          <p class="noti-time">
                            <span class="notification-time">8 mins ago</span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="notification-message">
                    <a href="activities.php">
                      <div class="media">
                        <span class="avatar avatar-sm">
                          <img
                            class="avatar-img rounded-circle"
                            alt=""
                            src="assets/img/profiles/avatar-04.jpg"
                          />
                        </span>
                        <div class="media-body">
                          <p class="noti-details">
                            <span class="noti-title">Barbara Moore</span>
                            declined the invoice
                            <span class="noti-title">#RDW026896</span>
                          </p>
                          <p class="noti-time">
                            <span class="notification-time">12 mins ago</span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="notification-message">
                    <a href="activities.php">
                      <div class="media">
                        <div class="avatar avatar-sm">
                          <span
                            class="avatar-title rounded-circle bg-info-light"
                            ><i class="far fa-comment"></i
                          ></span>
                        </div>
                        <div class="media-body">
                          <p class="noti-details">
                            <span class="noti-title"
                              >You have received a new message</span
                            >
                          </p>
                          <p class="noti-time">
                            <span class="notification-time">2 days ago</span>
                          </p>
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
                <img src="assets/img/user.jpg" alt="" />
                <span class="status online"></span>
              </span>
              <span><?php echo $firstName . " " . $lastName; ?></span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="profile.php"
                ><i data-feather="user" class="mr-1"></i> Profile</a
              >
              <a class="dropdown-item" href="settings.php"
                ><i data-feather="settings" class="mr-1"></i> Settings</a
              >
              <a class="dropdown-item" href="index.php"
                ><i data-feather="log-out" class="mr-1"></i> Logout</a
              >
            </div>
          </li>
        </ul>
        <div class="dropdown mobile-user-menu show">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-toggle="dropdown"
            aria-expanded="false"
            ><i class="fa fa-ellipsis-v"></i
          ></a>
          <div class="dropdown-menu dropdown-menu-right">
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
                    <span class="lnr lnr-cross text-white" id="mobile_btn_close"
                      >X</span
                    >
                    <a
                      href="javascript:void(0)"
                      class="d-block menu-style text-white"
                    >
                      <div class="user-avatar d-inline-block mr-3">
                        <img
                          src="assets/img/profiles/avatar-18.jpg"
                          alt="user avatar"
                          class="rounded-circle"
                          width="50"
                        />
                      </div>
                    </a>
                  </div>
                </div>
                <div class="sidebar-input">
                  <div class="top-nav-search">
                    <form>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Search here"
                      />
                      <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <ul>
                <li>
                  <a href="dashboard.php"
                    ><img src="assets/img/home.svg" alt="sidebar_img" />
                    <span>Dashboard</span></a
                  >
                </li>
                <li>
                  <a href="employee.php"
                    ><img
                      src="assets/img/employee.svg"
                      alt="sidebar_img"
                    /><span> Employees</span></a
                  >
                </li>
                <li>
                  <a href="company.php"
                    ><img src="assets/img/company.svg" alt="sidebar_img" />
                    <span> Company</span></a
                  >
                </li>
                <li class="active">
                  <a href="#"
                    ><img src="assets/img/calendar.svg" alt="sidebar_img" />
                    <span>Attendance</span></a
                  >
                </li>
                <li>
                  <a href="leave.php"
                    ><img src="assets/img/leave.svg" alt="sidebar_img" />
                    <span>Leave</span></a
                  >
                </li>
                <li>
                  <a href="settings.php"
                    ><img
                      src="assets/img/settings.svg"
                      alt="sidebar_img"
                    /><span>Settings</span></a
                  >
                </li>
                <li>
                  <a href="profile.php"
                    ><img src="assets/img/profile.svg" alt="sidebar_img" />
                    <span>Profile</span></a
                  >
                </li>
              </ul>
              <ul class="logout">
                <li>
                  <a href="index.php"
                    ><img src="assets/img/logout.svg" alt="sidebar_img" /><span
                      >Log out</span
                    ></a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="page-wrapper calendar_page">
        <div class="content container-fluid">
          <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
              <div class="breadcrumb-path">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"
                      ><img
                        src="assets/img/dash.png"
                        class="mr-2"
                        alt="breadcrumb"
                      />Home</a
                    >
                  </li>
                  <li class="breadcrumb-item active">Attendance</li>
                </ul>
                <h3>Attendance</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
   <div class="container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="page-title">Employee Attendance</h2>
            <form id="searchForm">
              <div class="form-group">
                <label for="employeeSelect">Select Employee</label>
                <select class="form-control" id="employeeSelect">
                  <option>Select Employee...</option>
                  <option>Employee 1</option>
                  <option>Employee 2</option>
                  <option>Employee 3</option>
                  <!-- Add more employees here -->
                </select>
              </div>
              <div class="form-group">
                <label for="datePicker">Select Date</label>
                <input type="date" class="form-control" id="datePicker">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Attendance Table -->
      <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="card">
          <div class="card-body">
            <h2 class="page-title">Employee Attendance Records</h2>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Check-in Time</th>
                    <th>Check-out Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2024-06-01</td>
                    <td>Employee 1</td>
                    <td>09:00 AM</td>
                    <td>06:00 PM</td>
                    <td>Present</td>
                  </tr>
                  <tr>
                    <td>2024-06-01</td>
                    <td>Employee 2</td>
                    <td>08:45 AM</td>
                    <td>05:30 PM</td>
                    <td>Absent</td>
                  </tr>
                  <!-- Add more rows for other employees and dates -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





    </div>  
    
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
