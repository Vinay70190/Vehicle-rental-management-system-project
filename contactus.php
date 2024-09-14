<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$csmsaid=$_SESSION['vrmsaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
$phonenum=$_POST['phonenum'];

 $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes',Email='$email',MobileNumber='$phonenum' where  PageType='contactus'");

    if ($query) {
    $msg="Contact Us has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | Contact Us</title>
   

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
       <?php include_once('includes/sidebar.php');?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
       <?php include_once('includes/header.php');?>
            <!--// top-bar -->

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center"> Contact Us</h2>
            <!--// main-heading -->

            <!-- Forms content -->
            <section class="forms-section">

               
                <!-- Forms-3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Contact Us</h4>

                    <form action="#" method="post">
                       <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>       
                        <?php

$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Page Title</label>
                                
                                <input type="text" name="pagetitle" class=" form-control" required= "true" value="<?php  echo $row['PageTitle'];?>">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Page Description</label>
                                
                                <textarea class=" form-control" id="pagedes" name="pagedes" type="text" required="true" value=""><?php  echo $row['PageDescription'];?></textarea>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                
                                <input type="text" name="email" class=" form-control" required= "true" value="<?php  echo $row['Email'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Contact No</label>
                                
                                <input type="text" name="phonenum" class=" form-control" required= "true" value="<?php  echo $row['MobileNumber'];?>">
                            </div>
                           
                        </div>
                        
                        <?php } ?>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </form>
                </div>
              
            </section>

            <!--// Forms content -->

           <?php include_once('includes/footer.php');?>

        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
</body>
</html>
<?php }  ?>