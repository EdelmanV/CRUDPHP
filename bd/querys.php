<?php 
	require_once'dbManager.php';

class querys {
	
	private $dbm;

	function __construct()
	{
		$this->dbm = new dbManager();
	
	}

	function cerrarConexion()
	{
		$this->dbm->desconectar();
	}
	
	function CalidarExistencia($User,$Pass,$Mail){
	$query="Select count(*) as  valor from tuser where  Nombre='$User' or Correo='$Mail' ";
	$Result=$this->dbm ->realizarConsulta($query);
	return $Result;
	}
	function  IdUser ($Usuario){
	$query="select Top 1 idUser from tUser where Nombre='$Usuario'";
	$Result=$this->dbm ->realizarConsulta($query);
	return $Result;
	}
	function NuevoRegistro($User,$Pass,$Mail){
			
		$query = "Insert Into tUser (Nombre,Correo,Pass) Values ('$User','$Mail','$Pass')";
        $Result = $this->dbm->realizarConsulta ($query);
		//echo $query;
		//echo $Result;
		return $Result;
	}
	function NuevaTarea($nombre,$desc,$idUser){
			
		$query = "Insert Into ttASKS  (Nombre,descripcion,IdUser) Values ('$nombre','$desc','$idUser')";
        $Result = $this->dbm->realizarConsulta ($query);
		//echo $query;
		//echo $Result;
		return $Result;
	}
	function wLogin($usuario,$pass)
	{
		
		$query = "SELECT   Nombre,Pass FROM   tuser Where Nombre='$usuario' and Pass='$pass'";
		$resultado = $this->dbm->realizarConsulta($query);
		return $resultado;
	}
	
	function verEstados() {
		$query = " select * from testado";
		$Result = $this->dbm->realizarConsulta ($query);
	 
		return $Result;
		
	
	}




	
	
	
	  
 } 

?>