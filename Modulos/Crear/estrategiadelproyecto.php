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
                    	<h2 align="center">Crear Estrategia del Proyecto</h2>
                    </td>
                  </tr>
                </table>
                <div align="center">

		    <form method="POST" action="estrategiadelproyecto2.php">
			<?php
				$consultaCod_estrategiadelproyecto=mysql_query("SELECT MAX(cod_estrategiadelproyecto) AS ultimoEstrategiadelproyecto FROM estrategiadelproyecto");
					while($filaestrategiadelproyecto=mysql_fetch_array($consultaCod_estrategiadelproyecto)){
						$nuevoCod_estrategiadelproyecto=$filaestrategiadelproyecto['ultimoEstrategiadelproyecto']+1;
						echo '<input type="text" name="cod_estrategiadelproyecto" readonly value="'.$nuevoCod_estrategiadelproyecto.'">';
					}
			?>
			<input type="text" name="estrategiadelproyecto">
			<input type="submit" value="Crear >>">
		    </form>

			<table>
			<td><strong> </strong></td>

			<?php
				$consultaestrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto ORDER BY estrategiadelproyecto asc");
					while($filaestrategiadelproyecto=mysql_fetch_array($consultaestrategiadelproyecto)){
					echo "<tr>";
						
						echo '<td>'.$filaestrategiadelproyecto['estrategiadelproyecto'].'</td>';
					echo "</tr>";

					}
			echo "</table>";

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