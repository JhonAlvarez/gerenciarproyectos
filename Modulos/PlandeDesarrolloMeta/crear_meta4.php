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
    <title>Gestion de Proyectos ...::... Chalxsoft</title>
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

    <?php include_once "../../menu/m_plandedesarrollometa.php"; ?>

	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Crear Meta</h2>
                    </td>
                  </tr>
                </table>
                <div align="right">
			<form method="POST" action="crear_meta5.php">
				<?php
				$cod_plan=$_POST['cod_plan'];
				$cod_eje=$_POST['cod_eje'];
				$cod_estrategia=$_POST['cod_estrategia'];
				echo "<table>";
				echo "<tr>";
				echo "<td>Codigo Plan de Desarrollo: </td>";
				echo "<td><input type='text' name='cod_plan' readonly value='".$cod_plan."'></td>";
				$consultaplan=mysql_query("SELECT * FROM plandedesarrollo WHERE cod_plan=".$cod_plan);
					while($fila=mysql_fetch_array($consultaplan)){
						echo '<td> Plan de Desarrollo: </td><td><input type="text" name="plan" readonly value="'.$fila['plan'].'"></td>';
					}
				echo "</tr>";
				echo "<tr>";
				echo "<td>Codigo Eje: </td>";
				echo "<td><input type='text' name='cod_eje' readonly value='".$cod_eje."'></td>";
				$consultaeje=mysql_query("SELECT * FROM plandedesarrolloeje WHERE cod_eje=$cod_eje and cod_plan=$cod_plan");
					while($filaeje=mysql_fetch_array($consultaeje)){
						echo '<td>Eje: </td><td><input type="text" name="eje" readonly value="'.$filaeje['eje'].'"></td>';
					}

				echo "</tr>";
				echo "<tr>";
				echo "<td>Codigo Politica: </td>";
				echo "<td><input type='text' name='cod_estrategia' readonly value='".$cod_estrategia."'></td>";
				$consultaestrategia=mysql_query("SELECT * FROM plandedesarrolloestrategia WHERE cod_eje=$cod_eje and cod_plan=$cod_plan and cod_estrategia=$cod_estrategia");
					while($filaestrategia=mysql_fetch_array($consultaestrategia)){
						echo '<td>Politica: </td><td><input type="text" name="estrategia" readonly value="'.$filaestrategia['estrategia'].'"></td>';
					}

				echo "<tr>";
				echo "<td>";
					?>
				<strong>Elija un Programa</strong>
				</td>
				<td>
                                  <select name="cod_programa" class="input-xlarge">
					<?php
					$consultaprograma2=mysql_query("SELECT * FROM plandedesarrolloprograma WHERE cod_plan=$cod_plan and cod_eje=$cod_eje and cod_estrategia=$cod_estrategia");
					while($filaprograma2=mysql_fetch_array($consultaprograma2)){
						echo '<option value="'.$filaprograma2['cod_programa'].'">'.$filaprograma2['programa'].'</option>';
					}

					?>
                                  </select>
				</td>
				</tr>
				</table>
                    <input type="submit" value="Continuar >>">
			</form>


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