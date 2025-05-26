<?php
// Connect to your database
$conn = new mysqli("localhost", "root", "", "trafic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $charge = $_POST['charge'];

    $stmt = $conn->prepare("UPDATE penalty SET title = ?, charge = ? WHERE id = ?");
    $stmt->bind_param("sdi", $title, $charge, $id);
    $stmt->execute();

    header("Location: contact.php");
    exit;
}

// Fetch the current values
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM penalty WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/marketing-html/resister.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 May 2025 16:49:43 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Number Plate Recorginition System</title>

    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <!-- datatable CSS -->
     <!-- scrollabe  -->
     <link rel="stylesheet" href="vendors/scroll/scrollable.css" />

    <!-- menu css  -->
    <link rel="stylesheet" href="css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
</head>
<body class="crm_body_bg">
    

 <!-- main content part here -->
 
 <!-- sidebar  -->
 <!-- sidebar part here -->
<nav class="sidebar dark_sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    
    <div class="logo d-flex justify-content-between" >
    </div><div align="center" ><img src="img/one.jpg" alt="" width="100" height="100">
    </a></div>
        
        <a href="index_3.html">
        <div class="sidebar_close_icon d-lg-none">
            
            <i class="ti-close"></i>
            
            
        </div>
        
    <ul id="sidebar_menu">
        <li class="mm-active">
          <a class="has-arrow"  href="#"  aria-expanded="false">
          <!-- <i class="fas fa-th"></i> -->
          <div class="icon_menu">
              <img src="img/menu-icon/dashboard.svg" alt="">
        </div>
            <span>Dashboard</span>
          </a>
          <ul>

            
            <li><a class="active" href="index_3.php">Home</a></li>
              <li><a href="offenceform.php">Offences Mgt</a></li>
              <li><a href="platenumber.php">PlateNumber Mgt</a></li>
              <li><a href="signup.php">signUp</a></li>
              <li><a href="contact.php">View </a></li>
          </ul>
        </li>
       
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
              
              <div class="icon_menu">
                  <img src="img/menu-icon/10.svg" alt="">
              </div>
              <span>logout</span>
            </a>
            <ul>
              <li><a href="login.html">Logout</a></li>
              <li><a  href="login.html">Login</a></li>
              
              
            </ul>
          </li>

      </ul>
    
</nav>
<head>
    <title>Edit Offence</title>
</head>
<body>
    <h2>Edit Offence</h2>
    <div class="col-lg-12">
    <div class="white_box mb_30">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- sign_in -->
                <div class="modal-content cs_modal">
                    <div class="modal-header theme_bg_1 justify-content-center">
                        <h5 class="modal-title text_white">Edit Offence</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="edit_offence.php">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="charge" class="form-label">Charge</label>
                                <input type="number" step="0.01" name="charge" id="charge" class="form-control" value="<?php echo htmlspecialchars($row['charge']); ?>" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /sign_in -->
            </div>
        </div>
    </div>
</div>

</body>

<!--/### CHAT_MESSAGE_BOX  ### -->
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
  </div>
  <!-- footer  -->
  <!-- jquery slim -->
  <script src="js/jquery1-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper1.min.js"></script>
  <!-- bootstarp js -->
  <script src="js/bootstrap1.min.js"></script>
  <!-- sidebar menu  -->
  <script src="js/metisMenu.js"></script>
  
  <!-- scrollabe  -->
  <script src="vendors/scroll/perfect-scrollbar.min.js"></script>
  <script src="vendors/scroll/scrollable-custom.js"></script>
  
  <!-- custom js -->
  <script src="js/custom.js"></script>
  </body>
  
<!-- Mirrored from demo.dashboardpack.com/marketing-html/resister.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 May 2025 16:49:43 GMT -->
</html>
