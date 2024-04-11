<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ("../connection.php");

// Top Five
$top5 = "SELECT id, image, chefname, RecipeName FROM recipemethod LIMIT 5";
$result_top5 = $db->query($top5);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="/home/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/home/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/home/" class="text-nowrap logo-img">
            <img src="/img/favicon.png" width="100" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link active" href="/home" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Manage Recipes</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/home/create" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Create</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="/home/edit" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Edit</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/home/delete" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Delete Recipe</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Log Out</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/home/logout" aria-expanded="false">
                <span>
                  <i class="ti ti-logout"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="/home/assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                    class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/home/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <h3>Recent Last 5 Added Recipes</h3>
        <div class="row">
          <?php
          if ($result_top5->num_rows > 0) {
            while ($row = $result_top5->fetch_assoc()) {
              $id = $row['id'];
              
              $chefname = $row['chefname'];
              $title = $row['RecipeName'];
              $image = $row['image'];
              echo '<!-- start 1 -->';
              echo '<div class="col-sm-6 col-xl-3">';
              echo '<div class="card overflow-hidden rounded-2">';
              echo '<div class="position-relative">';
              echo '<a href="javascript:void(0)"><img src="' . $image . '" class="card-img-top rounded-0" alt="..."></a>';
              echo '<a href="/home/edit/one?id=' . $id . '" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-description"></i></a></div>';
              echo '<div class="card-body pt-3 p-4">';
              echo '<h6 class="fw-semibold fs-4">' . $title . '</h6>';
              echo '<div class="d-flex align-items-center justify-content-between">';
              echo '<h6 class="fw-semibold fs-4 mb-0"><a href="/home/edit/one?id=' . $id . '">' . $chefname . ' </a></h6>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<!-- End 1 -->';
            }
          } else {
            echo "No popular blogs found.";
          }
          ?>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">RECIPE RADAR 2024</p>
        </div>
      </div>
    </div>
  </div>
  <script src="/home/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/home/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/home/assets/js/sidebarmenu.js"></script>
  <script src="/home/assets/js/app.min.js"></script>
  <script src="/home/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/home/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/home/assets/js/dashboard.js"></script>
</body>

</html>