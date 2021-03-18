<?php
header("Content-Type: text/html; charset=utf-8");
require_once 'bd/connection.php';
require_once 'bd/querys.php';
	
	//Agregar Sesiones 
	$consult = new querys();
	$boleta = "";
	if (isset($_GET["part"])) {
		$boleta = $_GET["part"];
	}

?>

<!DOCTYPE html>
<html lang="en">
  <script>alert('Bienvenido, Click en Aceptar, Para Continuar...');</script>
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Tareas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="ui/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="ui/css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    

  </head>
  
	<style type="text/css">
  table {
	 
  
}
thead, tfoot{
    background: Black;
}
thead th{
    color: white;
    font-weight: normal;
	
    overflow-y: auto;
    overflow-x: auto;
}
body{
	  background-image: "images/preenfriado.jpeg";
	 }

 thead>tr>td.sorting,
 thead>tr>td.sorting_asc,
 thead>tr>td.sorting_desc,
 thead>tr>th.sorting,
 thead>tr>th.sorting_asc,
 thead>tr>th.sorting_desc {
  padding-right: 30px
}

 thead .sorting,
 thead .sorting_asc,
 thead .sorting_asc_disabled,
 thead .sorting_desc,
 thead .sorting_desc_disabled {
  cursor: pointer;
  position: relative
}

 thead .sorting:after,
 thead .sorting:before,
 thead .sorting_asc:after,
 thead .sorting_asc:before,
 thead .sorting_asc_disabled:after,
 thead .sorting_asc_disabled:before,
 thead .sorting_desc:after,
 thead .sorting_desc:before,
 thead .sorting_desc_disabled:after,
 thead .sorting_desc_disabled:before {
  position: absolute;
  bottom: .9em;
  display: block;
  opacity: .3
}

 thead .sorting:before,
 thead .sorting_asc:before,
 thead .sorting_asc_disabled:before,
 thead .sorting_desc:before,
 thead .sorting_desc_disabled:before {
  right: 1em;
  content: "\f0de";
  font-family: FontAwesome;
  font-size: 1rem
}

 thead .sorting:after,
 thead .sorting_asc:after,
 thead .sorting_asc_disabled:after,
 thead .sorting_desc:after,
 thead .sorting_desc_disabled:after {
  content: "\f0dd";
  font-family: FontAwesome;
  right: 16px;
  font-size: 1rem
}

 thead .sorting_asc:before,
 thead .sorting_desc:after {
  opacity: 1
}

thead .sorting_asc_disabled:before,
 thead .sorting_desc_disabled:after {
  opacity: 0
}
</style>


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

  <body role="document">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		 
          <a class="navbar-brand" href="#"> 
			Tareas Usuarios
		   </a>
	<div class="container">
  
    <ul class="nav navbar-nav">
      <li ></a></li>
      
	  
	  
    <ul>  
      </ul>
      </li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
    <ul  class="nav navbar-nav navbar-right">
	
	<li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Salir </a></li>
    <li> <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['Usuario'];?></a></li> 

    </ul>
  </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
	
          </ul>
        </div>
      </div>
    </nav>

  

	
	
  

    <div class="container" >


	<br><br><br><br><br><br><br><br>
	
					
				<form class="form-horizontal" action="AgregarTask.php"  method="get"  autocomplete="off">
			    
				<button type="submit" class="btn btn-primary">Nueva Tarea</button>
					
			</form>
						
				
<P>

				
				
<br>
      <div class="row">
        <div class="col-md-12">
		         

		<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Listado de Tareas y Estados</h3>
            </div>
            <div class="panel-body">
			
			<div class="row">
						
				<div class="col-md-6">
					<label>Desde:</label>
					<input  id="txtDesde" name="txtDesde" type="text" class="form-control"  onchange="cargarListado();" value=<?php echo date('d/m/Y', strtotime('-3 day')); ?> >
				</div>
							
				<div class="col-md-6" >
					<label>Hasta:</label>
					<input id="txtHasta" name="txtHasta" type="text" class="form-control"  onchange="cargarListado();" value=<?php echo date('d/m/Y'); ?> >
				</div>
							
			</div>
			
			<div class="row">
						
				<div class="col-md-6">
					<label>Nombre:</label>
					<input id="Usuario" placeholder="Todos" name="Usuario" type="text" class="form-control"  onkeyUp="cargarListado();"  >
				</div> 
			
							
			</div>
			
			<div class="row">
						
				<div class="col-md-6">
					<label>Estado:</label>
					<select class="form-control" id="cmbtarea" name="cmbtarea" onchange="cargarListado();">
						<option value=0>Todos</option>
						<?php
						$res = $consult->verEstados();
						while ($row = sqlsrv_fetch_array($res)){

							echo "<option value=".$row[0].">".$row[1]."</option>";
						}
						?>
					
					</select>
				</div>
						
			
							
			</div>
			
			<br>
				<div id="tabla-respuesta" class="table-responsive">

			  </div>
			</div>
              
				  

			  
            </div>
          </div>
		
  
        </div>
		
      </div>
	  
	
	  
	  <div class="row">
		
		<div class="col-md-12">
			<hr>
			<Center><p style="font-size:10px;">Edelman Vásquez</Center></p>
		</div>
		
	  </div>
 


    </div> <!-- /container -->


	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- -->
    

	
	<script src="ui/js/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="ui/bootstrap/js/bootstrap.min.js"></script>
	<script src="ui/js/jquery-ui-1.10.4.custom.js"></script>
	
	<script>
		$(function() 
		{
			$( "#txtDesde" ).datepicker({ inline: true, dateFormat: 'dd/mm/yy'});
			$( "#txtHasta" ).datepicker({ inline: true, dateFormat: 'dd/mm/yy'});
			cargarListado();
		});
		
function cargarListado(){
			$.ajax(
{
  url : 'taskstatus.php',
  type: "POST",
  data : {
	  fechaI: document.getElementById("txtDesde").value,
	  fechaF: document.getElementById("txtHasta").value,
	  Pallet: document.getElementById("Usuario").value,
	  Cuarto: document.getElementById("cmbtarea").value
	  }
})
  .done(function(data) {
    $("#tabla-respuesta").html(data);
  })
  .fail(function(data) {
    //alert( "error" );
  })
  .always(function(data) {
    //alert( "complete" );
  });
		}
    </script>
    
  </body>
  
</html>

<?php
	if (isset($queryManager))
	{
		$queryManager->cerrarConexion();
	}
    
?>
