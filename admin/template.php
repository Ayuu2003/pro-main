<?php 
    include("class/adminback.php");
    $obj= new adminback();

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $admin_email = $_SESSION['admin_email'];
    if($admin_id==null){
        header("location:index.php");
    }

    if(isset($_GET['adminLogout'])){
        if($_GET['adminLogout']=="logout"){
            $obj->admin_logout();
        }
    }
?>

<?php 
    include ("includes/head.php")
?>

  <body style="background-image: url('https://img.freepik.com/free-photo/abstract-marble-texture-black-white-grey-background-handmade-technique_1258-99671.jpg');">
  <body style="background-image: url('https://img.freepik.com/free-photo/abstract-marble-texture-black-white-grey-background-handmade-technique_1258-99671.jpg');">
	  <div class="fixed-button">
		
	  </div>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

         <?php include_once ("includes/headernav.php") ?>


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   
                <?php include_once ("includes/sidenav.php") ?>


                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                     
        
                                <?php 
                                    if($views){
                                        if($views=="dashboard"){
                                            include ('views/dashborad_view.php');
                                        }elseif($views=="add-cata"){
                                            include ("views/add_cata_view.php");
                                        }elseif($views=="manage-cata"){
                                            include ("views/manage_cata_view.php");
                                        }elseif($views=="add-product"){
                                            include ("views/add_product_view.php");
                                        }elseif($views=="manage-product"){
                                            include ("views/manage_product_view.php");
                                        }elseif($views=="add-user"){
                                            include ("views/add_user_view.php");
                                        }elseif($views=="manage-user"){
                                            include ("views/manage_user_view.php");
                                        }elseif($views=="edit_cata"){
                                            include ("views/edit_cata_view.php");
                                        }elseif($views=="edit_product"){
                                            include ("views/edit_product_view.php");
                                        }elseif($views=="manage_order"){
                                            include ("views/manage_order_view.php");
                                        }elseif($views=="add_link"){
                                            include ("views/add_links_view.php");
                                        }elseif($views=="edit_logo"){
                                            include ("views/edit_logo_view.php");
                                        }elseif($views=="add_logo"){
                                            include ("views/add_logo_view.php");
                                        }elseif($views=="edit_links"){
                                            include ("views/edit_links_view.php");
                                        }elseif($views=="manage_slider"){
                                            include ("views/manage_slider_view.php");
                                        }elseif($views=="edit_slider"){
                                            include ("views/edit_slider_view.php");
                                        }elseif($views=="add_order"){
                                            include ("views/add_order_view.php");
                                        }elseif($views=="add_coupon"){
                                            include ("views/add_coupon_view.php");
                                        }elseif($views=="manage_coupon"){
                                            include ("views/manage_coupon_view.php");
                                        }elseif($views=="customer_feedback"){
                                            include ("views/customer_feedback_view.php");
                                        }elseif($views=="edit_comment"){
                                            include ("views/edit_comment_view.php");
                                        }elseif($views=="add-admin-user"){
                                            include ("views/add_admin_user_view.php");
                                        }elseif($views=="edit_admin"){
                                            include ("views/edit_admin_view.php");
                                        }elseif($views=="make_report"){
                                            include ("views/make_report_view.php");
                                        }

                                    }
                                ?>


                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<?php 
    include ("includes/script.php")
?>