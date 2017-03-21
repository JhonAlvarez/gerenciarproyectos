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
            <link rel="stylesheet" type="text/css" href="../../css/styloproy.css">

    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../ico/apple-touch-icon-57-precomposed.png">
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
                    	<h2 align="center">Liquidacion del Proyecto No. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></h2>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_POST['cod_proyecto'];
			$cod_liquidacion=$_POST['cod_liquidacion'];
			$fecha_liquidacion=$_POST['fecha_liquidacion'];
			$cod_momentoliquidacion=$_POST['cod_momentoliquidacion'];
			$fecha_liquidacion_final=$_POST['fecha_liquidacion_final'];
			$observaciones=$_POST['observaciones'];

		$consultaInsertarCod_liquidacion=mysql_query("SELECT * FROM liquidaciones WHERE cod_liquidacion='$cod_liquidacion' and cod_proyecto='$cod_proyecto' ");
		if($row=mysql_fetch_array($consultaInsertarCod_liquidacion)){
			echo mensajes('Esta liquidacion ya fue insertada en este proyecto','rojo');
		}else{
			echo mensajes('Esta liquidacion fue agragada al proyecto exitosamente','verde');
			mysql_query("INSERT INTO liquidaciones (cod_liquidacion, cod_proyecto, fecha_liquidacion, momento_liquidacion, fecha_liquidacion_final, observaciones) VALUES ('$cod_liquidacion', '$cod_proyecto', '$fecha_liquidacion', '$cod_momentoliquidacion', '$fecha_liquidacion_final', '$observaciones')");

		}




				?>
		

		<table>

			<form method="GET" action="liquidacion2.php">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
			<input type="submit" value="   Volver  ">
			</form>

		<table border="1" style="width:90%">
		  <tr>
		  
		    <td style="width:7%">
			<strong>Fecha  </strong>
		    </td>
		    <td style="width:5%">
			<strong>Momento</strong>
		    </td>
		  
		    <td style="width:8%">
			<strong>Observaciones</strong>
		    </td>
		    <td style="width:1%">
			<strong>Soporte Digital</strong>
		    </td>
		    
		  </tr>

			<?php
				$consultaliquidacion=mysql_query("SELECT * FROM liquidaciones WHERE cod_proyecto='$cod_proyecto' ORDER BY fecha_liquidacion desc ");
				while($filaliquidacion=mysql_fetch_array($consultaliquidacion)){
					echo '<tr>';
					echo '<td style=width:7%>'.$filaliquidacion['fecha_liquidacion'].'</td>';
					$momentoliquidacion=$filaliquidacion['momento_liquidacion'];
						$consultamomentoliquidacion=mysql_query("SELECT * FROM momentosliquidaciones WHERE cod_momentoliquidacion='$momentoliquidacion'");
						while($filamomentoliquidacion=mysql_fetch_array($consultamomentoliquidacion)){
							echo '<td>'.$filamomentoliquidacion['momentoliquidacion'].'</td>';
						}
					echo '<td style=width:5%>'.$filaliquidacion['observaciones'].'</td>';
			?>
                    <td style="width:1%">
			<form method="POST" action="cargar_archivo_liquidacion.php">
			<?php
			if (file_exists("../../archivos_liquidacion/".$filaliquidacion['cod_liquidacion'].".pdf")){
				echo '<a href="../../archivos_liquidacion/'.$filaliquidacion['cod_liquidacion'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_liquidacion/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_liquidacion/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_liquidacion" autocomplete="off" required readonly value="<?php echo $filaliquidacion['cod_liquidacion']; ?>">
        	            <button type="submit" class="btn btn-primary"><strong>Cargar</strong></button>
			</form>			
			</td>
			<?php
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