 <?php
header("Content-Type: text/html; charset=utf-8");
require_once 'bd/connection.php';
require_once 'bd/querys.php';
	
//Agregar Sesiones 
$consult = new querys();
	
$var = $_POST["fechaI"];
//$date1 = str_replace('/', '-', $var);
$fechaI = $var;//date("Y-m-d", strtotime($date1) ) ;

$var = $_POST["fechaF"];
//$date2 = str_replace('/', '-', $var); 
$fechaF = $var;//date("Y-m-d", strtotime($date2) );
$Cuarto = $_POST["Cuarto"];
$Pallet = $_POST["Pallet"];




?>
    <?php
  	
    session_start(); 

  	
	if (empty($_SESSION['Usuario']))
	{
			header ("Location: Logout.Php"); 
          
	}   
 

if (isset($_SESSION['Usuario']))
{
	
	//ini_set("session.cookie_lifetime","60");  


	$s=$_SESSION['Usuario'];

	

	$_SESSION['Usuario']=$s;
	$_SESSION['Clave']=$_SESSION['Contras'];
	$_SESSION["autentificado"]="SI";
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 600);
	

}
else
{
		header ("Location: Logout.Php"); 
        exit(); 
}


$res = $consult->getTareas($_SESSION['Usuario']);
?>

<table id="table" class="table table-striped table-bordered table-hover">
						
						<thead class="thead-dark">
								<tr>
								    <th style="text-align: center;"><b>IDtarea</b></th>
								    <th style="text-align:  center;" class="sorting desc"><b>Fecha Hora</b></th>
								    <th style="text-align: center;"><b>Nombre</b></th>
									<th style="text-align: center;"><b>Descripción</b></th>
									<th style="text-align: center;"><b>Estado</b></th>
							
									   
								
								</tr>  
						</thead>
						
						<tbody>
						
					<? 
						
						while ($filas = sqlsrv_fetch_array($res)) {
						?>
						<tr>
						    <td style="text-align: center;"><? echo $filas[0] ?></td>
                            <td style="text-align: center;"><? echo $filas[1]; ?></td>						
							<td style="text-align: center;"><? echo $filas[2]; ?></td>
							<td style="text-align: center;"><? echo $filas[3] ?></td>
						
						
							
						
						</tr>	
							
					<? 
					} 
				?>
						
						
							
						</tbody>
						
						
</table>
				
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