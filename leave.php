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

$query = "SELECT employee_leave.*, employee.firstName, employee.lastName FROM employee_leave INNER JOIN employee ON employee_leave.employeeId = employee.employeeId";
$result = $conn->query($query);

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

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="main-wrapper">
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
                <li>
                  <a href="calendar.php"
                    ><img src="assets/img/calendar.svg" alt="sidebar_img" />
                    <span>Attendance</span></a
                  >
                </li>
                <li class="active">
                  <a href="#"
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

      <div class="page-wrapper">
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
                  <li class="breadcrumb-item active">Leave</li>
                </ul>
                <h3>Leave</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-titles">Apply Leaves</h2>
                </div>
                <div class="form-creation">
                  <form action="insert_leave.php" method="post">
                  <div class="row">
                  <div class="col-xl-6 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" name="firstName" placeholder="First Name" required>
                      </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" name="lastName" placeholder="Last Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label
                          >Leave Type <span class="mandatory">*</span>
                        </label>
                        <select class="select" name="leaveType" required>
                          <option value="Select leave">Select leave</option>
                          <option value="Vacation leave">Vacation leave</option>
                          <option value="Family and Medical leave">Family and Medical leave</option>
                          <option value="Parental leave">Parental leave</option>
                          <option value="Sick leave">Sick leave</option>
                          <option value="Unpaid leave">Unpaid leave</option>
                          <option value="Public Holidays">Public Holidays</option>
                          <option value="Religious observance leave">Religious observance leave</option>
                          <option value="Sabbatical leave">Sabbatical leave</option>
                          <option value="Bereavement leave">Bereavement leave</option>
                          <option value="Military leave">Military leave</option>
                          <option value="Jury Duty leave">Jury Duty leave</option>
                          <option value="Study leave">Study leave</option>
                          <option value="Adverse weather leave">Adverse weather leave</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-6 col-sm-12 col-12">
                      <div class="form-group">
                        <label>From </label>
                        <input type="date" name="startDate" placeholder="yyyy-mm-dd" required>
                      </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 col-12">
                      <div class="form-group">
                        <label>To</label>
                        <input type="date" name="endDate" placeholder="yyyy-mm-dd" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12 col-sm-12 col-12">
                      <div class="form-btn">
                        <button type="submit" class="btn btn-apply">Apply</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-titles">Leave Details</h2>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table custom-table no-footer">
                      <thead>
                        <tr>
                          <th>Employee</th>
                          <th>Leave Type</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Days</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                  // Output data of each row
                                  while ($row = $result->fetch_assoc()) {
                                    $days = (strtotime($row['endDate']) - strtotime($row['startDate'])) / (60 * 60 * 24); // Calculate the number of days
                                    echo "<tr>";
                                    echo "<td>
                              <div class='table-img'>
                                  <label>{$row['firstName']} {$row['lastName']}</label>
                              </div>
                            </td>";
                                    echo "<td><label>{$row['leaveType']}</label></td>";
                                    echo "<td><label>{$row['startDate']}</label></td>";
                                    echo "<td><label>{$row['endDate']}</label></td>";
                                    echo "<td><label>{$days}</label></td>";
                                    echo "<td><label><a class='action_label3'>{$row['status']}</a></label></td>";
                                    echo "<td>";
                                    if ($row['status'] == 'Pending') {
                                      echo "<form action='process_leave.php' method='post'>";
                                      echo "<input type='hidden' name='leaveId' value='{$row['leaveId']}'>";
                                      echo "<button type='submit' name='approve' class='btn btn-success'>Approve</button>";
                                      echo "</form>";

                                      echo "<form action='process_leave.php' method='post'>";
                                      echo "<input type='hidden' name='leaveId' value='{$row['leaveId']}'>";
                                      echo "<button type='submit' name='disapprove' class='btn btn-danger'>Disapprove</button>";
                                      echo "</form>";
                                    } else {
                                      echo "Already {$row['status']}";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                  }
                                } else {
                                  echo "<tr><td colspan='7'>No records found</td></tr>";
                                }

                                // Close connection
                                $conn->close();
                                ?>
                            </tbody>
                    </table>
                  </div>
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

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
