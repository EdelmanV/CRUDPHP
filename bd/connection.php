<?php
	

	/*Función que retorna una conexion a la base de datos*/
	function dbConnect()
	{
		$conn = null;
		$serverName = "190.200.100.235\UNISPICESRV2";
		$uid = "Remoto";
		$pwd = "RemotoUni56";
		$db = "Prod2k";

		
		
		$connectionInfo = array( "UID"=>$uid,
                         "PWD"=>$pwd,
                         "Database"=>$db,"CharacterSet" => "UTF-8");
						 	
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
		return $conn;

	}
	
?>