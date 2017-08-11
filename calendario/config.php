<?php


// Datos de conexion a la base de datos
$servidor='mysql.acm-sim.org';
$usuario='acm_sim_admin';
$pass='FkT2Fxas';
$bd='sistema_bth';

// Nos conectamos a la base de datos
$conexion = new mysqli($servidor, $usuario, $pass, $bd);	

// Definimos que nuestros datos vengan en utf8
$conexion->set_charset('utf8');

// verificamos si hubo algun error y lo mostramos
if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}
// Url donde estara el proyecto, debe terminar con un "/" al final
$base_url="http://sistema.acm-sim.org/calendario/";

?>
