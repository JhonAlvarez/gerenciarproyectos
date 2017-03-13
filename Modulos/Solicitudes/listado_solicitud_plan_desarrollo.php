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
    <title>Listado</title>
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

    <?php include_once "../../menu/m_solicitudplandedesarrollo.php"; ?>

	<div align="center">
    <br>
    <br>
    <br>
    <h1 align="center">Solicitudes Plan de Desarrollo</h1>
                        <center>
                        <form name="form3" method="post" action="" class="form-search">
                            <div class="input-prepend input-append">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input type="hidden" name="buscar" autocomplete="off" class="input-xxlarge search-query" 
                                autofocus placeholder="Buscar por Num de solicitud">
                            </div>
                            <button type="submit" class="btn" name="buton"><strong>Buscar</strong></button>
                        </form>
                        </center>
    	<table width="90%">
          <tr>
            <td>
            	
                <div align="right">
		<table>
		<tr>
		<td>
			<strong>Buscar por el municipio de: </strong>
				<form method="POST" action="buscar_solicitud_plan_desarrollo_municipio.php">
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
			<strong>Buscar por Sector: </strong>
				<form method="POST" action="buscar_solicitud_plan_desarrollo_sector.php">
                                  <select name="cod_sector">
					<?php
					$consultasector=mysql_query("SELECT * FROM sectores");
					while($filasector=mysql_fetch_array($consultasector)){
						echo '<option value="'.$filasector['cod_sector'].'">'.$filasector['sector'].'</option>';
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
					if(!empty($_POST['cod_solicitudplan'])){ 
						$cod_solicitudplan=limpiar($_POST['cod_solicitudplan']);			
						$cod_municipio=limpiar($_POST['cod_municipio']);
						$sectordelproyecto=limpiar($_POST['sectordelproyecto']);
						$objetivoyubicacion=limpiar($_POST['objetivoyubicacion']);
						$afectacion=limpiar($_POST['afectacion']);
						$fase=limpiar($_POST['fase']);
						$valorproyecto=limpiar($_POST['valorproyecto']);
						
						if(empty($_POST['cod_solicitudplan'])){
							$oProv=new Proceso_Solicitud('', $cod_solicitudplan, $cod_municipio, $sectordelproyecto, $objetivoyubicacion, $afectacion, $fase, $valorproyecto);
							$oProv->crear();
							echo mensajes('Registro "'.$cod_solicitudplan.'" Creado con Exito','verde');
						}else{
							$cod_solicitudplan=limpiar($_POST['cod_solicitudplan']);
							$oProveedor=new Proceso_Solicitud($cod_solicitudplan, $cod_municipio, $sectordelproyecto, $objetivoyubicacion, $afectacion, $fase, $valorproyecto);
							$oProveedor->actualizar();
							echo mensajes('Registro "'.$cod_solicitudplan.'" Actualizado con Exito','verde');
						}
					}
				?>
                <table class="table table-bordered">
                  <tr class="well">
                    <td><strong>Num Solicitud Plan</strong></td>
                    <td><strong>Municipio</strong></td>
                    <td><strong>Sector del Proyecto</strong></td>
                    <td><strong>Objetivo y Ubicacion del Proyecto</strong></td>
                    <td><strong>Afectacion</strong></td>
                    <td><strong>Fase</strong></td>
                    <td><strong>Valor del Proyecto</strong></td>
                  </tr>


				  <?php 
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysql_query("SELECT * FROM solicitudesplandedesarrollo WHERE cod_solicitudplan and (cod_solicitudplan='$buscar' or cod_municipio LIKE '%$buscar%') ORDER BY cod_solicitudplan DESC");	
						/* determinar el número de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}else{
						$pame=mysql_query("SELECT * FROM solicitudesplandedesarrollo ORDER BY cod_solicitudplan DESC");		
						/* determinar el número de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}		
					while($row=mysql_fetch_array($pame)){
				  ?>
                  <tr>
                    <td >


                    <button data-toggle="modal" data-target="#act<?php echo $row['cod_solicitudplan']; ?>" class="btn-link"> <?php echo $row['cod_solicitudplan']; ?> 
                    </button>

                    </td> 
			<td>
			    <?php
				$id_municipio=$row['cod_municipio'];
				$consultamunicipio=mysql_query("SELECT * FROM municipios WHERE cod_municipio=$id_municipio");
					while($filamunicipio=mysql_fetch_array($consultamunicipio)){
						echo $filamunicipio['municipio'];
					}
					?>
			</td>

			<td>
			    <?php
				$id_sector=$row['sectordelproyecto'];
				$consultasector=mysql_query("SELECT * FROM sectores WHERE cod_sector=$id_sector");
					while($filasector=mysql_fetch_array($consultasector)){
						echo $filasector['sector'];
					}
					?>
			</td>

                    <td><?php echo $row['objetivoyubicacion']; ?></td>
                    <td><?php echo $row['afectacion']; ?></td>
			<td>
			    <?php
				$id_fase=$row['fase'];
				$consultafase=mysql_query("SELECT * FROM fases WHERE cod_fase=$id_fase");
					while($filafase=mysql_fetch_array($consultafase)){
						echo $filafase['fase'];
					}
					?>
			</td>
                    <td><?php echo $s.''.formato($row['valorproyecto']) ?></td>


                   
                  </tr>




        <!--
Ventana editar 
        -->
                  <div id="act<?php echo $row['cod_solicitudplan']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="">
                    <input type="hidden" name="cod_solicitudplan" value="<?php echo $row['cod_solicitudplan']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Solicitud Plan de Desarrollo</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Num Solicitud Plan</strong><br>
                                <input type="text" name="cod_solicitudplan" autocomplete="off" required readonly value="<?php echo $row['cod_solicitudplan']; ?>"><br>
                                <strong>Municipio</strong><br>
                                  <select name="cod_municipio">
					<?php
					$paMunicipio=mysql_query("SELECT * FROM municipios");
					while($filamunicipio=mysql_fetch_array($paMunicipio)){
						if($filamunicipio['cod_municipio']==$row['cod_municipio']){
							echo '<option value="'.$filamunicipio['cod_municipio'].'" selected>'.$filamunicipio['municipio'].'</option>';
						}else{
							echo '<option value="'.$filamunicipio['cod_municipio'].'">'.$filamunicipio['municipio'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Sector del Proyecto</strong><br>
                                  <select name="sectordelproyecto">
					<?php
					$paSector=mysql_query("SELECT * FROM sectores");
					while($filasector=mysql_fetch_array($paSector)){
						if($filasector['cod_sector']==$row['sectordelproyecto']){
							echo '<option value="'.$filasector['cod_sector'].'" selected>'.$filasector['sector'].'</option>';
						}else{
							echo '<option value="'.$filasector['cod_sector'].'">'.$filasector['sector'].'</option>';	
						}
					}
					?>
                                  </select><br>



                                <strong>Objetivo y ubicacion del proyecto</strong><br>
                                <input type="text" name="objetivoyubicacion" autocomplete="off" required value="<?php echo $row['objetivoyubicacion']; ?>"><br>
                            </div>
                            <div class="span6">
                                <strong>Afectacion</strong><br>
                                <input type="text" name="afectacion" autocomplete="off" value="<?php echo $row['afectacion']; ?>"><br>
                                <strong>Fase</strong><br>
                                  <select name="fase">
					<?php
					$paFase=mysql_query("SELECT * FROM fases");
					while($filafase=mysql_fetch_array($paFase)){
						if($filafase['cod_fase']==$row['fase']){
							echo '<option value="'.$filafase['cod_fase'].'" selected>'.$filafase['fase'].'</option>';
						}else{
							echo '<option value="'.$filafase['cod_fase'].'">'.$filafase['fase'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Valor del Proyecto</strong><br>
                                <input type="text" name="valorproyecto" autocomplete="off" value="<?php echo $row['valorproyecto']; ?>"><br>
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
