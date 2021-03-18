<?php
header("Content-Type: text/html; charset=utf-8");
require_once '../bd/connection.php';
    require_once '../bd/querys.php';
	
	//Agregar Sesiones 
	$consult = new querys();
	

?>
 <?php 

session_start();


	   $now = time();
       if ($now > $_SESSION['expire']) 
	     {
          header("Location:  Logout.php");
         }
	

if (isset($_SESSION['Usuario']) && isset($_SESSION['Clave']))
{
	$_SESSION["autentificado"]="SI";
    $_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 600);

	}
	else
	{
		header ("Location: Logout.Php"); 
      
	}
?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Tareas Usuarios</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.tablesorter.js"></script> 
  </head>

  <body role="document">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		 
          <a class="navbar-brand" href="index.php"> 
			Tareas
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


	<br><br><br><br>


      <div class="row">
        <div class="col-md-12">
		         

		<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Detalle Tareas </h3>
            </div>
            <div class="panel-body">
			
				<div class ="col-md-12" style="padding-bottom: 15px;"><strong>Detalle de  Tarea: </strong></div>
				<? 
				//$idB = $_GET["ID"];
				//$Correlativo = $_GET["user"];
			
				$res = $consult->getTareas($_SESSION['Usuario']);
				while ($filas0 = sqlsrv_fetch_array($res)) { ?>
				<div class ="col-md-6">
					<strong>Fecha: </strong><? echo $filas0["IdTask"]; ?><br />
					<strong>Correlativo: </strong><? echo $filas0["Nombre"]; ?><br />
					<strong>Caja: </strong><? echo $filas0["Descripcion"]; ?><br />
					<strong>Producto: </strong><? echo $filas0["Estado"]; ?><br />
				

				</div>
			
				<? } ?>
			<div class="col-md-12">
			<br>          <div class="container">
						  <div class="panel panel-default">
                           <div class="panel-body">
                           <table id="table" class="table">
						
						<thead>
								<tr>
									<th style="text-align: Left;"><b>ID</b></th>
									<th style="text-align: center;"><b>Nombre</b></th>
									<th style="text-align: center;"><b>Descripción</b></th>
									<th style="text-align: center;"><b>Estado</b></th>
								</tr>  
						</thead>
						
						<tbody>
						<? $res = $consult->getTareas($_SESSION['Usuario']);
						
						while ($filas = sqlsrv_fetch_array($res)) {
						?>
						<tr>
							<td style="text-align: Left;"><? echo $filas["IdTask"] ?></td>
							<td style="text-align: Center;"><? echo $filas["Nombre"] ?></td>
							<td style="text-align: center;" ><p class="text-danger"><? echo $filas["descripcion"] ; ?></p></td>
							<?}?>
							<? if ($filas["Estado"] > 0) { ?>
							<td style="text-align: center;"><a href="detalle2.php?ID=<? echo $filas["idTask"]; ?>"><img src="img/view.png"></a></td>
							<? } else { ?>
							<td style="text-align: center;">N/A</td>
							<?	} ?>
						</tr>	
							
					<? } ?>
						
						
							
						</tbody>
						
						
				</table>
				
			  </div>
			</div>
              
				
				
				
			  
			  
			  

			  
            </div>
          </div>
		
  
        </div>
		
      </div>
	  
	
	  
	  <div class="row">
		
		<div class="col-md-12">
			<hr>
			<p style="font-size:10px;">Sistemas - Unispice</p>
		</div>
		
	  </div>
 
  <script>
	 $('th').click(function() {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
      rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i])
    }
    setIcon($(this), this.asc);
  })

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index),
        valB = getCellValue(b, index)
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
  }

  function setIcon(element, asc) {
    $("th").each(function(index) {
      $(this).removeClass("sorting");
      $(this).removeClass("asc");
      $(this).removeClass("desc");
    });
    element.addClass("sorting");
    if (asc) element.addClass("asc");
    else element.addClass("desc");
  }
	
	
	
	</script>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js">
	
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
