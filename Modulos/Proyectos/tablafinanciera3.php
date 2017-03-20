
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
                    		<p align="center"><font size="6">TABLA FINANCIERA DEL PROYECTO N°. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></p></font>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_POST['cod_proyecto'];
			$cod_tablafinanciera=$_POST['cod_tablafinanciera'];
			$cod_momentotablafinanciera=$_POST['cod_momentotablafinanciera'];
			$fecha_tablafinanciera=$_POST['fecha_tablafinanciera'];
			$valor=$_POST['valor'];
			$observaciones=$_POST['observaciones'];

		$consultaInsertarCod_tablafinanciera=mysql_query("SELECT * FROM tablasfinancieras WHERE cod_tablafinanciera='$cod_tablafinanciera' and cod_proyecto='$cod_proyecto' ");
		if($row=mysql_fetch_array($consultaInsertarCod_tablafinanciera)){
			echo mensajes('Esta tabla financiera ya fue insertada en este proyecto','rojo');
		}else{
			echo mensajes('Esta tabla financiera fue agragada al proyecto exitosamente','verde');
			mysql_query("INSERT INTO tablasfinancieras (cod_tablafinanciera, cod_proyecto, momento_tablafinanciera, fecha_tablafinanciera, valor, observaciones) VALUES ('$cod_tablafinanciera', '$cod_proyecto', '$cod_momentotablafinanciera', '$fecha_tablafinanciera', '$valor', '$observaciones')");

		}




		


				?>
	

		<table>

			<h3 align='center'>Tabla Financiera del Proyecto</h3>
			<form method="GET" action="tablafinanciera2.php">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
			<input type="submit" value="   Volver  ">
			</form>

		<table border="1" style="width:100%">
		  <tr>
		    <td style="width:4%">
			<strong>Fecha </strong>
		    </td>
		    <td style="width:5%">
			<strong>Momento </strong>
		    </td>
		   

		    <td style="width:5%">
			<strong>Valor</strong>
		    </td>
		    <td style="width:5%">
			<strong>Observaciones</strong>
		    </td>
		    <td style="width:2%">
			<strong>Soporte Digital</strong>
		    </td>
		   
		  </tr>

			<?php
				$consultatablafinanciera=mysql_query("SELECT cod_tablafinanciera,cod_proyecto,momento_tablafinanciera,fecha_tablafinanciera,format(valor,0) as valor,observaciones FROM tablasfinancieras WHERE cod_proyecto='$cod_proyecto'  ORDER BY fecha_tablafinanciera desc ");
				while($filatablafinanciera=mysql_fetch_array($consultatablafinanciera)){
					echo '<tr>';
					echo '<td>'.$filatablafinanciera['fecha_tablafinanciera'].'</td>';
					$momentotablafinanciera=$filatablafinanciera['momento_tablafinanciera'];
						$consultamomentotablafinanciera=mysql_query("SELECT * FROM momentostablasfinancieras WHERE cod_momentotablafinanciera='$momentotablafinanciera'");
						while($filamomentotablafinanciera=mysql_fetch_array($consultamomentotablafinanciera)){
							echo '<td>'.$filamomentotablafinanciera['momentotablafinanciera'].'</td>';
						}
					echo '<td> $ '.$filatablafinanciera['valor'].'</td>';
					echo '<td>'.$filatablafinanciera['observaciones'].'</td>';
			?>
                    <td>
			<form method="GET" action="cargar_archivo_tablafinanciera.php">
			<?php
			if (file_exists("../../archivos_tablafinanciera/".$filatablafinanciera['cod_tablafinanciera'].".pdf")){
				echo '<a href="../../archivos_tablafinanciera/'.$filatablafinanciera['cod_tablafinanciera'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_tablafinanciera/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_tablafinanciera/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_tablafinanciera" autocomplete="off" required readonly value="<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>">
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