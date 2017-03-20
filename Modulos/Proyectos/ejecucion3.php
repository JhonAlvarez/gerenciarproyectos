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
    <title>Gerenciar Proyectos Meta</title>
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
<p align="center"><font size="6">
                    	EJECUCION DEL PROYECTO N°. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></p></font>                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_POST['cod_proyecto'];
			$cod_ejecucion=$_POST['cod_ejecucion'];
			$fecha_ejecucion=$_POST['fecha_ejecucion'];
			$cod_momentoejecucion=$_POST['cod_momentoejecucion'];
			$fecha_ejecucion_final=$_POST['fecha_ejecucion_final'];
			$observaciones=$_POST['observaciones'];
			$cumple=$_POST['cumple'];
			$avance_programado=$_POST['avance_programado'];
			$avance_ejecutado=$_POST['avance_ejecutado'];


		$consultaInsertarCod_ejecucion=mysql_query("SELECT * FROM ejecuciones WHERE cod_ejecucion='$cod_ejecucion' and cod_proyecto='$cod_proyecto' ");
		if($row=mysql_fetch_array($consultaInsertarCod_ejecucion)){
			echo mensajes('Esta ejecucion ya fue insertada en este proyecto','rojo');
		}else{
			echo mensajes('Esta ejecucion fue agragada al proyecto exitosamente','verde');
			mysql_query("INSERT INTO ejecuciones (cod_ejecucion, cod_proyecto, fecha_ejecucion, momento_ejecucion, fecha_ejecucion_final, observaciones, cumple, avance_programado, avance_ejecutado) VALUES ('$cod_ejecucion', '$cod_proyecto', '$fecha_ejecucion', '$cod_momentoejecucion', '$fecha_ejecucion_final', '$observaciones', '$cumple', '$avance_programado', '$avance_ejecutado')");

		}




							?>
	

		<table>

			<form method="GET" action="ejecucion2.php">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
			<input type="submit" value="   Volver  ">
			</form>

		<table border="1" style="width:100%">
		  <tr>
		   
		   <td style="width:7%">
			<strong>Fecha </strong>
		    </td>
		    <td style="width:5%">
			<strong>Momento </strong>
		    </td>

		    
		   
		    <td style="width:1%"> 
			<strong>Avance Programado</strong>
		    </td>
		    <td style="width:1%">
			<strong>Avance Ejecutado</strong>
		    </td>
		    <td style="width:8%">
			<strong>Observaciones</strong>
		    </td>

		    <td style="width:1%">
			<strong>Soporte Digital</strong>
		    </td>
		    
		  </tr>

			<?php
				$consultaejecucion=mysql_query("SELECT * FROM ejecuciones WHERE cod_proyecto='$cod_proyecto' ORDER BY fecha_ejecucion desc");
				while($filaejecucion=mysql_fetch_array($consultaejecucion)){
					echo '<tr>';
					echo '<td style=width:7%>'.$filaejecucion['fecha_ejecucion'].'</td>';
					$momentoejecucion=$filaejecucion['momento_ejecucion'];
						$consultamomentoejecucion=mysql_query("SELECT * FROM momentosejecuciones WHERE cod_momentoejecucion='$momentoejecucion'");
						while($filamomentoejecucion=mysql_fetch_array($consultamomentoejecucion)){
							echo '<td style=width:5%>'.$filamomentoejecucion['momentoejecucion'].'</td>';
						}

					echo '<td style=width:1%>'.$filaejecucion['avance_programado'].'</td>';
					echo '<td style=width:1%>'.$filaejecucion['avance_ejecutado'].'</td>';
					echo '<td style=width:8%>'.$filaejecucion['observaciones'].'</td>';
			?>
                    <td style="width:8%">
			<form method="POST" action="cargar_archivo_ejecucion.php">
			<?php
			if (file_exists("../../archivos_ejecucion/".$filaejecucion['cod_ejecucion'].".pdf")){
				echo '<a href="../../archivos_ejecucion/'.$filaejecucion['cod_ejecucion'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_ejecucion/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_ejecucion/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_ejecucion" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_ejecucion']; ?>">
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