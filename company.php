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
                <li class="active">
                  <a href="#"
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
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="breadcrumb-path mb-4">
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
                  <li class="breadcrumb-item active">Company</li>
                </ul>
                <h3>Company</h3>
              </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="row">
                <div class="col-xl-8 col-sm-12 col-12 d-flex">
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">Focus Technologies</h2>
                      <a
                        class="edit-link"
                        data-toggle="modal"
                        data-target="#editcompany"
                      >
                        <i data-feather="edit"></i
                      ></a>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xl-6 col-sm-12 col-12 d-flex">
                          <div class="member-registor flex-fill">
                            <ul>
                              <li>
                                <label>Register Number</label>
                                <span>FT0070</span>
                              </li>
                              <li>
                                <label>Incorporation Date</label>
                                <span>07 May 2000</span>
                              </li>
                              <li>
                                <label>VAT Number</label>
                                <span>VT0070</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12 d-flex">
                          <div class="member-address flex-fill">
                            <label>Address</label>
                            <span
                              >Santiago de Surco <br />
                              Av.Caminos del Inca 1325 <br />
                              United States</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-12 col-sm-12 col-12">
                          <div class="btn-link my-3">
                            <a
                              class="btn btn-new"
                              data-toggle="modal"
                              data-target="#addcompany"
                              >Add Company Information</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-12 col-12 d-flex">
                  <div class="card flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">Focus Technologies</h2>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xl-12 col-sm-12 col-12">
                          <div class="member-edits">
                            <ul>
                              <li>
                                <label>07448503267</label>
                                <a class="edit-link">
                                  <i data-feather="edit"></i
                                ></a>
                              </li>
                              <li>
                                <label>focustechnology.com</label>
                                <a class="edit-link">
                                  <i data-feather="edit"></i
                                ></a>
                              </li>
                              <li>
                                <label
                                  ><a
                                    href="/cdn-cgi/l/email-protection"
                                    class="__cf_email__"
                                    data-cfemail="f29a80b2949d9187818697919a9c9d9e9d958bdc919d9f"
                                    >[email&#160;protected]</a
                                  ></label
                                >
                                <a class="edit-link">
                                  <i data-feather="edit"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="card card-lists">
                <div class="card-header">
                  <h2 class="card-titles">DocumentsAdd</h2>
                  <a class="btn btn-head"> Add Document </a>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table custom-table no-footer">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Size</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="table-img">
                              <img src="assets/img/pdf.png" alt="pdf" />
                            </div>
                          </td>
                          <td>
                            <label>Leave & Attendance Policy</label>
                          </td>
                          <td><label> 05 Jan 2012 </label></td>
                          <td><label>20 MB</label></td>
                          <td>
                            <label
                              ><a
                                class="action_label4"
                                data-toggle="modal"
                                data-target="#delete"
                                >Delete <i data-feather="trash-2"></i></a
                            ></label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="table-img">
                              <img src="assets/img/word.png" alt="profile" />
                            </div>
                          </td>
                          <td><label>Dress Code Policy </label></td>
                          <td><label> 05 Jan 2012 </label></td>
                          <td><label> 30MB </label></td>
                          <td>
                            <label
                              ><a
                                class="action_label4"
                                data-toggle="modal"
                                data-target="#delete"
                                >Delete <i data-feather="trash-2"></i></a
                            ></label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="table-img">
                              <img src="assets/img/pdf.png" alt="pdf" />
                            </div>
                          </td>
                          <td>
                            <label>Leave & Attendance Policy</label>
                          </td>
                          <td><label> 05 Jan 2012 </label></td>
                          <td><label>20 MB</label></td>
                          <td>
                            <label
                              ><a
                                class="action_label4"
                                data-toggle="modal"
                                data-target="#delete"
                                >Delete <i data-feather="trash-2"></i></a
                            ></label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
              <div class="row">
                <div class="col-xl-6 col-sm-12 col-12 d-flex">
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-titles">
                        Focus Technologies<span>Head Office</span>
                      </h2>
                      <a
                        class="edit-link"
                        data-toggle="modal"
                        data-target="#editoffice"
                      >
                        <i data-feather="edit"></i
                      ></a>
                    </div>
                    <div class="card-body d-flex align-items-center">
                      <div class="member-head employee-image">
                        <h2>Members</h2>
                        <div class="avatar-group">
                          <div class="avatar avatar-xs group_img group_header">
                            <img
                              class="avatar-img rounded-circle"
                              alt="User Image"
                              src="assets/img/profiles/avatar-10.jpg"
                            />
                          </div>
                          <div class="avatar avatar-xs group_img group_header">
                            <img
                              class="avatar-img rounded-circle"
                              alt="User Image"
                              src="assets/img/profiles/avatar-15.jpg"
                            />
                          </div>
                          <div class="avatar avatar-xs group_img group_header">
                            <img
                              class="avatar-img rounded-circle"
                              alt="User Image"
                              src="assets/img/profiles/avatar-16.jpg"
                            />
                          </div>
                          <div class="avatar avatar-xs group_img group_header">
                            <img
                              class="avatar-img rounded-circle"
                              alt="User Image"
                              src="assets/img/profiles/avatar-17.jpg"
                            />
                          </div>
                          <div class="avatar avatar-xs group_img group_header">
                            <img
                              class="avatar-img rounded-circle"
                              alt="User Image"
                              src="assets/img/profiles/avatar-14.jpg"
                            />
                          </div>
                          <div class="avatar avatar-xs group_img group_header">
                            <img
                              class="avatar-img rounded-circle"
                              alt="User Image"
                              src="assets/img/profiles/avatar-18.jpg"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-sm-12 col-12 d-flex">
                  <div class="card card-lists flex-fill">
                    <div class="card-header">
                      <h2 class="card-title">Overview</h2>
                      <a class="btn btn-head" href="manage.php">
                        Manage Teams
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="over-view-path">
                        <ul>
                          <li>
                            <label>Teams</label>
                            <span>6</span>
                          </li>
                          <li>
                            <label>People</label>
                            <span>7</span>
                          </li>
                        </ul>
                      </div>
                      <div class="btn-set pl-0">
                        <a class="btn btn-apply" href="employee.php"
                          >People Directory</a
                        >
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
          id="addcompany"
          data-backdrop="static"
          data-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                  Add Company Information
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
                    <label>Office Name</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Registered Company Number</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Incorporation Date</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Vat Number</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Address line 1</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Address line 2</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>City</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Country</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Post - Code</label>
                    <input type="text" />
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
          id="editcompany"
          data-backdrop="static"
          data-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                  Edit Company Information
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
                    <label>Office Name</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Registered Company Number</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Incorporation Date</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Vat Number</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Address line 1</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Address line 2</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>City</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Country</label>
                    <input type="text" />
                  </div>
                  <div class="form-popup">
                    <label>Post - Code</label>
                    <input type="text" />
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
          id="editoffice"
          tabindex="-1"
          aria-labelledby="staticBackdropLabels"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabels">
                  Edit Office
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 p-0">
                  <div class="form-popup">
                    <input type="text" placeholder="Office Name" />
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

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>