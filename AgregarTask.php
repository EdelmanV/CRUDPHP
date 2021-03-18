   <?php
  	
    session_start(); 

  	
	if (empty($_SESSION['Usuario']))
	{
			header ("Location: Logout.Php"); 
          
	}   
 
/*if (isset($_GET['User']) && isset($_GET['Clave']))*/
if (isset($_SESSION['Usuario']))
{
	
	//ini_set("session.cookie_lifetime","60");  


	$s=$_SESSION['Usuario'];/*$_GET['User'];*/

	

	$_SESSION['Usuario']=$s;
	$_SESSION['Clave']=$_SESSION['Contras'];
	$_SESSION["autentificado"]="SI";
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 120);
	

}
else
{
	   
		header ("Location: Logout.Php"); 
        exit(); 
}



?>
<html>


	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		    <title>CRUD Nuevo Registro </title>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">Nueva Tarea</h3>
			</div>
			
			<form class="form-horizontal" action="guardarTask.php"  method="get"  autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de Tarea" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="des" class="col-sm-2 control-label">Comentario</label>
					<div class="col-sm-10">
						<input type="msg" class="form-control" id="des" name="des" placeholder="Comentario" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="user" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10">
						<input maxlength="10" type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['Usuario']; ?>">
					</div>
				</div>
				
				<div class="form-group">
				
				</div>
				
			<P>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index1.php" class="btn btn-default">Regresar</a><a></a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>