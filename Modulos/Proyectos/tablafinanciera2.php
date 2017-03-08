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
                    	<h2 align="center">Tabla Financiera del Proyecto No. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></h2>
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

		<h3 align='center'>Fuente del Proyecto</h3>
		<table border="1">
		  <tr>
		    <td>
			<strong>Proyecto</strong>
		    </td>
		    <td>
			<strong>Fuente</strong>
		    </td>
		    <td>
			<strong>Fuente de Financiacion</strong>
		    </td>
		    <td>
			<strong>Tipo de Fuente de Financiacion</strong>
		    </td>
		    <td>
			<strong></strong>
		    </td>
		  </tr>

<?php
		$q=mysql_query("SELECT * FROM fuentesporproyectos WHERE cod_proyecto='$cod_proyecto' ");
		if(mysql_num_rows($q) == 0){
			echo mensajes('Este proyecto '.$cod_proyecto.' no tiene fuente de financiacion','rojo');
                    	echo '<center>';
			echo '<form method=POST action=agregar_tablafinanciera_fuente.php>';
			echo '<input type="hidden" name="cod_proyecto" readonly value='.$cod_proyecto.'>';
			echo '    <strong>Fuente de Financiacion</strong>';
			echo '    <select name="cod_fuentedefinanciacion">';
					$pafuentedefinanciacion=mysql_query("SELECT * FROM fuentesdefinanciacion");
					while($filaf=mysql_fetch_array($pafuentedefinanciacion)){
						echo '<option value="'.$filaf['cod_fuentedefinanciacion'].'" selected>'.$filaf['cod_fuentedefinanciacion'].' '.$filaf['fuentedefinanciacion'].' '.$filaf['tipofuentedefinanciacion'].'</option>';
					}
			echo '    </select>';
			echo '&nbsp; &nbsp; &nbsp; &nbsp; <button type="submit" class="btn btn-primary"><strong>Agregar Fuente</strong></button>';
			echo '</form>';
			echo '</center>';
		}else{

?>
		  <tr>
		    <td>
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
		    </td>
		    <td>
			<?php
				$consultafuentesporproyectos=mysql_query("SELECT * FROM fuentesporproyectos WHERE cod_proyecto='$cod_proyecto' ");
					while($filafuentesporproyectos=mysql_fetch_array($consultafuentesporproyectos)){
						echo '<input type="text" name="cod_fuentedefinanciacion" readonly value="'.$filafuentesporproyectos['cod_fuentedefinanciacion'].'">';
						$cod_fuentedefinanciacion=$filafuentesporproyectos['cod_fuentedefinanciacion'];
					}
			?>

		    </td>
		    <td>
			<?php
				$consultafuente=mysql_query("SELECT * FROM fuentesdefinanciacion WHERE cod_fuentedefinanciacion='$cod_fuentedefinanciacion' ");
					while($filafuente=mysql_fetch_array($consultafuente)){
						echo '<input type="text" name="fuentedefinanciacion" readonly value="'.$filafuente['fuentedefinanciacion'].'">';
					}
			?>
		    </td>
		    <td>
			<?php
				$consultafuentetipo=mysql_query("SELECT * FROM fuentesdefinanciacion WHERE cod_fuentedefinanciacion='$cod_fuentedefinanciacion' ");
					while($filafuentetipo=mysql_fetch_array($consultafuentetipo)){
						echo '<input type="text" name="tipofuentedefinanciacion" readonly value="'.$filafuentetipo['tipofuentedefinanciacion'].'">';
					}
			?>
		    </td>
		    <td>
                    	<center>
                            <a href="#actFuente<?php echo $cod_proyecto; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-edit"></i>
                            </a>
			
                            <a href="#eliFuente<?php echo $cod_proyecto; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-remove"></i>
                            </a>
                        </center>
		    </td>
		  </tr>
		</table>


<?php
		}
?>





			<h3 align='center'>Tabla Financiera del Proyecto</h3>

		<form method="POST" action="tablafinanciera3.php">
		<table>
		  <tr>
		    <td>
			<strong>Proyecto</strong>
		    </td>
		    <!--
Eliminar tabla financiera
		    -->
		    <td>
			<strong>Momento </strong>
		    </td>
		  </tr>

		  <tr>
		    <td>
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
		    </td>
		    
		    <td>
                                  <select name="cod_momentotablafinanciera">
					<?php
					while($filamomentotablafinanciera=mysql_fetch_array($consultamomentotablafinanciera)){
						echo '<option value="'.$filamomentotablafinanciera['cod_momentotablafinanciera'].'">'.$filamomentotablafinanciera['momentotablafinanciera'].'</option>';
					}
					?>
                                  </select>

		    </td>
		  </tr>


		  <tr>
		    <td>
			<strong>Fecha </strong>
		    </td>

		    <td>
			<strong>Valor</strong>
		    </td>
		    <td>
			<strong>Observaciones</strong>
		    </td>
		    <td>
			<strong></strong>
		    </td>
		  </tr>

		  <tr>
		    <td>
			<input type="date" name="fecha_tablafinanciera">
		    </td>

		    <td>
			<input type="text" name="valor">
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

		<table border="1" align="center">
		  <tr>
		    <td>
			<strong>Proyecto</strong>
		    </td>
		    
		    <td>
			<strong>Momento </strong>
		    </td>
		    <td>
			<strong>Fecha</strong>
		    </td>
		    <td>
			<strong>Valor</strong>
		    </td>

		    <td>
			<strong>Observaciones</strong>
		    </td>
		    <td>
			<strong>Soporte Digital</strong>
		    </td>
		    <td>
			<strong></strong>
		    </td>
		  </tr>

			<?php
				$consultatablafinanciera=mysql_query("SELECT * FROM tablasfinancieras WHERE cod_proyecto='$cod_proyecto' ORDER BY fecha_tablafinanciera desc "  );
				while($filatablafinanciera=mysql_fetch_array($consultatablafinanciera)){
					echo '<tr>';
					echo '<td>'.$filatablafinanciera['cod_proyecto'].'</td>';
										$momentotablafinanciera=$filatablafinanciera['momento_tablafinanciera'];
	$consultamomentotablafinanciera=mysql_query("SELECT * FROM momentostablasfinancieras WHERE cod_momentotablafinanciera='$momentotablafinanciera'");
						while($filamomentotablafinanciera=mysql_fetch_array($consultamomentotablafinanciera)){
							echo '<td>'.$filamomentotablafinanciera['momentotablafinanciera'].'</td>';
						}
					echo '<td>'.$filatablafinanciera['fecha_tablafinanciera'].'</td>';
					echo '<td> $'.round($filatablafinanciera['valor']).'</td>';
					echo '<td>'.$filatablafinanciera['observaciones'].'</td>';
			?>
                    <td>
			<form method="POST" action="cargar_archivo_tablafinanciera.php">
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

                    <td>
                    	<center>
                            <a href="#act<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-edit"></i>
                            </a>
			
                            <a href="#eli<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-remove"></i>
                            </a>
                        </center>
                    </td>




<!--Ventana Editar comienza aqui-->

                  <div id="act<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="actualizar_tablafinanciera.php">
                    <input type="hidden" name="cod_tablafinanciera" value="<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Tabla Financiera</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filatablafinanciera['cod_proyecto']; ?>"><br>

                                

                                <strong>Momento </strong><br>
                                  <select name="momento_tablafinanciera">
					<?php
					$paTablafinanciera=mysql_query("SELECT * FROM momentostablasfinancieras");
					while($filae=mysql_fetch_array($paTablafinanciera)){
						if($filae['cod_momentotablafinanciera']==$filatablafinanciera['momento_tablafinanciera']){
							echo '<option value="'.$filae['cod_momentotablafinanciera'].'" selected>'.$filae['cod_momentotablafinanciera'].' '.$filae['momentotablafinanciera'].'</option>';
						}else{
							echo '<option value="'.$filae['cod_momentotablafinanciera'].'">'.$filae['cod_momentotablafinanciera'].' '.$filae['momentotablafinanciera'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Fecha</strong><br>
                                <input type="date" name="fecha_tablafinanciera" autocomplete="off" value="<?php echo $filatablafinanciera['fecha_tablafinanciera']; ?>"><br>


                                <strong>Valor</strong><br>
                                <input type="text" name="valor" autocomplete="off" value="<?php echo $filatablafinanciera['valor']; ?>"><br>

                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off" value="<?php echo $filatablafinanciera['observaciones']; ?>"><br>


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


                  <div id="eli<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form3" method="post" action="eliminar_tablafinanciera.php">
	                    <input type="hidden" name="cod_tablafinanciera" value="<?php echo $filaestructuracion['cod_tablafinanciera']; ?>">
	                    <div class="modal-header">
        	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                	        <h3 id="myModalLabel">Eliminar Tabla Financiera</h3>
				<font color="red">Esta seguro que desea eliminar este registro?</font>
	                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filatablafinanciera['cod_proyecto']; ?>"><br>
                                <strong>Tabla Financiera</strong><br>
                                <input type="text" name="cod_tablafinanciera" autocomplete="off" required readonly value="<?php echo $filatablafinanciera['cod_tablafinanciera']; ?>"><br>

	    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	     	       <button type="submit" class="btn btn-primary"><strong>Eliminar</strong></button>
                            </div>
			</div>
			</form>
		</div>
<!--Ventana Eliminar finaliza aqui-->




			<?php
					echo '<tr>';
				}
			?>


		</table>


<!--Ventana Editar Fuente comienza aqui-->

                  <div id="actFuente<?php echo $cod_proyecto; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form4" method="post" action="actualizar_tablafinanciera_fuente.php">
                    <input type="hidden" name="cod_proyecto" value="<?php echo $cod_proyecto; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Fuente de Financiacion</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $cod_proyecto; ?>"><br>

                                <strong>Fuente de Financiacion</strong><br>
                                  <select name="cod_fuentedefinanciacion">
					<?php
					$pafuentedefinanciacion=mysql_query("SELECT * FROM fuentesdefinanciacion");
					while($filaf=mysql_fetch_array($pafuentedefinanciacion)){
						if($filaf['cod_fuentedefinanciacion']==$cod_fuentedefinanciacion){
							echo '<option value="'.$filaf['cod_fuentedefinanciacion'].'" selected>'.$filaf['cod_fuentedefinanciacion'].' '.$filaf['fuentedefinanciacion'].' '.$filaf['tipofuentedefinanciacion'].'</option>';
						}else{
							echo '<option value="'.$filaf['cod_fuentedefinanciacion'].'">'.$filaf['cod_fuentedefinanciacion'].' '.$filaf['fuentedefinanciacion'].' '.$filaf['tipofuentedefinanciacion'].'</option>';	
						}
					}
					?>
                                  </select><br>

                            </div>

                    	</div>
                    </div>
                    <div class="modal-footer">
    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	            <button type="submit" class="btn btn-primary"><strong>Actualizar</strong></button>
                    </div>
                    </form>
                </div>
<!--Ventana Editar Fuente finaliza aqui-->



<!--Aqui comienza la ventana Eliminar Fuente -->


                  <div id="eliFuente<?php echo $cod_proyecto; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form5" method="post" action="eliminar_tablafinanciera_fuente.php">
	                    <input type="hidden" name="cod_proyecto" value="<?php echo $cod_proyecto; ?>">
	                    <div class="modal-header">
        	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                	        <h3 id="myModalLabel">Eliminar Fuente de Financiacion</h3>
				<font color="red">Esta seguro que desea eliminar este registro?</font>
	                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $cod_proyecto; ?>"><br>

	    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	     	       <button type="submit" class="btn btn-primary"><strong>Eliminar</strong></button>
                            </div>

			</form>
		</div>
<!--Ventana Eliminar Fuente finaliza aqui-->


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