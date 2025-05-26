<?php
// Connect to your database
$conn = new mysqli("localhost", "root", "", "trafic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $platenumb = $_POST['platenumb'];
    $phonenumb = $_POST['phonenumb'];

    $stmt = $conn->prepare("UPDATE offender SET platenumb = ?, phonenumb = ? WHERE id = ?");
    $stmt->bind_param("ssi", $platenumb, $phonenumb, $id);
    $stmt->execute();

    header("Location: platenumber.php"); // Redirect to the main management page
    exit;
}

// Fetch the current values
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM offender WHERE id = ?");
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
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Plate Number</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/scroll/scrollable.css" />
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
</head>

<body class="crm_body_bg">
<nav class="sidebar dark_sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between"></div>
    <div align="center">
        <img src="img/one.jpg" alt="" width="100" height="100">
    </div>

    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/dashboard.svg" alt="">
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a class="active" href="index_3.php">Home</a></li>
                <li><a href="offenceform.php">Offences Mgt</a></li>
                <li><a href="platenumber.php">PlateNumber Mgt</a></li>
                <li><a href="signup.php">SignUp</a></li>
                <li><a href="contact.php">View</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/10.svg" alt="">
                </div>
                <span>Logout</span>
            </a>
            <ul>
                <li><a href="login.html">Logout</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </li>
    </ul>
</nav>

<div class="col-lg-12">
    <div class="white_box mb_30">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="modal-content cs_modal">
                    <div class="modal-header theme_bg_1 justify-content-center">
                        <h5 class="modal-title text_white">Edit Plate Number</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="edit_platenumber.php">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

                            <div class="mb-3">
                                <label for="platenumb" class="form-label">Plate Number</label>
                                <input type="text" name="platenumb" id="platenumb" class="form-control"
                                       value="<?php echo htmlspecialchars($row['platenumb']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="phonenumb" class="form-label">Phone Number</label>
                                <input type="text" name="phonenumb" id="phonenumb" class="form-control"
                                       value="<?php echo htmlspecialchars($row['phonenumb']); ?>" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="edit_platenumber.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /sign_in -->
            </div>
        </div>
    </div>
</div>

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#"><i class="ti-angle-up"></i></a>
</div>

<script src="js/jquery1-3.4.1.min.js"></script>
<script src="js/popper1.min.js"></script>
<script src="js/bootstrap1.min.js"></script>
<script src="js/metisMenu.js"></script>
<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
