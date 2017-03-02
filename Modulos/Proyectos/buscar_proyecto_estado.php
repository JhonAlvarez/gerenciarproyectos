<?php 
	session_start();
	include_once "../php_conexion.php";
	include_once "class/class.php";
	include_once "../funciones.php";
	include_once "../class_buscar.php";
	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='b'){
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

    <?php if($_SESSION['tipo_user']=='a'){
    		include_once "../../menu/m_proyecto.php";
    	  }
    	  if($_SESSION['tipo_user']=='b'){
    		include_once "../../menu/m_proyecto_ub.php";
    	  }
    ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                   	 	<h1 align="center">Listado de Proyectos</h1>
                        <center>
                      	<form name="form3" method="post" action="" class="form-search">
                        	<div class="input-prepend input-append">
								<span class="add-on"><i class="icon-search"></i></span>
                        		<input type="text" name="buscar" autocomplete="off" class="input-xxlarge search-query" 
                                autofocus placeholder="Buscar por Codigo de Proyecto">
                            </div>
                            <button type="submit" class="btn" name="buton"><strong>Buscar</strong></button>
                    	</form>
                        </center>
                    </td>
                  </tr>
                </table>
                <div align="center">
			<strong>Buscar por Estado del Proyecto: </strong>

			<?php

			echo $buscaCod_estadodelproyecto=$_POST['cod_estadodelproyecto'];

			$id_estadodelproyecto=$buscaCod_estadodelproyecto;

				$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=$id_estadodelproyecto");

					while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){

						echo " - ".$filaestadodelproyecto['estadodelproyecto'];

					}

			?>

	                <a href="listado_proyecto.php"><strong>Nueva Busqueda</strong></a>
		<table>
		<tr>
		<td>
			<strong>Buscar por el municipio de: </strong>

				<form method="POST" action="buscar_proyecto_municipio.php">

                                  <select name="cod_municipio">

					<?php

					$consultamunicipio=mysql_query("SELECT * FROM municipios");

					while($filamunicipio=mysql_fetch_array($consultamunicipio)){

						echo '<option value="'.$filamunicipio['cod_municipio'].'">'.$filamunicipio['municipio'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>
		</td>

		<td>
			<strong>B. por Estado del Proyecto: </strong>

				<form method="POST" action="buscar_proyecto_estado.php">

                                  <select name="cod_estadodelproyecto">

					<?php

					$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto");

					while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){

						echo '<option value="'.$filaestadodelproyecto['cod_estadodelproyecto'].'">'.$filaestadodelproyecto['estadodelproyecto'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>

		</td>

		<td>
			<strong>Buscar por Supervisor: </strong>

				<form method="POST" action="buscar_proyecto_supervisor.php">

                                  <select name="cod_supervisor">

					<?php

					$consultasupervisor=mysql_query("SELECT * FROM personal");

					while($filasupervisor=mysql_fetch_array($consultasupervisor)){

						echo '<option value="'.$filasupervisor['Cedula'].'">'.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>

		</td>


		<td>
			<strong>Buscar por Politica: </strong>

				<form method="POST" action="buscar_proyecto_politica.php">

                                  <select name="cod_politica">

					<?php

					$consultapolitica=mysql_query("SELECT * FROM estrategiadelproyecto");

					while($filapolitica=mysql_fetch_array($consultapolitica)){

						echo '<option value="'.$filapolitica['cod_estrategiadelproyecto'].'">'.$filapolitica['estrategiadelproyecto'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>

		</td>

		<td>
			<strong>B. por Sector de Inversion: </strong>

				<form method="POST" action="buscar_proyecto_inversion.php">

                                  <select name="cod_sectordeinversion">

					<?php

					$consultasectordeinversion=mysql_query("SELECT * FROM sectordeinversion");

					while($filasectordeinversion=mysql_fetch_array($consultasectordeinversion)){

						echo '<option value="'.$filasectordeinversion['cod_sectordeinversion'].'">'.$filasectordeinversion['sectordeinversion'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>

		</td>

		<td>
			<strong>Buscar por Subsector: </strong>

				<form method="POST" action="buscar_proyecto_subsector.php">

                                  <select name="cod_subsector">

					<?php

					$consultasubsector=mysql_query("SELECT * FROM subsector");

					while($filasubsector=mysql_fetch_array($consultasubsector)){

						echo '<option value="'.$filasubsector['cod_subsector'].'">'.$filasubsector['subsector'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>

		</td>

		<td>
			<strong>Buscar por Ente Ejecutor: </strong>

				<form method="POST" action="buscar_proyecto_ente.php">

                                  <select name="cod_enteejecutor">

					<?php

					$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor");

					while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){

						echo '<option value="'.$filaenteejecutor['cod_enteejecutor'].'">'.$filaenteejecutor['enteejecutor'].'</option>';

					}

					?>

                                  </select>

				<input type="submit" value="Buscar">

				</form>

		</td>

		</tr>
		</table>
	                <!--<a href="#nuevo" role="button" class="btn" data-toggle="modal"><strong>Crear Nuevo Personal</strong></a>-->
                </div>
                
                <div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form1" method="post" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Crear Personal</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Cedula</strong><br>
                                <input type="text" name="Cedula" autocomplete="off" required value=""><br>
                                <strong>Nombres</strong><br>
                                <input type="text" name="Nombres" autocomplete="off" required value=""><br>
                                <strong>Apellidos</strong><br>
                                <input type="text" name="Apellidos" autocomplete="off" required value=""><br>
                                <strong>Celular</strong><br>
                                <input type="text" name="Celular" autocomplete="off" required value=""><br>
                            </div>
                            <div class="span6">
                                <strong>Cargo</strong><br>
                                <input type="text" name="Cargo" autocomplete="off" required value=""><br>
                                <strong>Profesion</strong><br>
                                <input type="text" name="Profesion" autocomplete="off" required value=""><br>
                                <strong>Especializacion</strong><br>
                                <input type="text" name="Especializacion" autocomplete="off" required value=""><br>
                                <strong>Email</strong><br>
                                <input type="text" name="Email" autocomplete="off" required value=""><br>
                            </div>
                    	</div>
                    </div>
                    <div class="modal-footer">
    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	            <button type="submit" class="btn btn-primary"><strong>Registrar Personal</strong></button>
                    </div>
                    </form>
                </div>
                
                <br>
                <?php 
					if(!empty($_POST['cod_proyecto'])){ 
						$cod_proyecto=limpiar($_POST['cod_proyecto']);
						$objetivoproyecto=limpiar($_POST['objetivoproyecto']);
						$municipio1=limpiar($_POST['municipio1']);
						$municipio2=limpiar($_POST['municipio2']);
						$estadodelproyecto=limpiar($_POST['estadodelproyecto']);
						$supervisor=limpiar($_POST['supervisor']);
						$estrategia=limpiar($_POST['estrategia']);
						$sectordeinversion=limpiar($_POST['sectordeinversion']);
						$subsector=limpiar($_POST['subsector']);
						$enteejecutor=limpiar($_POST['enteejecutor']);
						
						if(empty($_POST['cod_proyecto'])){
							$oProv=new Proceso_Proyecto('', $cod_proyecto, $objetivoproyecto, $municipio1, $municipio2, $estadodelproyecto, $supervisor, $estrategia, $sectordeinversion, $subsector, $enteejecutor);
							$oProv->crear();
							echo mensajes('El Registro "'.$cod_proyecto.'" fue Creado con Exito','verde');
						}else{
							$cod_proyecto=limpiar($_POST['cod_proyecto']);
							$oProveedor=new Proceso_Proyecto($cod_proyecto, $objetivoproyecto, $municipio1, $municipio2, $estadodelproyecto, $supervisor, $estrategia, $sectordeinversion, $subsector, $enteejecutor);
							$oProveedor->actualizar();
							echo mensajes('El Registro "'.$cod_proyecto.'" fue Actualizado con Exito','verde');
						}
					}
				?>
                <table class="table table-bordered">
                  <tr class="well">
                    <td><strong>Codigo Proyecto</strong></td>
                    <td><strong>Objeto del Proyecto</strong></td>
                    <td><strong>Municipio 1</strong></td>
                    <td><strong>Municipio 2</strong></td>
                    <td><strong>Estado del Proyecto</strong></td>
                    <td><strong>Supervisor</strong></td>
                    <td><strong>Politica</strong></td>
                    <td><strong>Sector de Inversion</strong></td>
                    <td><strong>Subsector</strong></td>
                    <td><strong>Ente Ejecutor</strong></td>
                    <td><strong>Editar</strong></td>
                    <td><strong>Agregar Meta</strong></td>
                  </tr>
				  <?php 
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysql_query("SELECT * FROM proyectos WHERE cod_proyecto and (cod_proyecto='$buscar' or estadodelproyecto LIKE '%$buscar%') ORDER BY cod_proyecto DESC");	
						/* determinar el número de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}else{
						$pame=mysql_query("SELECT * FROM proyectos WHERE estadodelproyecto=$buscaCod_estadodelproyecto ORDER BY cod_proyecto DESC");		
						/* determinar el número de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}		
					while($row=mysql_fetch_array($pame)){
				  ?>
                  <tr>
                    <td><?php echo $row['cod_proyecto']; ?></td>
                    <td><?php echo $row['objetivoproyecto']; ?></td>
			<td>
			<?php
				$id_municipio=$row['municipio1'];
				$consultamunicipio=mysql_query("SELECT * FROM municipios WHERE cod_municipio=$id_municipio");
					while($filamunicipio=mysql_fetch_array($consultamunicipio)){
						echo $filamunicipio['municipio'];
					}
			?>
			</td>

			<td>
			<?php
				$id_municipio=$row['municipio2'];
				$consultamunicipio=mysql_query("SELECT * FROM municipios WHERE cod_municipio=$id_municipio");
					while($filamunicipio=mysql_fetch_array($consultamunicipio)){
						echo $filamunicipio['municipio'];
					}
			?>
			</td>

			<td>
			<?php
				$id_estadodelproyecto=$row['estadodelproyecto'];
				$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=$id_estadodelproyecto");
					while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
						echo $filaestadodelproyecto['estadodelproyecto'];
					}
			?>
			</td>

			<td>
			<?php
				$id_supervisor=$row['supervisor'];
				$consultasupervisor=mysql_query("SELECT * FROM personal WHERE Cedula=$id_supervisor");
					while($filasupervisor=mysql_fetch_array($consultasupervisor)){
						echo $filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'];
					}
			?>
			</td>

			<td>
			<?php
				$id_estrategiadelproyecto=$row['estrategia'];
				$consultaestrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto WHERE cod_estrategiadelproyecto=$id_estrategiadelproyecto");
					while($filaestrategiadelproyecto=mysql_fetch_array($consultaestrategiadelproyecto)){
						echo $filaestrategiadelproyecto['estrategiadelproyecto'];
					}
			?>
			</td>

			<td>
			<?php
				$id_sectordeinversion=$row['sectordeinversion'];
				$consultasectordeinversion=mysql_query("SELECT * FROM sectordeinversion WHERE cod_sectordeinversion=$id_sectordeinversion");
					while($filasectordeinversion=mysql_fetch_array($consultasectordeinversion)){
						echo $filasectordeinversion['sectordeinversion'];
					}
			?>
			</td>

			<td>
			<?php
				$id_subsector=$row['subsector'];
				$consultasubsector=mysql_query("SELECT * FROM subsector WHERE cod_subsector=$id_subsector");
					while($filasubsector=mysql_fetch_array($consultasubsector)){
						echo $filasubsector['subsector'];
					}
			?>
			</td>

			<td>
			<?php
				$id_enteejecutor=$row['enteejecutor'];
				$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor WHERE cod_enteejecutor=$id_enteejecutor");
					while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){
						echo $filaenteejecutor['enteejecutor'];
					}
			?>
			</td>


                    <td>
                    	<center>
                            <a href="#act<?php echo $row['cod_proyecto']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-edit"></i>
                            </a>
                        </center>
                    </td>

                    <td>
                    	<center>
			<form method="POST" action="agregar_meta.php">
				<?php
				 echo '<input type="hidden" name="cod_proyecto" value="'.$row['cod_proyecto'].'">';
				?>
				<input type="submit" value="Agregar Meta">
			</form>
                        </center>
                    </td>
                  </tr>
                  <div id="act<?php echo $row['cod_proyecto']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="">
                    <input type="hidden" name="cod_proyecto" value="<?php echo $row['cod_proyecto']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Proyecto</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo del Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required value="<?php echo $row['cod_proyecto']; ?>"><br>
                                <strong>Objetivo del Proyecto</strong><br>
                                <input type="text" name="objetivoproyecto" autocomplete="off" required value="<?php echo $row['objetivoproyecto']; ?>"><br>


                                <strong>Municipio 1</strong><br>
                                  <select name="municipio1">
					<?php
					$paMunicipio=mysql_query("SELECT * FROM municipios");
					while($filamunicipio=mysql_fetch_array($paMunicipio)){
						if($filamunicipio['cod_municipio']==$row['municipio1']){
							echo '<option value="'.$filamunicipio['cod_municipio'].'" selected>'.$filamunicipio['municipio'].'</option>';
						}else{
							echo '<option value="'.$filamunicipio['cod_municipio'].'">'.$filamunicipio['municipio'].'</option>';	
						}
					}
					?>
                                  </select><br>


                                <strong>Municipio 2</strong><br>
			
                                  <select name="municipio2">
					<?php
					$paMunicipio2=mysql_query("SELECT * FROM municipios");
					while($filamunicipio2=mysql_fetch_array($paMunicipio2)){
						if($filamunicipio2['cod_municipio']==$row['municipio2']){
							echo '<option value="'.$filamunicipio2['cod_municipio'].'" selected>'.$filamunicipio2['municipio'].'</option>';
						}else{
							echo '<option value="'.$filamunicipio2['cod_municipio'].'">'.$filamunicipio2['municipio'].'</option>';	
						}
					}
					?>
                                  </select><br>


                                <strong>Estado del Proyecto</strong><br>
                                  <select name="estadodelproyecto">
					<?php
					$paEstadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto");
					while($filaestadodelproyecto=mysql_fetch_array($paEstadodelproyecto)){
						if($filaestadodelproyecto['cod_estadodelproyecto']==$row['estadodelproyecto']){
							echo '<option value="'.$filaestadodelproyecto['cod_estadodelproyecto'].'" selected>'.$filaestadodelproyecto['estadodelproyecto'].'</option>';
						}else{
							echo '<option value="'.$filaestadodelproyecto['cod_estadodelproyecto'].'">'.$filaestadodelproyecto['estadodelproyecto'].'</option>';	
						}
					}
					?>
                                  </select><br>

                            </div>
                            <div class="span6">
                                <strong>Supervisor</strong><br>
                                  <select name="supervisor">
					<?php
					$paSupervisor=mysql_query("SELECT * FROM personal");
					while($filasupervisor=mysql_fetch_array($paSupervisor)){
						if($filasupervisor['Cedula']==$row['supervisor']){
							echo '<option value="'.$filasupervisor['Cedula'].'" selected>'.$filasupervisor['Nombres'].' '.$filasupervisor['Nombres'].'</option>';
						}else{
							echo '<option value="'.$filasupervisor['Cedula'].'">'.$filasupervisor['estadodelproyecto'].' '.$filasupervisor['Nombres'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Politica</strong><br>
                                  <select name="estrategia">
					<?php
					$paEstrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto");
					while($filaestrategiadelproyecto=mysql_fetch_array($paEstrategiadelproyecto)){
						if($filaestrategiadelproyecto['cod_estrategiadelproyecto']==$row['estrategia']){
							echo '<option value="'.$filaestrategiadelproyecto['cod_estrategiadelproyecto'].'" selected>'.$filaestrategiadelproyecto['estrategiadelproyecto'].'</option>';
						}else{
							echo '<option value="'.$filaestrategiadelproyecto['cod_estrategiadelproyecto'].'">'.$filaestrategiadelproyecto['estrategiadelproyecto'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Sector de Inversion</strong><br>
                                  <select name="sectordeinversion">
					<?php
					$paSectordeinversion=mysql_query("SELECT * FROM sectordeinversion");
					while($filasectordeinversion=mysql_fetch_array($paSectordeinversion)){
						if($filasectordeinversion['cod_sectordeinversion']==$row['sectordeinversion']){
							echo '<option value="'.$filasectordeinversion['cod_sectordeinversion'].'" selected>'.$filasectordeinversion['sectordeinversion'].'</option>';
						}else{
							echo '<option value="'.$filasectordeinversion['cod_sectordeinversion'].'">'.$filasectordeinversion['sectordeinversion'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Subsector</strong><br>
                                  <select name="subsector">
					<?php
					$paSubsector=mysql_query("SELECT * FROM subsector");
					while($filasubsector=mysql_fetch_array($paSubsector)){
						if($filasubsector['cod_subsector']==$row['subsector']){
							echo '<option value="'.$filasubsector['cod_subsector'].'" selected>'.$filasubsector['subsector'].'</option>';
						}else{
							echo '<option value="'.$filasubsector['cod_subsector'].'">'.$filasubsector['subsector'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Ente Ejecutor</strong><br>
                                  <select name="enteejecutor">
					<?php
					$paEnteejecutor=mysql_query("SELECT * FROM enteejecutor");
					while($filaenteejecutor=mysql_fetch_array($paEnteejecutor)){
						if($filaenteejecutor['cod_enteejecutor']==$row['enteejecutor']){
							echo '<option value="'.$filaenteejecutor['cod_enteejecutor'].'" selected>'.$filaenteejecutor['enteejecutor'].'</option>';
						}else{
							echo '<option value="'.$filaenteejecutor['cod_enteejecutor'].'">'.$filaenteejecutor['enteejecutor'].'</option>';	
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
                  <?php } ?>
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