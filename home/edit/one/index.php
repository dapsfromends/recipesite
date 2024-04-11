<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $result = [];

    include_once ("../../../connection.php");
    $posts = "SELECT * FROM recipemethod WHERE id =$id";
    $result_posts = $db->query($posts);
    if ($result_posts->num_rows > 0) {
        $row = $result_posts->fetch_assoc();
        $chefname = $row['chefname'];
        $image = $row['image'];
        $category = $row['category'];
        $RecipeName = $row['Recipename'];
        $Ingredients = $row['Ingredients'];
        $Directions = $row['Directions'];

    } else {
        header('location: ../../404.html');
    }

}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit A Recipe</title>
  <link rel="shortcut icon" type="image/png" href="/home/assets/images/logos/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="./editor.css">
  <link rel="stylesheet" href="/home/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif|Poppins|Roboto" />

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
              <a class="sidebar-link" href="/home" aria-expanded="false">
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
              <a class="sidebar-link " href="/home/create" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Create</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link active" href="/home/edit" aria-expanded="false">
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
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add a New Recipe</h5>
              <div class="card">
                <div class="card-body">
                  <form id="editor-form">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Chef Name</label>
                      <input type="text" id="chefname" value="<?php echo $chefname ?>" class="form-control" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Chef Name Should be Consistent.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Blog Cover Image</label>
                      <input type="text" id="image" value="<?php echo $image ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Category</label>
                      <input type="text" id="category" value="<?php echo $category ?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputtext1" class="form-label">Recipe Name</label>
                      <input type="text" id="RecipeName" value="<?php echo $RecipeName ?>" class="form-control">
                      <input type="text" id="id" value="<?php echo $id ?>" hidden class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputtext1" class="form-label">Ingredients</label>
                      <div id="body-ql">
                      <?php echo $Ingredients ?>
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputtext1" class="form-label">Directions</label>
                      <div id="editor">
                      <?php echo $Directions ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="/home/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/home/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/home/assets/js/sidebarmenu.js"></script>
  <script src="/home/assets/js/app.min.js"></script>
  <script src="/home/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>
    <script src="./update.js"></script>
</body>

</html>