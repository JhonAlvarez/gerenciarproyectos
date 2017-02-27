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

    <?php include_once "../../menu/m_plandedesarrolloestrategia.php"; ?>

	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Crear Politicas</h2>
                    </td>
                  </tr>
                </table>
                <div align="right">
			<form method="POST" action="crear_estrategia3.php">
				<?php
				$cod_plan=$_POST['cod_plan'];
				echo "Codigo Plan de Desarrollo: ";
				echo "<input type='text' name='cod_plan' readonly value='".$cod_plan."'>";
				$consultaplan=mysql_query("SELECT * FROM plandedesarrollo WHERE cod_plan=".$cod_plan);
					while($fila=mysql_fetch_array($consultaplan)){
						echo ' Plan de Desarrollo: <input type="text" name="plan" readonly value="'.$fila['plan'].'">';
					}

				?>
				<strong>Elija un Eje</strong>

                                  <select name="cod_eje" class="input-xlarge">
					<?php
					$consultaeje2=mysql_query("SELECT * FROM plandedesarrolloeje WHERE cod_plan=".$cod_plan);
					while($fila2=mysql_fetch_array($consultaeje2)){
						echo '<option value="'.$fila2['cod_eje'].'">'.$fila2['eje'].'</option>';
					}

					?>
                                  </select>
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