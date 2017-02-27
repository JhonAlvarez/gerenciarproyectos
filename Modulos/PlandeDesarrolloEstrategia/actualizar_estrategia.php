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

$cod_plan=$_POST['cod_plan'];
$cod_eje=$_POST['cod_eje'];
$cod_estrategia=$_POST['cod_estrategia'];
$estrategia=$_POST['estrategia'];


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

    <?php include_once "../../menu/m_plandedesarrolloestrategia.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
			<form method="POST" action="actualizar_estrategia2.php">
                    Cod Plan <br>
		  	<input type="text" name="cod_plan" autocomplete="off" required readonly value="<?php echo $cod_plan; ?>">
			<br>
                    Cod Eje <br>
		  	<input type="text" name="cod_eje" autocomplete="off" required readonly value="<?php echo $cod_eje; ?>">
			<br>
                    Cod Politica <br>
		  	<input type="text" name="cod_estrategia" autocomplete="off" required readonly value="<?php echo $cod_estrategia; ?>">
			<br>
                    Politica <br>
		  	<input type="text" name="estrategia" autocomplete="off" required value="<?php echo $estrategia; ?>">
			<br>
			<input type="submit" value="   Actualizar   ">
                        </form>
                    </td>
                  </tr>
                </table>
                
                <table class="table table-bordered">
                	<tr>
                    	<td>
			<form method="POST" action="listado_estrategia.php">
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