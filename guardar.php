
<?php 

    header('Content-Type: text/html;charset=utf-8');
	require_once 'bd/connection.php';
    require_once 'bd/querys.php';
	
	
if (isset($_GET['User']) && isset($_GET['Pass']) && isset($_GET['Mail']) )
{





$User=$_GET['User'];
$Pass=$_GET['Pass'];
$Mail=$_GET['Mail'];

 $query1=new querys(); 
 $res1=$query1->CalidarExistencia($User,$Pass,$Mail);

while ($row = sqlsrv_fetch_array($res1))
{

$r=$row[0];
					

  if($r>0) {
 
     echo "<script>
                alert('El Usuario ya Existe...!!');
                window.location= 'Index.php'
    </script>";
              }
}

 $query=new querys(); 
 $res=$query->NuevoRegistro($User,$Pass,$Mail);

//echo "Usuario:".$res;

}
?>	
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($res) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>	
