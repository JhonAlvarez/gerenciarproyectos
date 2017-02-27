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

$Cedula=$_POST['Cedula'];
$Nombres=$_POST['Nombres'];
$Apellidos=$_POST['Apellidos'];

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

    <?php include_once "../../menu/m_personal.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
		<?php
		mysql_query("DELETE FROM personal WHERE Cedula='$Cedula'");

		$q=mysql_query("SELECT * FROM personal WHERE Cedula='$Cedula'");
		if(mysql_num_rows($q) == 0){
			echo mensajes('El registro '.$Nombres.' '.$Apellidos.' Ha sido Eliminado','verde');
		}else{
			echo mensajes('El registro '.$Cedula.' no se elimino','rojo');
		}

		?>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                        <h2>
			<?php
			if (file_exists("../../personal_img/".$Cedula.".jpg")){
				echo '<img src="../../personal_img/'.$Cedula.'.jpg" width="100" height="100" class="img-circle img-polaroid">';
			}else{
				echo '<img src="../../personal_img/adduser.jpg" width="100" height="100">';
			}
			?>
                        <?php echo $titulo ?></h2>                        
                    </td>
                  </tr>
                </table>
                
                <table class="table table-bordered">
                	<tr>
                    	<td>
			<?php
			echo 'Cedula: <input type="text" readonly value="'.$Cedula.'"> <br>';
			echo 'Nombre: <input type="text" readonly value="'.$Nombres.'"> <br>';
			echo 'Apellidos: <input type="text" readonly value="'.$Apellidos.'"> <br>';
			?>
			<a href="listado_personal.php" class="btn btn-large">Volver</a>
                                  </center>
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