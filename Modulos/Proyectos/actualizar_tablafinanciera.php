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
$cod_tablafinanciera=$_POST['cod_tablafinanciera'];
$momento_tablafinanciera=$_POST['momento_tablafinanciera'];
$fecha_tablafinanciera=$_POST['fecha_tablafinanciera'];
$valor=$_POST['valor'];
$observaciones=$_POST['observaciones'];


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Gerenciar Proyectos Meta</title>
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
    	<table width="90%">
          <tr>
            <td>
		<?php
		mysql_query("UPDATE tablasfinancieras SET cod_proyecto='$cod_proyecto', cod_tablafinanciera='$cod_tablafinanciera', momento_tablafinanciera='$momento_tablafinanciera', fecha_tablafinanciera='$fecha_tablafinanciera', valor='$valor', observaciones='$observaciones' WHERE cod_proyecto='$cod_proyecto' AND cod_tablafinanciera='$cod_tablafinanciera' ");

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
			<form method="GET" action="tablafinanciera2.php">
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