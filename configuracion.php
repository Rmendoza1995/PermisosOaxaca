<?php

$server="localhost:3306";
$user="root";
$pass="";
$bd="bd";



	class Conexion extends mysqli {
		public function __construct() {
			parent::__construct($server,$user,$pass,$bd);
			$this->query("SET NAMES 'utf8';");
			$this->connect_errno ? die('Error con la Conexion '.mysqli_connect_error()) : $x = 'Conectado';
			unset($x);
		}
	}

	$link = mysqli_connect($server,$user,$pass,$bd);


	
?>