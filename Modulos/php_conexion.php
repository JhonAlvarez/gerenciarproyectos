<?php

$conexion = mysql_connect("localhost","root","") OR DIE("<font color=red>Chalxsoft:</font> No se ha conectado con el Servidor de la BD");



//mysql_select_db — Selecciona una base de datos MySQL

//Advertencia: Esta extensión está obsoleta a partir de PHP 5.5.0, y será eliminada en el futuro.

//En su lugar, deberían usarse las extensiones MySQLi o PDO_MySQL.

mysql_select_db("systemch_base_proyectos",$conexion) OR DIE("<font color=red>Chalxsoft:</font> No se ha conectado con la Base de Datos");



//date_default_timezone_set — Establece la zona horaria predeterminada usada por todas las funciones de fecha/hora en un script 

date_default_timezone_set("America/Bogota");



//mysql_set_charset — Establece el conjunto de caracteres del cliente

mysql_query("SET NAMES utf8");

mysql_query("SET CHARACTER_SET utf");



$s='$';



//strip_tags($cadena); elimina etiquetas HTML y PHP de un texto que el usuario pueda meter 

// y las convierte en cadenas simples, sin esas etiquetas, sino sólo como texto normal.

function limpiar($tags){

	$tags = strip_tags($tags);

	return $tags;

}

?>