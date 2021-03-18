<?php 

    header('Content-Type: text/html;charset=utf-8');
	require_once 'bd/connection.php';
    require_once 'bd/querys.php';
	
	
if (isset($_GET['User']) && isset($_GET['Password']) )
{

$User=$_GET['User'];
$Pass=$_GET['Password'];
session_start();
$_SESSION['Usuario']=$User;
$_SESSION['Contras'] =$Pass;


 $query2=new  querys(); 
 $res3=$query2->wLogin($User,$Pass);

while ($Row=sqlsrv_fetch_array($res3))
{

if ($Row['Nombre']==$User &&  $Row['Pass']==$Pass)
  {
  	
	/*header ("Location: Inice.Php?User=$User&Clave=$Pass");*/
	header ("Location: Index1.Php");
    //exit(); 
	}
	else
	{
	
		$Mensaje= "Usuario o Contraseña Incorrecta...!!**";
		//header ("Location: Index.Php?mensaje=$Mensaje");

	}
}

}

	
?>	

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD Prueba </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">




<Script>
  var Usua = null;
  var ps =null;
  
  function sub(){
  product = document.getElementsByName("User")[0].value;
  shelf = document.getElementsByName("Password")[0].value;
};
</Script> 

<?php

/*
if (isset($_GET['User']) && isset($_GET['Password']) )
{

$User=$_GET['User'];
$Pass=$_GET['Password'];
session_start();
$_SESSION['Usuario']=$User;
$_SESSION['Contras'] =$Pass;


 $query2=new  querys(); 
 $res3=$query2->wLogin($User,$Pass);

while ($Row=sqlsrv_fetch_array($res3))
{

if ($Row['Usuario']==$User &&  $Row['Password']==$Pass)
  {
  	
	/*header ("Location: Inice.Php?User=$User&Clave=$Pass");*/
	//header ("Location: Index1.Php");
    //exit(); 
	//}
	//else
	//{
	
		//$Mensaje= "Usuario o Contraseña Incorrecta...!!";
		//header ("Location: Index.Php?mensaje=$Mensaje");

	//}
//}

//}

?>  

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="GEt">
			<center><IMG SRC="imagenes/agxport.png" WIDTH=178 HEIGHT=180 ALT="Logo"></center>
 
              <h1>Acceso</h1>
              <div>
               Usuario <input   name='User' type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
               Contraseña<input   name='Password' type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div class="row">
			  <div class="col-md-6 col-md-offset-3"> <input aligment type="submit" value="Ingresar"    class= "btn btn-default submit">
	                                                
			<a href="nuevo"><input type="button" value="Registrar" class= "btn btn-default submit"></a>
              </div> 
		
	
			    </form>
			 
          </section>
		   <div>
				 <?php if (isset($_GET['User']))
				          { $error="Usuario o Contraseña Incorrecta...!!";;}
		                   Else{ $error=""; }?>
             <Center><P style="color:#ff0000;font-size:135%;"><?Php  echo $error; ?></P></Center>
   

		  	</div>
        </div>
		
      </div>
    </div>
  </body>
</html>
