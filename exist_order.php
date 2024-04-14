<?php
session_start();

include_once("admin/class/adminback.php");
$obj = new adminback();

include_once('tcpdf/tcpdf.php');

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

$userid = $_SESSION['user_id'];
$username = $_SESSION['username'];

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == "logout") {
        $obj->user_logout();
    }
}

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $order_query =  $obj->order_details_by_id($id);
}else{
    header("location:userprofile.php");
} 
include 'order.php';


?>

<?php
include_once("includes/head.php");
?>

<body class="biolife-body">
    <!-- Preloader -->

    <?php
    include_once("includes/preloader.php");
    ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">

        <?php
        include_once("includes/header_top.php");
        ?>

        <?php
        include_once("includes/header_middle.php");
        ?>

        <?php
        include_once("includes/header_bottom.php");
        ?>

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">
                    <div class="col-md-2">
                        <h4>Hello <?php
                                    if (isset($username)) {
                                        echo strtoupper($username);
                                    }
                                    ?></h4>
                        <a href="?logout=logout">Logout</a>
                    </div>
         <iframe src="order_summary.pdf" width="100%" height="500px"></iframe>
           

            </div>
            
    
        </div>
    

    </div>
    <br>
    <!-- FOOTER -->

    <?php
    include_once("includes/footer.php");
    ?>

    <!--Footer For Mobile-->
    <?php
    include_once("includes/mobile_footer.php");
    ?>

    <?php
    include_once("includes/mobile_global.php")
    ?>


    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php
    include_once("includes/script.php")
    ?>
</body>

</html>