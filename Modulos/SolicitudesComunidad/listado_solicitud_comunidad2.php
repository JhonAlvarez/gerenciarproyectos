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

    <?php include_once "../../menu/m_solicitudescomunidad.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                   	 	<h1 align="center">Solicitudes de la Comunidad</h1>
                        <center>
                      	<form name="form3" method="post" action="" class="form-search">
                        	<div class="input-prepend input-append">
								<span class="add-on"><i class="icon-search"></i></span>
                        		<input type="text" name="buscar" autocomplete="off" class="input-xxlarge search-query" 
                                autofocus placeholder="Buscar por Num de radicado AIM">
                            </div>
                            <button type="submit" class="btn" name="buton"><strong>Buscar</strong></button>
                    	</form>
                        </center>
                    </td>
                  </tr>
                </table>
                <div align="right">
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
					if(!empty($_POST['cod_radicado'])){ 
						$cod_radicado=limpiar($_POST['cod_radicado']);			
						$fecha_solicitud=limpiar($_POST['fecha_solicitud']);			
						$cod_radicado_gobernacion=limpiar($_POST['cod_radicado_gobernacion']);
						$contestada=limpiar($_POST['contestada']);
						$cod_municipio=limpiar($_POST['cod_municipio']);
						$asunto_solicitud=limpiar($_POST['asunto_solicitud']);
						$sector=limpiar($_POST['sector']);
						$remitidopor=limpiar($_POST['remitidopor']);
						$nombrepeticionario=limpiar($_POST['nombrepeticionario']);
						$cargopeticionario=limpiar($_POST['cargopeticionario']);
						$telefono=limpiar($_POST['telefono']);
						$direccion=limpiar($_POST['direccion']);
						$barrio=limpiar($_POST['barrio']);
						$email=limpiar($_POST['email']);
						$radicadorespuesta=limpiar($_POST['radicadorespuesta']);
						$entregarespuesta=limpiar($_POST['entregarespuesta']);
						$observaciones=limpiar($_POST['observaciones']);
						
						if(empty($_POST['cod_radicado'])){
							$oProv=new Proceso_Solicitud('', $cod_radicado, $fecha_solicitud, $cod_radicado_gobernacion, $contestada, $cod_municipio, $asunto_solicitud, $sector, $remitidopor, $nombrepeticionario, $cargopeticionario, $telefono, $direccion, $barrio, $email, $radicadorespuesta, $entregarespuesta, $observaciones);
							$oProv->crear();
							echo mensajes('Registro '.$cod_radicado.' Creado con Exito','verde');
						}else{
							$cod_radicado=limpiar($_POST['$cod_radicado']);
							$oProveedor=new Proceso_Solicitud($cod_radicado, $fecha_solicitud, $cod_radicado_gobernacion, $contestada, $cod_municipio, $asunto_solicitud, $sector, $remitidopor, $nombrepeticionario, $cargopeticionario, $telefono, $direccion, $barrio, $email, $radicadorespuesta, $entregarespuesta, $observaciones);
							$oProveedor->actualizar();
							echo mensajes('Registro '.$cod_radicado.' Actualizado con Exito','verde');
						}
					}
				?>
                <table class="table table-bordered">
                  <tr class="well">
                    <td><strong>Num Radicado AIM</strong></td>
                    <td><strong>Fecha solicitud</strong></td>
                    <td><strong>Num Radicado Gobernacion</strong></td>
                    <td><strong>Contestada</strong></td>
                    <td><strong>Municipio</strong></td>
                    <td><strong>Asunto de la solicitud</strong></td>
                    <td><strong>Sector</strong></td>
                    <td><strong>Remitido por</strong></td>
                    <td><strong>Nombre Peticionario</strong></td>
                    <td><strong>Cargo Peticionario</strong></td>
                    <td><strong>Telefono</strong></td>
                    <td><strong>Direccion</strong></td>
                    <td><strong>Barrio</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Radicado de la respuesta</strong></td>
                    <td><strong>Via entrega respuesta</strong></td>
                    <td><strong>Observaciones</strong></td>
                  </tr>
				  <?php 
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysql_query("SELECT * FROM solicitudescomunidad WHERE cod_radicado LIKE '%$buscar%' ORDER BY cod_radicado DESC");	
					}else{
						$pame=mysql_query("SELECT * FROM solicitudescomunidad ORDER BY cod_radicado DESC");		
					}		
					while($row=mysql_fetch_array($pame)){
				  ?>
                  <tr>
                    <td><?php echo $row['cod_radicado']; ?></td>
                    <td><?php echo $row['fecha_solicitud']; ?></td>
                    <td><?php echo $row['cod_radicado_gobernacion']; ?></td>
                    <td><?php echo $row['contestada']; ?></td>
                    <td><?php echo $row['cod_municipio']; ?></td>
                    <td><?php echo $row['asunto_solicitud']; ?></td>
                    <td><?php echo $row['sector']; ?></td>
                    <td><?php echo $row['remitidopor']; ?></td>
                    <td><?php echo $row['nombrepeticionario']; ?></td>
                    <td><?php echo $row['cargopeticionario']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['barrio']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['radicadorespuesta']; ?></td>
                    <td><?php echo $row['entregarespuesta']; ?></td>
                    <td><?php echo $row['observaciones']; ?></td>
                    <td>
                    	<center>
                            <a href="#act<?php echo $row['cod_radicado']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-edit"></i>
                            </a>
                        </center>
                    </td>
                  </tr>
                  <div id="act<?php echo $row['cod_radicado']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="">
                    <input type="hidden" name="cod_radicado" value="<?php echo $row['cod_radicado']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar solicitud</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Num Radicado AIM</strong><br>
                                <input type="text" name="cod_radicado" autocomplete="off" required value="<?php echo $row['cod_radicado']; ?>"><br>
                                <strong>Fecha de Solicitud (AAAA-MM-DD)</strong><br>
                                <input type="text" name="fecha_solicitud" autocomplete="off" required value="<?php echo $row['fecha_solicitud']; ?>"><br>
                                <strong>Numero de Radicado Gobernacion</strong><br>
                                <input type="text" name="cod_radicado_gobernacion" autocomplete="off" required value="<?php echo $row['cod_radicado_gobernacion']; ?>"><br>
                                <strong>Subir medio digital</strong><br>

                                <strong>Contestada (1 / 0)</strong><br>
                                <input type="text" name="contestada" autocomplete="off" required value="<?php echo $row['contestada']; ?>"><br>
                                <strong>Municipio</strong><br>
                                <input type="text" name="cod_municipio" autocomplete="off" required value="<?php echo $row['cod_municipio']; ?>"><br>
                                <strong>Asunto de la solicitud</strong><br>
                                <input type="text" name="asunto_solicitud" autocomplete="off" required value="<?php echo $row['asunto_solicitud']; ?>"><br>
                                <strong>Sector</strong><br>
                                <input type="text" name="sector" autocomplete="off" required value="<?php echo $row['sector']; ?>"><br>
                                <strong>Remitido por (Institucion)</strong><br>
                                <input type="text" name="remitidopor" autocomplete="off" required value="<?php echo $row['remitidopor']; ?>"><br>
                            </div>
                            <div class="span6">
                                <strong>Nombre del Peticionario</strong><br>
                                <input type="text" name="nombrepeticionario" autocomplete="off" required value="<?php echo $row['nombrepeticionario']; ?>"><br>
                                <strong>Cargo del Peticionario</strong><br>
                                <input type="text" name="cargopeticionario" autocomplete="off" required value="<?php echo $row['cargopeticionario']; ?>"><br>
                                <strong>Telefono</strong><br>
                                <input type="text" name="telefono" autocomplete="off" required value="<?php echo $row['telefono']; ?>"><br>
                                <strong>Direccion</strong><br>
                                <input type="text" name="direccion" autocomplete="off" required value="<?php echo $row['direccion']; ?>"><br>
                                <strong>Barrio</strong><br>
                                <input type="text" name="barrio" autocomplete="off" required value="<?php echo $row['barrio']; ?>"><br>
                                <strong>Email</strong><br>
                                <input type="text" name="email" autocomplete="off" required value="<?php echo $row['email']; ?>"><br>
                                <strong>Codigo del Radicado Respuesta</strong><br>
                                <input type="text" name="radicadorespuesta" autocomplete="off" required value="<?php echo $row['radicadorespuesta']; ?>"><br>
                                <strong>Via entrega de la respuesta</strong><br>
                                <input type="text" name="entregarespuesta" autocomplete="off" required value="<?php echo $row['entregarespuesta']; ?>"><br>
                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off" required value="<?php echo $row['observaciones']; ?>"><br>
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
