<?php


	/*
		Clase encargada de manejar la conexión a la base de datos
	*/

	class dbManager
	{

	
	private $serverName = "190.200.100.235\UNISPICESRV2";
	private $uid = "Remoto";
	private $pwd = "RemotoUni56";
	private $db = "prod2k";
	private $myconn; 


	function __construct()
	{
		$this->obtenerConexion();
	}


	function obtenerConexion()
	{
		$connectionInfo = array( "UID"=>$this->uid,
                         "PWD"=>$this->pwd,
                         "Database"=>$this->db,"CharacterSet" => "UTF-8");

		$conn = sqlsrv_connect($this->serverName,$connectionInfo);

		if(!$conn)
		{
			echo "No se puede establecer la conexion";
		}
		else
		{
			$this->myconn = $conn;
		}
		return $this->myconn;
	}

	function desconectar()
	{
		if (isset($this->myconn))
		{
			sqlsrv_close($this->myconn);
		}
	}

	function realizarConsulta($consulta)
	{
		$resultado = sqlsrv_query($this->myconn,$consulta);
		return $resultado;
	}

	function ejecutarInstruccion($instruccion)
	{
		$rs = false;

		$sentencia = sqlsrv_prepare($this->myconn,$instruccion);

		if ($sentencia)
		{
			if (sqlsrv_execute($sentencia))
			{
				$rs = true;
			}
		}

		return $rs;

	}

	}


?>