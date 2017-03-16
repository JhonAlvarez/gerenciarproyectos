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
      <link rel="stylesheet" type="text/css" href="../../css/stylo.css">

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
	<br>
    <br>
    <br>
	<h1 align="center">Listado de Proyectos</h1>
                        <center>
                      	<form name="form3" method="post" action="" class="form-search">
                        	<div class="input-prepend input-append">
								<span class="add-on"><i class="icon-search"></i></span>
                        		<input type="text" name="buscar" autocomplete="on" class="input-xxlarge search-query" 
                                autofocus placeholder="Ingrese su Busqueda">
                            </div>
                            <button type="submit" class="btn" name="buton"><strong>Buscar</strong></button>
                    	</form>
                    	<!--<form method="POST" action="buscar_proyecto_municipio.php">-->
                    	<form method="POST" action="buscador.php">
							<div class="row">
								<div class="col-md-4">
									<strong>Seleccione Municipio: </strong><br>
								    <select name="cod_municipio">

										<?php

											$consultamunicipio=mysql_query("SELECT * FROM municipios");
											echo "<option value=0 selected>Todos</option>";
											while($filamunicipio=mysql_fetch_array($consultamunicipio)){

												echo '<option value="'.$filamunicipio['cod_municipio'].'">'.$filamunicipio['municipio'].'</option>';

											}

											?>

				                    </select>

		                    	</div>
		                    	<div class="col-md-4">
		                    		<strong>Seleccione Estado(s) del Proyecto: </strong><br>
		                    		

										<?php

											$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto");
											echo "<input type=checkbox name=0 value=0>Todos<br>";
											echo "-------------<br>";
											while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){

												//echo '<option value="'.$filaestadodelproyecto['cod_estadodelproyecto'].'">'.$filaestadodelproyecto['estadodelproyecto'].'</option>';
												echo "<input type=checkbox name='".$filaestadodelproyecto['cod_estadodelproyecto']."' value=".$filaestadodelproyecto['cod_estadodelproyecto'].">".$filaestadodelproyecto['estadodelproyecto']."<br>";
											}

										?>

		                    		
		                    		
		                    	</div>
		                    	<div class="col-md-4">
		                    		<strong>Seleccione Supervisor: </strong><br>
		                    		<select name="cod_supervisor">

										<?php

											$consultasupervisor=mysql_query("SELECT * FROM personal");
											echo "<option value=0 selected>Todos</option>";
											while($filasupervisor=mysql_fetch_array($consultasupervisor)){

												echo '<option value="'.$filasupervisor['Cedula'].'">'.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</option>';

											}

										?>

		                            </select>
		                    		
		                    	</div>
		                    </div>
		                    <input type="submit" value="buscar">
						</form>
                    	</center>
    	<table width="95%">
          <tr>
            <td>
                
                
                <table class="table table-bordered" align="center" style="width:95%">
                  <tr class="well">
                    <td style="width:2%"> <strong>Codigo Proyecto</strong></td>
                    <td style="width:8%"><strong>Objeto del Proyecto</strong></td>
                    <td style="width:2%"><strong>Municipio </strong></td>
                    <td style="width:2%"><strong>Estado del Proyecto</strong></td>
                    <td style="width:2%" ><strong>Supervisor</strong></td>
                    <td style="width:2%"><strong>Meta</strong></td>
                    
                  </tr>


				  <?php 
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysql_query("SELECT * FROM proyectos WHERE cod_proyecto  LIKE '%$buscar%' OR objetivoproyecto  LIKE '%$buscar%'");	
						/* determinar el número de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Ses encontraron ".$cantRegistros." registros</strong>";

					}else{
						$pame=mysql_query("SELECT * FROM proyectos ORDER BY cod_proyecto DESC");		
						/* determinar el número de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}		
					while($row=mysql_fetch_array($pame)){
				  ?>
                  <tr>
                    <td style="width:2%">


                    
                    <button  data-toggle="modal" data-target="#act<?php echo $row['cod_proyecto']; ?>" class="btn-link"><?php echo $row['cod_proyecto']; ?></button>   
                    

                    <!--
						Editar 
                    -->
                    	


                    </td>
                    <td style="width:8%"><?php echo $row['objetivoproyecto']; ?></td>
			<td style="width:2%">
			<?php
				$id_municipio=$row['municipio1'];
				$consultamunicipio=mysql_query("SELECT * FROM municipios WHERE cod_municipio=$id_municipio");
					while($filamunicipio=mysql_fetch_array($consultamunicipio)){
						echo $filamunicipio['municipio'];
					}
			?>
			</td>

		
			<td style="width:2%">
			<?php
				$id_estadodelproyecto=$row['estadodelproyecto'];
				$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=$id_estadodelproyecto");
					while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
						echo $filaestadodelproyecto['estadodelproyecto'];
					}
			?>
			</td>

			<td style="width:2%">
			<?php
				$id_supervisor=$row['supervisor'];
				$consultasupervisor=mysql_query("SELECT * FROM personal WHERE Cedula=$id_supervisor");
					while($filasupervisor=mysql_fetch_array($consultasupervisor)){
						echo $filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'];
					}
			?>
			</td>
<!--
			<td>
			<?php
				$id_estrategiadelproyecto=$row['estrategia'];
				$consultaestrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto WHERE cod_estrategiadelproyecto=$id_estrategiadelproyecto");
					while($filaestrategiadelproyecto=mysql_fetch_array($consultaestrategiadelproyecto)){
						echo $filaestrategiadelproyecto['estrategiadelproyecto'];
					}
			?>
			</td>
-->

<!--
			<td>
			<?php
				$id_sectordeinversion=$row['sectordeinversion'];
				$consultasectordeinversion=mysql_query("SELECT * FROM sectordeinversion WHERE cod_sectordeinversion=$id_sectordeinversion");
					while($filasectordeinversion=mysql_fetch_array($consultasectordeinversion)){
						echo $filasectordeinversion['sectordeinversion'];
					}
			?>
			</td>
-->

<!--
			<td>
			<?php
				$id_subsector=$row['subsector'];
				$consultasubsector=mysql_query("SELECT * FROM subsector WHERE cod_subsector=$id_subsector");
					while($filasubsector=mysql_fetch_array($consultasubsector)){
						echo $filasubsector['subsector'];
					}
			?>
			</td>
-->
<!--
			<td>
			<?php
				$id_enteejecutor=$row['enteejecutor'];
				$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor WHERE cod_enteejecutor=$id_enteejecutor");
					while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){
						echo $filaenteejecutor['enteejecutor'];
					}
			?>
			</td>
-->

<td style="width:2%">
                    	<center>
			<form method="POST" action="agregar_meta.php">
				<?php
				 echo '<input type="hidden" name="cod_proyecto" value="'.$row['cod_proyecto'].'">';
				?>
				<input type="submit" value="...">
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


                                <strong>Municipio </strong><br>
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
						if($filasectordeinversion['cod_sectordeinversion']==$row['sec
							tordeinversion']){
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