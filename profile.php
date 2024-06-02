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

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

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
                <li class="active">
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
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="breadcrumb-path mb-4">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php"
                      ><img
                        src="assets/img/dash.png"
                        class="mr-2"
                        alt="breadcrumb"
                      />Home</a
                    >
                  </li>
                  <li class="breadcrumb-item active">Profile</li>
                </ul>
                <h3>Profile</h3>
              </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
              <div class="head-link-set">
                <ul>
                  <li><a class="active" href="#">Details</a></li>
                  <li><a href="profile-setting.php">Settings</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="row">
                <div class="col-xl-4 col-sm-12 col-12 d-flex">
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">Basic Information</h2>
                      <ul>
                        <li>
                          <a
                            class="add-link"
                            data-toggle="modal"
                            data-target="#editinformation"
                            ><i data-feather="plus"></i
                          ></a>
                        </li>
                        <li>
                          <a
                            class="delete-link"
                            data-toggle="modal"
                            data-target="#delete"
                            ><i data-feather="trash-2"></i
                          ></a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="member-info">
                        <ul>
                          <li>
                            <label>Preferred Name </label>
                            <span><?php echo $firstName ?></span>
                          </li>
                          <li>
                            <label>First Name </label>
                            <span><?php echo $firstName ?></span>
                          </li>
                          <li>
                            <label>Last Name </label>
                            <span><?php echo $lastName ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-12 col-12 d-flex">
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">Basic Information</h2>
                      <ul>
                        <li>
                          <a
                            class="add-link"
                            data-toggle="modal"
                            data-target="#editinformations"
                            ><i data-feather="plus"></i
                          ></a>
                        </li>
                        <li>
                          <a
                            class="delete-link"
                            data-toggle="modal"
                            data-target="#delete"
                            ><i data-feather="trash-2"></i
                          ></a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="member-info">
                        <ul>
                          <li>
                            <label>Phone Number </label>
                            <span>987654321</span>
                          </li>
                          <li>
                            <label>Personal Email</label>
                            <span
                              ><a
                                href="/cdn-cgi/l/email-protection"
                                class="__cf_email__"
                                data-cfemail="7815190a11191b170c0c1716381d00191508141d561b1715"
                                >[email&#160;protected]</a
                              ></span
                            >
                          </li>
                          <li>
                            <label>Secondary Number </label>
                            <span>986754231</span>
                          </li>
                          <li>
                            <label>Web Site </label>
                            <span>www.focustechnology.com</span>
                          </li>
                          <li>
                            <label>Linkedin </label>
                            <span>#mariacotton</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-12 col-12">
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">Dates</h2>
                      <a class="edit-link"><i data-feather="edit"></i></a>
                    </div>
                    <div class="card-body">
                      <div class="member-info">
                        <ul>
                          <li>
                            <label>Phone Number </label>
                            <span>987654321</span>
                          </li>
                          <li>
                            <label>Personal Email</label>
                            <span
                              ><a
                                href="/cdn-cgi/l/email-protection"
                                class="__cf_email__"
                                data-cfemail="e984889b80888a869d9d8687a98c91888499858cc78a8684"
                                >[email&#160;protected]</a
                              ></span
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">Contact</h2>
                      <label>New Type</label>
                    </div>
                    <div class="member-formcontent-path p-4">
                      <div class="member-date member-newformat">
                        <ul>
                          <li>
                            <div class="form-group">
                              <input type="text" placeholder="Add Start Date" />
                              <div class="addon">
                                <i data-feather="calendar"></i>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <input
                                type="text"
                                placeholder="Add Visa Expiry Date "
                              />
                              <div class="addon">
                                <i data-feather="calendar"></i>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <a class="btn my-3 btn-primary w-100">Add A Key Date</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="customize_popup">
        <div
          class="modal fade"
          id="editinformation"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                  Basic Information
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 p-0">
                  <div class="form-popup">
                    <input type="text" placeholder="Add Preferred Name" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="First Name" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Last Name" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Add Nationality" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Add Date of Birth" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Add Gender" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Add Blood Group" />
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add</button>
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="customize_popup">
        <div
          class="modal fade"
          id="editinformations"
          tabindex="-1"
          aria-labelledby="staticBackdropLabels"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabels">
                  Add Contact
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 p-0">
                  <div class="form-popup">
                    <input type="text" placeholder="Add Phone Number" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Login Email" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Add Personal Email" />
                  </div>
                  <div class="form-popup">
                    <input
                      type="text"
                      placeholder="Add Secondary Phone Number"
                    />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Add Web Site" />
                  </div>
                  <div class="form-popup">
                    <input type="text" placeholder="Connect Your Linkedin" />
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add</button>
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="customize_popup">
        <div
          class="modal fade"
          id="delete"
          tabindex="-1"
          aria-labelledby="staticBackdropLabels1"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header text-centers border-0">
                <h5 class="modal-title text-center" id="staticBackdropLabels1">
                  Are You Sure Want to Delete?
                </h5>
              </div>
              <div class="modal-footer text-centers">
                <button type="button" class="btn btn-primary">Delete</button>
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      data-cfasync="false"
      src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>