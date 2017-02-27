<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
	include_once "../funciones.php";
	include_once "../class_buscar.php";
	if($_SESSION['tipo_user']=='a'){
	}else{
		header('Location: ../../php_cerrar.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Gerenciar Proyectos ...::... Chalxsoft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Chalxsoft">

    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../../ico/favicon.png">
  </head>
  <body>

    <?php include_once "../../menu/m_crear.php"; ?>

	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Crear Ente Ejecutor</h2>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_enteejecutor=$_POST['cod_enteejecutor'];
			$enteejecutor=$_POST['enteejecutor'];


		$consultaInsertarCod_enteejecutor=mysql_query("SELECT * FROM enteejecutor WHERE cod_enteejecutor='$cod_enteejecutor' ");
		if($row=mysql_fetch_array($consultaInsertarCod_enteejecutor)){
			echo mensajes('Este enteejecutor ya existe','rojo');
		}else{
			echo mensajes('Este enteejecutor fue agragado exitosamente','verde');
			mysql_query("INSERT INTO enteejecutor (cod_enteejecutor, enteejecutor) VALUES ('$cod_enteejecutor', '$enteejecutor')");

		}
		?>




			<h3 align='center'>Ente Ejecutor</h3>

		<table border="1">
		  <tr>
		    <td>
			<strong>Codigo Ente Ejecutor</strong>
		    </td>
		    <td>
			<strong>Ente Ejecutor</strong>
		    </td>
		  </tr>

			<?php
				$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor ORDER BY cod_enteejecutor DESC");
				while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){
					echo '<tr>';
					echo '<td>'.$filaenteejecutor['cod_enteejecutor'].'</td>';
					echo '<td>'.$filaenteejecutor['enteejecutor'].'</td>';
 					echo '<tr>';
				}
			?>


		</table>


    </div>
    <!-- Le javascript ../../js/jquery.js
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-transition.js"></script>
    <script src="../../js/bootstrap-alert.js"></script>
    <script src="../../js/bootstrap-modal.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
    <script src="../../js/bootstrap-scrollspy.js"></script>
    <script src="../../js/bootstrap-tab.js"></script>
    <script src="../../js/bootstrap-tooltip.js"></script>
    <script src="../../js/bootstrap-popover.js"></script>
    <script src="../../js/bootstrap-button.js"></script>
    <script src="../../js/bootstrap-collapse.js"></script>
    <script src="../../js/bootstrap-carousel.js"></script>
    <script src="../../js/bootstrap-typeahead.js"></script>

  </body>
</html>