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

    <?php include_once "../../menu/m_proyecto.php"; ?>

	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Estructuracion del Proyecto No. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></h2>
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



			echo "<h3 align='center'>Informacion General del Proyecto</h3>";

			echo "<table>";

				$consultacod_proyecto=mysql_query("SELECT * FROM proyectos WHERE cod_proyecto=".$cod_proyecto);
					while($filacod_proyecto=mysql_fetch_array($consultacod_proyecto)){
					echo "<tr>";
						echo '<td><strong>Codigo del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td>'.$filacod_proyecto['cod_proyecto'].'</td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Objeto del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td>'.$filacod_proyecto['objetivoproyecto'].'</td>';
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Municipio 1: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultamunicipio1=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio1']);
							while($filamunicipio1=mysql_fetch_array($consultamunicipio1)){
								echo '<td>'.$filamunicipio1['municipio'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Municipio 2: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultamunicipio2=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio2']);
							while($filamunicipio2=mysql_fetch_array($consultamunicipio2)){
								echo '<td>'.$filamunicipio2['municipio'].'</td>';
							}
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Estado del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=".$filacod_proyecto['estadodelproyecto']);
							while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
								echo '<td>'.$filaestadodelproyecto['estadodelproyecto'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Supervisor: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultasupervisor=mysql_query("SELECT * FROM personal WHERE Cedula=".$filacod_proyecto['supervisor']);
							while($filasupervisor=mysql_fetch_array($consultasupervisor)){
								echo '<td>'.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</td>';
							}
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Politica del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultaestrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto WHERE cod_estrategiadelproyecto=".$filacod_proyecto['estrategia']);
							while($filaestrategiadelproyecto=mysql_fetch_array($consultaestrategiadelproyecto)){
								echo '<td>'.$filaestrategiadelproyecto['estrategiadelproyecto'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Sector de Inversion: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultasectordeinversion=mysql_query("SELECT * FROM sectordeinversion WHERE cod_sectordeinversion=".$filacod_proyecto['sectordeinversion']);
							while($filasectordeinversion=mysql_fetch_array($consultasectordeinversion)){
								echo '<td>'.$filasectordeinversion['sectordeinversion'].'</td>';
							}
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Subsector: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultasubsector=mysql_query("SELECT * FROM subsector WHERE cod_subsector=".$filacod_proyecto['subsector']);
							while($filasubsector=mysql_fetch_array($consultasubsector)){
								echo '<td>'.$filasubsector['subsector'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Ente Ejecutor: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor WHERE cod_enteejecutor=".$filacod_proyecto['enteejecutor']);
							while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){
								echo '<td>'.$filaenteejecutor['enteejecutor'].'</td>';
							}
					echo "</tr>";


					}
			echo "</table>";

			echo "<h3 align='center'>Informacion del Plan de Desarrollo del Proyecto</h3>";

				echo "<table>";
				echo "<tr>";
				$consultaplan=mysql_query("SELECT * FROM proyectosconmetas WHERE cod_proyectoconmeta=".$cod_proyecto);
					while($fila=mysql_fetch_array($consultaplan)){
						echo '<td><strong>Plan de Desarrollo: </strong></td><td>'.$fila['cod_planConMeta'];
							$consultaplanConMeta=mysql_query("SELECT * FROM plandedesarrollo WHERE cod_plan=".$fila['cod_planConMeta']);
								while($filaplanConMeta=mysql_fetch_array($consultaplanConMeta)){
									echo " - ".$filaplanConMeta['plan'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Eje: </strong></td><td>'.$fila['cod_ejeConMeta'];
							$consultaejeConMeta=mysql_query("SELECT * FROM plandedesarrolloeje WHERE cod_eje=".$fila['cod_ejeConMeta']);
								while($filaejeConMeta=mysql_fetch_array($consultaejeConMeta)){
									echo " - ".$filaejeConMeta['eje'].'</td>';
							}
						echo "</tr>";
						echo "<tr>";
						echo '<td><strong>Politica: </strong></td><td>'.$fila['cod_estrategiaConMeta'];
							$consultaestrategiaConMeta=mysql_query("SELECT * FROM plandedesarrolloestrategia WHERE cod_estrategia=".$fila['cod_estrategiaConMeta']);
								while($filaestrategiaConMeta=mysql_fetch_array($consultaestrategiaConMeta)){
									echo " - ".$filaestrategiaConMeta['estrategia'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Programa: </strong></td><td>'.$fila['cod_programaConMeta'];
							$consultaprogramaConMeta=mysql_query("SELECT * FROM plandedesarrolloprograma WHERE cod_programa=".$fila['cod_programaConMeta']);
								while($filaprogramaConMeta=mysql_fetch_array($consultaprogramaConMeta)){
									echo " - ".$filaprogramaConMeta['programa'].'</td>';
							}
						echo "</tr>";
						echo "<tr>";
						echo '<td><strong>Subprograma: </strong></td><td>'.$fila['cod_subprogramaConMeta'];
							$consultasubprogramaConMeta=mysql_query("SELECT * FROM plandedesarrollosubprograma WHERE cod_subprograma=".$fila['cod_subprogramaConMeta']);
								while($filasubprogramaConMeta=mysql_fetch_array($consultasubprogramaConMeta)){
									echo " - ".$filasubprogramaConMeta['subprograma'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Meta: </strong></td><td>'.$fila['cod_metaConMeta'];
							$consultametaConMeta=mysql_query("SELECT * FROM plandedesarrollometa WHERE cod_meta=".$fila['cod_metaConMeta']);
								while($filametaConMeta=mysql_fetch_array($consultametaConMeta)){
									echo " - ".$filametaConMeta['meta'].'</td>';
							}
					}


				?>
		</tr>

		<table>

			<h3 align='center'>Estructuracion del Proyecto</h3>
			<form method="POST" action="estructuracion2.php">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
			<input type="submit" value="   Volver  ">
			</form>

		<table border="1">
		  <tr>
		  
		    <td>
			<strong>Fecha</strong>
		    </td>
		    <td>
			<strong>Momento </strong>
		    </td>
		    <td>
			<strong>Observaciones</strong>
		    </td>
		    <td>
			<strong>Soporte Digital</strong>
		    </td>
		    
		  </tr>

			<?php
				$consultaestructuracion=mysql_query("SELECT * FROM estructuracion WHERE cod_proyecto='$cod_proyecto'  ORDER BY  fecha_estructuracion desc ");
				while($filaestructuracion=mysql_fetch_array($consultaestructuracion)){
					echo '<tr>';
					
					echo '<td>'.$filaestructuracion['fecha_estructuracion'].'</td>';
					$momento=$filaestructuracion['momento'];
						$consultamomento=mysql_query("SELECT * FROM momentos WHERE cod_momento='$momento'");
						while($filamomento=mysql_fetch_array($consultamomento)){
							echo '<td>'.$filamomento['momento'].'</td>';
						}
					echo '<td>'.$filaestructuracion['observaciones'].'</td>';
			?>
                    <td>
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