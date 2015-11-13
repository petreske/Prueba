<?php
//BANDERA DE REGISTROS EN
//BITÁCORA DE EVENTOS
$reglog = false;

//CADENA DE MENSAJES DE ERROR
$errmsg = "";

//VARIABLES DE CONEXIÓN
$conn = false;
$hostname = "127.0.0.1\SQLX";
$database = "prueba";
$username = "sa";
$password = "d#v4l0p3r";

try{
	//Para MySQL:
	//$conn = new PDO("mysql:host=$hostname; dbname=$database", $username, $password, array(PDO::ATTR_PERSISTENT => true));
	$conn->exec("SET NAMES utf8"); //COMANDO IMPORTANTE PARA QUE RESPETE LA CODIFICACION DE CARACTERES

	//Para PostgreSQL:
	//$conn = new PDO("pgsql:host=$hostname; dbname=$database", $username, $password, array(PDO::ATTR_PERSISTENT => true));
	
	//Para Oracle:
	//$conn = new PDO("oci:dbname=$database", $username, $password, array(PDO::ATTR_PERSISTENT => true));
	
	//CONFIGURA VALORES DE DEFAULT PARA LA CONEXIÓN PDO
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	//OBTIENE CONFIGURACIÓN GENERAL PARA REGISTRO EN BITÁCORAS
	$query = $conn->prepare("SELECT reglog FROM app_c_optmodule WHERE id=0 AND reglog=1");
	$query->execute();

	while($row = $query->fetch()) {
		$reglog = true;
	}
	
	
}catch (PDOException $e){
	$errmsg = $e->getMessage();
}
?>
