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
    <meta name="viewport" content="width=device-widt
    h, initial-scale=1.0">
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
                    	ESTRUCTURACION DEL PROYECTO N°. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></p></font>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_POST['cod_proyecto'];
			$cod_estructuracion=$_POST['cod_estructuracion'];
			$fecha_estructuracion=$_POST['fecha_estructuracion'];
			$cod_momento=$_POST['cod_momento'];
			$observaciones=$_POST['observaciones'];

		$consultaInsertarCod_estructuracion=mysql_query("SELECT * FROM estructuracion WHERE cod_estructuracion='$cod_estructuracion' and cod_proyecto='$cod_proyecto' ");				
		if($row=mysql_fetch_array($consultaInsertarCod_estructuracion)){
			echo mensajes('Esta Estructuracion ya fue insertada en este proyecto','rojo');
		}else{
			echo mensajes('Esta Estructuracion fue agragada al proyecto exitosamente','verde');
			mysql_query("INSERT INTO estructuracion (cod_estructuracion, cod_proyecto, fecha_estructuracion, momento, observaciones) VALUES ('$cod_estructuracion', '$cod_proyecto', '$fecha_estructuracion', '$cod_momento', '$observaciones')");

		}





					
		
					


				?>
		

		<table>

			
			<form method="GET" action="estructuracion2.php">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
			<input type="submit" value="   Volver  ">
			</form>

		<table border="1" style="width:100%">
		  <tr>
		  
		    <td style="width:4%">
			<strong>Fecha</strong>
		    </td>
		    <td style="width:5%">
			<strong>Momento </strong>
		    </td>
		    <td style="width:5%">
			<strong>Observaciones</strong>
		    </td>
		    <td style="width:2%">
			<strong>Soporte Digital</strong>
		    </td>
		    
		  </tr>

			<?php
				$consultaestructuracion=mysql_query("SELECT * FROM estructuracion WHERE cod_proyecto='$cod_proyecto'  ORDER BY  fecha_estructuracion desc ");
				while($filaestructuracion=mysql_fetch_array($consultaestructuracion)){
					echo '<tr>';
					
					echo '<td style=width:4%>'.$filaestructuracion['fecha_estructuracion'].'</td>';
					$momento=$filaestructuracion['momento'];
						$consultamomento=mysql_query("SELECT * FROM momentos WHERE cod_momento='$momento'");
						while($filamomento=mysql_fetch_array($consultamomento)){
							echo '<td style=width:5%>'.$filamomento['momento'].'</td>';
						}
					echo '<td style=width:5%>'.$filaestructuracion['observaciones'].'</td>';
			?>
                    <td style="width:2%">
			<form method="POST" action="cargar_archivo_estructuracion.php">
			<?php
			if (file_exists("../../archivos_estructuracion/".$filaestructuracion['cod_estructuracion'].".pdf")){
				echo '<a href="../../archivos_estructuracion/'.$filaestructuracion['cod_estructuracion'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_estructuracion/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_estructuracion/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_estructuracion" autocomplete="off" required readonly value="<?php echo $filaestructuracion['cod_estructuracion']; ?>">
        	            <button type="submit" class="btn btn-primary"><strong>Cargar</strong></button>
			</form>			
			</td>
			<?php
					echo '<tr>';
				}
			?>


		</table>
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