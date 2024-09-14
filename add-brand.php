<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $aid=$_SESSION['vrmsaid'];
    $bname=$_POST['brandname'];
  
   $logo=$_FILES["images"]["name"];
     $extension = substr($logo,strlen($logo)-4,strlen($logo));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$brandlogo=md5($logo).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$brandlogo);
    $query=mysqli_query($con, "insert into tblbrand(BrandName,BrandLogo) value('$bname','$brandlogo')");
    if ($query) {
echo "<script>alert('Brand details has been submitted.');</script>";
echo "<script>window.location.href ='add-brand.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }

}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wheels Hub| Vehicle Brands</title>
   

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
            <h2 class="main-title-w3layouts mb-2 text-center"> Vehicle Brands</h2>
            <!--// main-heading -->

            <!-- Forms content -->
            <section class="forms-section">

               
                <!-- Forms-3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"> Vehicle Brands</h4>

                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Brand Name</label>
                                
                                <input class=" form-control" id="brandname" name="brandname" type="text" value="" required="true">
                            </div>
                           
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Brand Logo</label>
                                
                                <input type="file" class="form-control" name="images" id="images" value="" required="true">
                            </div>
                           
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
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