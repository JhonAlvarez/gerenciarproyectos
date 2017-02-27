<?php
session_start();
include_once "../php_conexion.php";
include_once "class/class.php";
include_once "../funciones.php";
include_once "../class_buscar.php";

if($_SESSION['tipo_user']=='c'){

}else{
	//header('Location: ../../php_cerrar.php');
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Cargar Archivo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                        <h2>
                        </h2>                        
<?php
echo $cod_licitacion=$_POST['cod_licitacion'];
$formatos = array('.pdf', '.PDF');
if(isset($_POST['boton'])){
	$nombreArchivo = $_FILES['archivo']['name'];
	$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
	$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
	if(in_array($ext, $formatos)){
		if(move_uploaded_file($nombreTmpArchivo, "../../archivos_licitacion/".$cod_licitacion.".pdf")){
			echo mensajes('Archivo subido','verde');
			echo '<a href="licitacion_supervisor.php" role="button" class="btn" data-toggle="modal"><strong>Volver</strong></a>';
			exit();
		}else{
			echo mensajes('Archivo No subido','rojo');
		}		
	}else{
	    echo mensajes('Archivo no permitido, solo aceptamos pdf, verifique que todo este en minuscula tanto el nombre como la extension','rojo');
	}

}
?>

<form method="POST" action="" enctype="multipart/form-data">
<input type="text" name="cod_licitacion" readonly value="<?php echo $cod_licitacion; ?>">
<br>
<input type="file" name="archivo">
<br>
<button type="submit" name="boton" class="btn btn-primary"><strong>Subir Archivo</strong></button>
</form>
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