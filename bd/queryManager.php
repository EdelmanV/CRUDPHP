<?php

	require_once'dbManager.php';

	

class queryManager{

	private $dbm;

	function __construct()
	{
		$this->dbm = new dbManager();
	
	}

	function cerrarConexion()
	{
		$this->dbm->desconectar();
	}
	
	function contarRegistros($sqlArray){
		$i = 0;
		while ($row = sqlsrv_fetch_array($sqlArray)){
			$i++;
		}
		Return $i;
	}
	
	function verificaUsuario ($usuario, $password){
		
		return "Hola hola";
		
		
	}
	
		function wLogin($usuario,$pass)
	{
		
		$query = " SELECT   Nombre, Password FROM   tWPermisos  Where Nombre='$usuario' and Password='$pass'";
		$resultado = $this->dbm->realizarConsulta($query);
		return $resultado;
	}
	
}
?>