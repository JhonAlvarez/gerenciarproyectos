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

$cod_proyecto=$_POST['cod_proyecto'];
$cod_ejecucion=$_POST['cod_ejecucion'];
$momento_ejecucion=$_POST['momento_ejecucion'];
$fecha_ejecucion=$_POST['fecha_ejecucion'];
$fecha_ejecucion_final=$_POST['fecha_ejecucion_final'];
$cumple=0;
$avance_programado=$_POST['avance_programado'];
$avance_ejecutado=$_POST['avance_ejecutado'];
$observaciones=$_POST['observaciones'];


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Gerenciar Proyectos ...::... Chalxsoft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Chalxsoft">


    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="shortcut icon" href="../../ico/favicon.png">

  </head>
  <body>

    <?php include_once "../../menu/m_proyecto.php"; ?>
	<div align="center">
    	<table width="70%">
          <tr>
            <td>
		<?php
		mysql_query("UPDATE ejecuciones SET cod_ejecucion='$cod_ejecucion', cod_proyecto='$cod_proyecto', fecha_ejecucion='$fecha_ejecucion', momento_ejecucion='$momento_ejecucion', fecha_ejecucion_final='$fecha_ejecucion_final', observaciones='$observaciones', cumple='$cumple', avance_programado='$avance_programado', avance_ejecutado='$avance_ejecutado' WHERE cod_proyecto='$cod_proyecto' AND cod_ejecucion='$cod_ejecucion' ");

		echo mensajes('El registro ha sido Actualizado','verde');

		?>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                        
                    </td>
                  </tr>
                </table>
                
                <table class="table table-bordered">
                	<tr>
                    	<td>
			<form method="GET" action="ejecucion2.php">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
			<br>
			<input type="submit" value="   Volver   ">
			</form>

                                </div>
                            </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
          </tr>
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