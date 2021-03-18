
<?php 
    require_once 'bd/connection.php';
    require_once 'bd/querys.php';

?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inspección PT </title>
	 <!-- calendario-->



    <link href="../ControlCalidaPT/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../ControlCalidaPT/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../ControlCalidaPT/build/css/custom.min.css" rel="stylesheet">



  </head>


  <body class="nav-md">
  

<?php

	     

      	session_start(); 
		session_unset();
        session_destroy(); 
		header ("Location: Index.Php"); 
        exit(); 




?>
  

  

      

    <!-- jQuery -->

    <!-- Bootstrap -->
      <!-- jQuery -->
    <script src="../ControlCalidaPT/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../ControlCalidaPT/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../ControlCalidaPT/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../ControlCalidaPT/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../ControlCalidaPT/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../ControlCalidaPT/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../ControlCalidaPT/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../ControlCalidaPT/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../ControlCalidaPT/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../ControlCalidaPT/vendors/Flot/jquery.flot.js"></script>
    <script src="../ControlCalidaPT/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../ControlCalidaPT/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../ControlCalidaPT/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../ControlCalidaPT/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../ControlCalidaPT/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../ControlCalidaPT/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../ControlCalidaPT/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../ControlCalidaPT/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../ControlCalidaPT/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../ControlCalidaPT/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../ControlCalidaPT/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../ControlCalidaPT/vendors/moment/min/moment.min.js"></script>
    <script src="../ControlCalidaPT/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../ControlCalidaPT/build/js/custom.min.js"></script>



  


  </body>
</html>
   

