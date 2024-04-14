<?php 
$obj= new adminback();
    $links = $obj->display_links();
   

?>
<html><head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add other head elements here -->
    <style>


        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <?php 
                        while( $link = mysqli_fetch_assoc($links)){?>

                                  
                        <li>
                            <a class="fa fa-envelope" href="" > &nbsp;
                           <?php  echo $link['email'];  ?>
                             

                          </a></li>

                   
                        </i>
                        <li><a href="#">Free Shipping</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#<?php  echo $link['tweeter'];  ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#<?php  echo $link['fb_link'];  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#<?php  echo $link['pinterest'];  ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                               <?php } ?>

                    </ul>
                    <ul class="horizontal-menu">
    <li class="dropdown">
        <a href="user_login.php" class="login-link">
            <i class="biolife-icon icon-login"></i>
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
            } else {
                echo "Login";
            }
            ?>
        </a>
        <div class="dropdown-content">
        <a href="includes/logout.php"><b>Logout</b></a>
        </div>
    </li>
</ul>
                </div>
            </div>
        </div>

        <script>
$(document).ready(function() {
    // Check if the user is logged in
    if ('<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'false'; ?>' === 'false') {
        // If not logged in, show the login link and hide the dropdown-content div
        $('.login-link').html('Login');
        $('.dropdown-content').hide();
    } else {

        // Toggle the dropdown-content div when the user clicks on the username
        $('.login-link').click(function(e) {
            e.stopPropagation();
            $('.dropdown-content').toggle();
        });

        // Hide the dropdown-content div when the user clicks outside of it
        $(document).click(function() {
            $('.dropdown-content').hide();
        });
    }
});
</script>
</html>
