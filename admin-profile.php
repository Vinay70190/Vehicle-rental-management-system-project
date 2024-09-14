<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['vrmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | Profile</title>
   

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
            <h2 class="main-title-w3layouts mb-2 text-center"> Admin Profile</h2>
            <!--// main-heading -->

            <!-- Forms content -->
            <section class="forms-section">

               
                <!-- Forms-3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"> Admin Profile</h4>

   <?php
$adminid=$_SESSION['vrmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <form action="#" method="post">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Admin Name</label>
                                
                                <input class=" form-control" id="adminname" name="adminname" type="text" value="<?php  echo $row['AdminName'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">User Name</label>
                                <input class=" form-control" id="username" name="username" type="text" value="<?php  echo $row['UserName'];?>" required="true" readonly='true'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Contact Number</label>
                            <input class="form-control " id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Email</label>
                            <input class="form-control " id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Reg Date</label>
                                <input class="form-control " id="regdate" name="regdate" type="text" value="<?php  echo $row['AdminRegdate'];?>" required="true" readonly='true'>
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