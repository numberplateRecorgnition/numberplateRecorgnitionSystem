<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trafic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize response message
$responseMessage = "";

// Handle create (register)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $plateNumber = trim($_POST['platenumb']);
    $phoneNumber = trim($_POST['phonenumb']);

    if (!empty($plateNumber) && !empty($phoneNumber)) {
        // Check for duplicate
        $check = $conn->prepare("SELECT id FROM offender WHERE platenumb = ?");
        $check->bind_param("s", $plateNumber);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $responseMessage = "Plate number already registered.";
        } else {
            $stmt = $conn->prepare("INSERT INTO offender (platenumb, phonenumb) VALUES (?, ?)");
            $stmt->bind_param("ss", $plateNumber, $phoneNumber);
            if ($stmt->execute()) {
                $responseMessage = "Plate number registered successfully.";
            } else {
                $responseMessage = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $check->close();
    } else {
        $responseMessage = "All fields are required.";
    }
}

// Handle update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $plateNumber = trim($_POST['platenumb']);
    $phoneNumber = trim($_POST['phonenumb']);

    $stmt = $conn->prepare("UPDATE offender SET platenumb = ?, phonenumb = ? WHERE id = ?");
    $stmt->bind_param("ssi", $plateNumber, $phoneNumber, $id);

    if ($stmt->execute()) {
        $responseMessage = "Record updated successfully.";
    } else {
        $responseMessage = "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM offender WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $responseMessage = "Record deleted successfully.";
    } else {
        $responseMessage = "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch records
$offenders = [];
$result = $conn->query("SELECT id, platenumb, phonenumb FROM offender ORDER BY id DESC");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $offenders[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/marketing-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 May 2025 16:48:25 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>NumberPlate Recorginition System</title>

    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

    <!-- date picker -->
     <link rel="stylesheet" href="vendors/datepicker/date-picker.css" />
     <!-- scrollabe  -->
     <link rel="stylesheet" href="vendors/scroll/scrollable.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
    <!-- text editor css -->
    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />
    <!-- morris css -->
    <link rel="stylesheet" href="vendors/morris/morris.css">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

    <!-- menu css  -->
    <link rel="stylesheet" href="css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
</head>
<body class="crm_body_bg">
    


<nav class="sidebar dark_sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    
    <div class="logo d-flex justify-content-between" >
    </div><div align="center" ><img src="img/one.jpg" alt="" width="100" height="100">
    </a></div>
        
        <a href="index_3.html">
        <div class="sidebar_close_icon d-lg-none">
            
            <i class="ti-close"></i>
            
            
        </div>
        
    <ul id="sidebar_menu">
    <!-- Dashboard Section -->
    <li class="mm-active">
        <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
                <img src="img/menu-icon/dashboard.svg" alt="">
            </div>
            <span>Dashboard</span>
        </a>
        <ul>
            <li><a class="active" href="index3.php">Home</a></li>

            <!-- Offences Mgt Dropdown -->
            <li>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <span>Offences Mgt</span>
                </a>
                <ul>
                    <li><a href="offenceform.php">Register Offence</a></li>
                    
                    <li><a href="contact.php">View Offences</a></li>
                </ul>
            </li>

            <!-- PlateNumber Mgt Dropdown -->
            <li>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <span>PlateNumber Mgt</span>
                </a>
                <ul>
                    <li><a href="platenumber.php">Register Plates</a></li>
                    <li><a href="viewplate.php">View Plates</a></li>
                
                   
                </ul>
            </li>

            <!-- Other Menu Items -->
            
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </li>

    <!-- Logout Section -->
    <li>
        <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
                <img src="img/menu-icon/10.svg" alt="">
            </div>
            <span>Logout</span>
        </a>
        <ul>
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    </li>
</ul>

</nav>
<!-- sidebar part end -->
 <!--/ sidebar  -->
<!-- sidebar part end -->
 <!--/ sidebar  -->


<section class="main_content dashboard_part default_content">
        <!-- menu  -->
     <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here..." >
                                    </div>
                                    <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                                </form>
                            </div>
                            <span class="f_s_14 f_w_400 ml_25 white_text text_white" >Apps</span>
                        </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a class="bell_notification_clicker nav-link-notify" href="#"> <img src="img/icon/bell.svg" alt="">
                                    
                                </a>
                                <!-- Menu_NOtification_Wrap  -->
                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="img/staf/2.png" alt=""></a>
                                        </div>
                                        
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="img/staf/4.png" alt=""></a>
                                        </div>
                                        
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Menu_NOtification_Wrap  -->
                            </li>
                           
                        </div>
                        <div class="profile_info">
                            <img src="img/user-1-icon-1638x2048-mzikma33.png" alt="#">
                            <div class="profile_info_iner">
                                
                                <div class="profile_info_details">
                                    <a href="logout.php">Log Out </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    
                                  
                                
                       
                                            
                                           
                              </div>
                        </div>
                    </div>
                    <!-- card_height_100  -->
                    <div class="white_card  mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Offence list</h3>
                                </div>
                                
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Plate Number</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($offenders)): ?>
                <?php foreach ($offenders as $offender): ?>
                    <?php if (isset($_GET['edit']) && $_GET['edit'] == $offender['id']): ?>
                        <!-- Edit mode -->
                        <tr>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $offender['id'] ?>">
                                <td><input type="text" class="form-control" name="platenumb" value="<?= htmlspecialchars($offender['platenumb']) ?>" required></td>
                                <td><input type="text" class="form-control" name="phonenumb" value="<?= htmlspecialchars($offender['phonenumb']) ?>" required></td>
                                <td>
                                    <button type="submit" name="update" class="btn btn-success btn-sm">Save</button>
                                    <a href="register_form.php" class="btn btn-secondary btn-sm">Cancel</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- View mode -->
                        <tr>
                            <td><?= htmlspecialchars($offender['platenumb']) ?></td>
                            <td><?= htmlspecialchars($offender['phonenumb']) ?></td>
                            <td>
                                <a href="edit_platenumber.php?id=<?= $offender['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                                <a href="viewplate.php?delete=<?= $offender['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php
// Close the database connection

?>
                              </div>
                        </div>
                    </div>
                </div>
               
        </div>
    </div>

<!-- footer part -->
<div class="footer_part default_footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- main content part end -->

<!-- ### CHAT_MESSAGE_BOX   ### -->

<div class="CHAT_MESSAGE_POPUPBOX">
    <div class="CHAT_POPUP_HEADER">
    <div class="MSEESAGE_CHATBOX_CLOSE">
    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7.09939 5.98831L11.772 10.661C12.076 10.965 12.076 11.4564 11.772 11.7603C11.468 12.0643 10.9766 12.0643 10.6726 11.7603L5.99994 7.08762L1.32737 11.7603C1.02329 12.0643 0.532002 12.0643 0.228062 11.7603C-0.0760207 11.4564 -0.0760207 10.965 0.228062 10.661L4.90063 5.98831L0.228062 1.3156C-0.0760207 1.01166 -0.0760207 0.520226 0.228062 0.216286C0.379534 0.0646715 0.578697 -0.0114918 0.777717 -0.0114918C0.976738 -0.0114918 1.17576 0.0646715 1.32737 0.216286L5.99994 4.889L10.6726 0.216286C10.8243 0.0646715 11.0233 -0.0114918 11.2223 -0.0114918C11.4213 -0.0114918 11.6203 0.0646715 11.772 0.216286C12.076 0.520226 12.076 1.01166 11.772 1.3156L7.09939 5.98831Z" fill="white"/>
    </svg>

    </div>
        <h3>Chat with us</h3>
        <div class="Chat_Listed_member">
            <ul>
                <li>
                    <a href="#">
                        <div class="member_thumb">
                         <img src="img/staf/1.png" alt="">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="member_thumb">
                         <img src="img/staf/2.png" alt="">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="member_thumb">
                         <img src="img/staf/3.png" alt="">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="member_thumb">
                         <img src="img/staf/4.png" alt="">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="member_thumb">
                         <img src="img/staf/5.png" alt="">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="member_thumb">
                            <div class="more_member_count">
                                <span>90+</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="CHAT_POPUP_BODY">
        <p class="mesaged_send_date">
        Sunday, 12 January
        </p>
    
    <div class="CHATING_SENDER">
        <div class="SMS_thumb">
            <img src="img/staf/1.png" alt="">
        </div>
        <div class="SEND_SMS_VIEW">
            <P>Hi! Welcome .
            How can I help you?</P>
        </div>
    </div>
    
    <div class="CHATING_SENDER CHATING_RECEIVEr">
        
        <div class="SEND_SMS_VIEW">
            <P>Hello</P>
        </div>
        <div class="SMS_thumb">
            <img src="img/staf/1.png" alt="">
        </div>
    </div>
    
    </div>
    <div class="CHAT_POPUP_BOTTOM">
        <div class="chat_input_box d-flex align-items-center">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Write your message" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn " type="button"> 
                        <!-- svg      -->
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.7821 3.21895C14.4908 -1.07281 7.50882 -1.07281 3.2183 3.21792C-1.07304 7.50864 -1.07263 14.4908 3.21872 18.7824C7.50882 23.0729 14.4908 23.0729 18.7817 18.7815C23.0726 14.4908 23.0724 7.50906 18.7821 3.21895ZM17.5813 17.5815C13.9525 21.2103 8.04773 21.2108 4.41871 17.5819C0.78907 13.9525 0.789485 8.04714 4.41871 4.41832C8.04752 0.789719 13.9521 0.789304 17.5817 4.41874C21.2105 8.04755 21.2101 13.9529 17.5813 17.5815ZM6.89503 8.02162C6.89503 7.31138 7.47107 6.73534 8.18131 6.73534C8.89135 6.73534 9.46739 7.31117 9.46739 8.02162C9.46739 8.73228 8.89135 9.30811 8.18131 9.30811C7.47107 9.30811 6.89503 8.73228 6.89503 8.02162ZM12.7274 8.02162C12.7274 7.31138 13.3038 6.73534 14.0141 6.73534C14.7241 6.73534 15.3002 7.31117 15.3002 8.02162C15.3002 8.73228 14.7243 9.30811 14.0141 9.30811C13.3038 9.30811 12.7274 8.73228 12.7274 8.02162ZM15.7683 13.2898C14.9712 15.1332 13.1043 16.3243 11.0126 16.3243C8.8758 16.3243 6.99792 15.1272 6.22834 13.2744C6.09642 12.9573 6.24681 12.593 6.56438 12.4611C6.64238 12.4289 6.72328 12.4136 6.80293 12.4136C7.04687 12.4136 7.27836 12.5577 7.37772 12.7973C7.95376 14.1842 9.38048 15.0799 11.0126 15.0799C12.6077 15.0799 14.0261 14.1836 14.626 12.7959C14.7625 12.4804 15.1288 12.335 15.4441 12.4717C15.7594 12.6084 15.9048 12.9745 15.7683 13.2898Z" fill="#707DB7"/>
                        </svg>

                        <!-- svg      -->
                    </button>
                    <button class="btn" type="button">
                         <!-- svg  -->
                         <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 0.289062C4.92455 0.289062 0 5.08402 0 10.9996C0 16.9152 4.92455 21.7101 11 21.7101C17.0755 21.7101 22 16.9145 22 10.9996C22 5.08472 17.0755 0.289062 11 0.289062ZM11 20.3713C5.68423 20.3713 1.375 16.1755 1.375 10.9996C1.375 5.82371 5.68423 1.62788 11 1.62788C16.3158 1.62788 20.625 5.82371 20.625 10.9996C20.625 16.1755 16.3158 20.3713 11 20.3713ZM15.125 10.3302H11.6875V6.98314C11.6875 6.61363 11.3795 6.31373 11 6.31373C10.6205 6.31373 10.3125 6.61363 10.3125 6.98314V10.3302H6.875C6.4955 10.3302 6.1875 10.6301 6.1875 10.9996C6.1875 11.3691 6.4955 11.669 6.875 11.669H10.3125V15.016C10.3125 15.3855 10.6205 15.6854 11 15.6854C11.3795 15.6854 11.6875 15.3855 11.6875 15.016V11.669H15.125C15.5045 11.669 15.8125 11.3691 15.8125 10.9996C15.8125 10.6301 15.5045 10.3302 15.125 10.3302Z" fill="#707DB7"/>
                        </svg>

                         <!-- svg  -->
                         <input type="file">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/### CHAT_MESSAGE_BOX  ### -->

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<!-- footer  -->
<script src="js/jquery1-3.4.1.min.js"></script>
<!-- popper js -->
<script src="js/popper1.min.js"></script>
<!-- bootstarp js -->
<script src="js/bootstrap1.min.js"></script>
<!-- sidebar menu  -->
<script src="js/metisMenu.js"></script>
<!-- waypoints js -->
<script src="vendors/count_up/jquery.waypoints.min.js"></script>
<!-- waypoints js -->
<script src="vendors/chartlist/Chart.min.js"></script>
<!-- counterup js -->
<script src="vendors/count_up/jquery.counterup.min.js"></script>

<!-- nice select -->
<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>
<!-- owl carousel -->
<script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

<!-- responsive table -->
<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>


<script src="js/chart.min.js"></script>
<!-- progressbar js -->
<script src="vendors/progressbar/jquery.barfiller.js"></script>
<!-- tag input -->
<script src="vendors/tagsinput/tagsinput.js"></script>
<!-- text editor js -->
<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/am_chart/amcharts.js"></script>

<script src="vendors/apex_chart/apexcharts.js"></script>
<script src="vendors/apex_chart/apex_dashboard.js"></script>

<!-- scrollabe  -->
<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>


<script src="vendors/chart_am/core.js"></script>
<script src="vendors/chart_am/charts.js"></script>
<script src="vendors/chart_am/animated.js"></script>
<script src="vendors/chart_am/kelly.js"></script>
<script src="vendors/chart_am/chart-custom.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/marketing-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 May 2025 16:48:28 GMT -->
</html>
