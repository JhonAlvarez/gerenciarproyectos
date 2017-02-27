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
                    	<h2 align="center">Ejecucion del Proyecto No. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></h2>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_POST['cod_proyecto'];
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

			<h3 align='center'>Ejecucion del Proyecto</h3>

		<form method="POST" action="ejecucion3.php">
		<table>
		  <tr>
		    <td>
			<strong>Codigo Proyecto</strong>
		    </td>
		    <td>
			<strong>Codigo Ejecucion</strong>
		    </td>
		    <td>
			<strong>Momento Ejecucion</strong>
		    </td>
		    <td>
			<strong>Fecha Inicial (aaaa-mm-dd)</strong>
		    </td>

		    <td>
			<strong>Fecha Final (aaaa-mm-dd)</strong>
		    </td>
		  </tr>

		  <tr>
		    <td>
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
		    </td>
		    <td>
			<?php
				$consultaejecucion=mysql_query("SELECT MAX(cod_ejecucion) AS ultimaEjecucion FROM ejecuciones");
					while($filaejecucion=mysql_fetch_array($consultaejecucion)){
						$nuevoCod_ejecucion=$filaejecucion['ultimaEjecucion']+1;
						echo '<input type="text" name="cod_ejecucion" readonly value="'.$nuevoCod_ejecucion.'">';
					}
			?>

		    </td>

		    <td>
                                  <select name="cod_momentoejecucion">
					<?php
					$consultamomentoejecucion=mysql_query("SELECT * FROM momentosejecuciones");
					while($filamomentoejecucion=mysql_fetch_array($consultamomentoejecucion)){
						echo '<option value="'.$filamomentoejecucion['cod_momentoejecucion'].'">'.$filamomentoejecucion['cod_momentoejecucion'].' '.$filamomentoejecucion['momentoejecucion'].'</option>';
					}
					?>
                                  </select>

		    </td>
		    <td>
			<input type="text" name="fecha_ejecucion">
		    </td>

		    <td>
			<input type="text" name="fecha_ejecucion_final">
		    </td>

		  </tr>


		  <tr>
		    <td>
			<strong>Avance Programado</strong>
		    </td>

		    <td>
			<strong>Avance Ejecutado</strong>
		    </td>

		    <td>
			<strong>Observaciones</strong>
		    </td>
		    <td>
			<strong>Accion</strong>
		    </td>
		  </tr>

		  <tr>

		    <td>
			<input type="text" name="avance_programado" value="%">
		    </td>
		    <td>
			<input type="text" name="avance_ejecutado" value="%">
		    </td>

		    <td>
			<input type="text" name="observaciones" >
		    </td>
		    <td>
			<input type="submit" value="Agregar >>">
		    </td>
		  </tr>
		</table>
		</form>

<hr>

		<table border="1">
		  <tr>
		    <td>
			<strong>Codigo Proyecto</strong>
		    </td>
		    <td>
			<strong>Codigo Ejecucion</strong>
		    </td>
		    <td>
			<strong>Momento Ejecucion</strong>
		    </td>

		    <td>
			<strong>Fecha Inicial</strong>
		    </td>
		    <td>
			<strong>Fecha Final</strong>
		    </td>

		    <td>
			<strong>Avance Programado</strong>
		    </td>
		    <td>
			<strong>Avance Ejecutado</strong>
		    </td>
		    <td>
			<strong>Observaciones</strong>
		    </td>

		    <td>
			<strong>Soporte Digital</strong>
		    </td>
		    <td>
			<strong>Accion</strong>
		    </td>
		  </tr>

			<?php
				$consultaejecucion=mysql_query("SELECT * FROM ejecuciones WHERE cod_proyecto='$cod_proyecto'");
				while($filaejecucion=mysql_fetch_array($consultaejecucion)){
					echo '<tr>';
					echo '<td>'.$filaejecucion['cod_proyecto'].'</td>';
					echo '<td>'.$filaejecucion['cod_ejecucion'].'</td>';
					$momentoejecucion=$filaejecucion['momento_ejecucion'];
						$consultamomentoejecucion=mysql_query("SELECT * FROM momentosejecuciones WHERE cod_momentoejecucion='$momentoejecucion'");
						while($filamomentoejecucion=mysql_fetch_array($consultamomentoejecucion)){
							echo '<td>'.$filamomentoejecucion['cod_momentoejecucion'].' '.$filamomentoejecucion['momentoejecucion'].'</td>';
						}

					echo '<td>'.$filaejecucion['fecha_ejecucion'].'</td>';
					echo '<td>'.$filaejecucion['fecha_ejecucion_final'].'</td>';
					echo '<td>'.$filaejecucion['avance_programado'].'</td>';
					echo '<td>'.$filaejecucion['avance_ejecutado'].'</td>';
					echo '<td>'.$filaejecucion['observaciones'].'</td>';
			?>
                    <td>
			<?php echo $filaejecucion['cod_ejecucion']; ?>
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


                    <td>
                    	<center>
			<?php echo $filaejecucion['cod_ejecucion']; ?>
                            <a href="#act<?php echo $filaejecucion['cod_ejecucion']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-edit"></i>
                            </a>
			
                            <a href="#eli<?php echo $filaejecucion['cod_ejecucion']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-remove"></i>
                            </a>

                        </center>
                    </td>




<!--Ventana Editar comienza aqui-->

                  <div id="act<?php echo $filaejecucion['cod_ejecucion']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="actualizar_ejecucion.php">
                    <input type="hidden" name="cod_ejecucion" value="<?php echo $filaejecucion['cod_ejecucion']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Ejecucion</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_proyecto']; ?>"><br>

                                <strong>Codigo Ejecucion</strong><br>
                                <input type="text" name="cod_ejecucion" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_ejecucion']; ?>"><br>

                                <strong>Momento Ejecucion</strong><br>
                                  <select name="momento_ejecucion">
					<?php
					$paEjecucion=mysql_query("SELECT * FROM momentosejecuciones");
					while($filae=mysql_fetch_array($paEjecucion)){
						if($filae['cod_momentoejecucion']==$filaejecucion['momento_ejecucion']){
							echo '<option value="'.$filae['cod_momentoejecucion'].'" selected>'.$filae['cod_momentoejecucion'].' '.$filae['momentoejecucion'].'</option>';
						}else{
							echo '<option value="'.$filae['cod_momentoejecucion'].'">'.$filae['cod_momentoejecucion'].' '.$filae['momentoejecucion'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Fecha Inicial</strong><br>
                                <input type="text" name="fecha_ejecucion" autocomplete="off" value="<?php echo $filaejecucion['fecha_ejecucion']; ?>"><br>

			    </div>
                            <div class="span6">
                                <strong>Fecha Final</strong><br>
                                <input type="text" name="fecha_ejecucion_final" autocomplete="off" value="<?php echo $filaejecucion['fecha_ejecucion_final']; ?>"><br>

                                <strong>Avance Programado</strong><br>
                                <input type="text" name="avance_programado" autocomplete="off" value="<?php echo $filaejecucion['avance_programado']; ?>"><br>

                                <strong>Avance Ejecutado</strong><br>
                                <input type="text" name="avance_ejecutado" autocomplete="off" value="<?php echo $filaejecucion['avance_ejecutado']; ?>"><br>

                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off" value="<?php echo $filaejecucion['observaciones']; ?>"><br>


                            </div>

                    	</div>
                    </div>
                    <div class="modal-footer">
    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	            <button type="submit" class="btn btn-primary"><strong>Actualizar</strong></button>
                    </div>
                    </form>
                </div>
<!--Ventana Editar finaliza aqui-->



<!--Aqui comienza la ventana Eliminar-->


                  <div id="eli<?php echo $filaejecucion['cod_ejecucion']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form3" method="post" action="eliminar_ejecucion.php">
	                    <input type="hidden" name="cod_ejecucion" value="<?php echo $filaejecucion['cod_ejecucion']; ?>">
	                    <div class="modal-header">
        	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                	        <h3 id="myModalLabel">Eliminar Ejecucion</h3>
				<font color="red">Esta seguro que desea eliminar este registro?</font>
	                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_proyecto']; ?>"><br>
                                <strong>Codigo Ejecucion</strong><br>
                                <input type="text" name="cod_ejecucion" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_ejecucion']; ?>"><br>

	    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	     	       <button type="submit" class="btn btn-primary"><strong>Eliminar</strong></button>
                            </div>

			</form>
		</div>
<!--Ventana Eliminar finaliza aqui-->

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