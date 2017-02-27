<?php
// Uso sin mysql_list_dbs()
$enlace = mysql_connect('localhost', 'root', '');
$resultado = mysql_query("SHOW DATABASES");

while ($fila = mysql_fetch_assoc($res)) {
    echo $fila['Database'] . "\n";
}

// Obsoleto a partir de PHP 5.4.0
$enlace = mysql_connect('localhost', 'root', '');
$lista_bd = mysql_list_dbs($enlace);

while ($fila = mysql_fetch_object($lista_bd)) {
     echo $fila->Database . "\n";
}



if (!$enlace) {
    die('<br>No pudo conectarse: <br>' . mysql_error());
}

$sql = 'CREATE DATABASE gerenci1_mi_bd';
if (mysql_query($sql, $enlace)) {
    echo "<br>La base de datos mi_bd se creó correctamente\n";
} else {
    echo '<br>Error al crear la base de datos: ' . mysql_error() . "\n";
}


?>
