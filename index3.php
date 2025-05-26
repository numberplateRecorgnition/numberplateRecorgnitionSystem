<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// User is authenticated, display dashboard content
echo "Welcome Back, " . htmlspecialchars($_SESSION['username']) . "!";
?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/marketing-html/index_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 May 2025 16:48:28 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Number Plate Recorginition for Uganda Police</title>

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


<section class="main_content dashboard_part large_header_bg">
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
        <div class="container-fluid p-0 ">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <!-- single_quick_activity  -->
                                        <div class="single_quick_activity">
                                            <div class="count_content">
                                                <p>Register Offences </p>
                                                <h3><span >Offences</span> </h3>
                                            </div>

                                            <a href="offenceform.php" class="notification_btn">
                    
                                                <button class="notification_btn">view</button>
                                            </a>
                                            <div id="bar1" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="20"></span>
                                            </div>
                                        </div>
                                        <!-- single_quick_activity  -->
                                        <div class="single_quick_activity">
                                            <div class="count_content">
                                                <p>Register Plate numbers </p>
                                                <h3><span >Plate numbers</span> </h3>
                                            </div>
                                            <a href="platenumber.php" class="notification_btn yellow_btn">
                    
                                                <button class="notification_btn yellow_btn">view</button>
                                            </a>
                                            
                                            <div id="bar2" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="15"></span>
                                            </div>
                                        </div>
                                        <!-- single_quick_activity  -->
                                        <div class="single_quick_activity">
                                            <div class="count_content">
                                                <p>SignUp</p>
                                                <h3>SignUp<span >Roles</span> </h3>
                                            </div>
                                          <a href="signup.php" class="notification_btn green_btn">
                    
                                                <button class="notification_btn green_btn">view</button>
                                            </a>
                                
                                            <div id="bar3" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="15"></span>
                                            </div>
                                        </div>
                                        <!-- single_quick_activity  -->
                                        <div class="single_quick_activity">
                                            <div class="count_content">
                                                <p>View Lists</p>
                                                <h3><span > List Details </span></h3>
                                            </div>
                                            <a href="contact.php" class="notification_btn violate_btn">
                    
                                                <button class="notification_btn violate_btn">view</button>
                                            </a>
                                            
                                            <div id="bar4" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="25"></span>
                                            </div>
                                        </div>
                                    </div>
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

<!-- Mirrored from demo.dashboardpack.com/marketing-html/index_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 May 2025 16:48:28 GMT -->
</html>
