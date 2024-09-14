<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | B/w dates Report</title>
    
   
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

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Two Wheeler B/w Dates Report</h2>
            <!--// main-heading -->

           
            <section class="tables-section">
   

              
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Two Wheeler B/w Dates Report</h4>
                   
      
 
                    <div class="container-fluid">
                        <div class="row">
                          <form class="form-horizontal" method="post" name="bwdatesreport"  action="bwdates-twowheeler-reports-details.php" enctype="multipart/form-data">
                       
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Between Dates Reports</h4>
                                   
                                       <div class="form-group row" style="padding-top: 20px">
                                                        <label class="col-8 col-form-label" for="example-email">From Date: </label>
                                                        <div class="col-12">
                                                            <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email">To Date: </label>
                                                        <div class="col-12">
                                                            <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>
                                                        </div>
                                                    </div>
                     <div class="col-10">
<button class="btn-primary btn" type="submit" name="submit">Submit</button>
                                                        </div>
                                                    </div> 
                                                </div>
                                    
       </form>
                           
                        </div>
                    </div>
                </div>
               

        

            </section>

           

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