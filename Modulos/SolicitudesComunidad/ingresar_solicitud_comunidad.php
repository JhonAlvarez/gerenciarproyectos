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
	if(!empty($_GET['codigo'])){
		$id_codigo=limpiar($_GET['codigo']);
		$id_codigo=substr($id_codigo,10);
		$id_codigo=decrypt($id_codigo,'URLCODIGO');
		
		$pa=mysql_query("SELECT * FROM producto WHERE codigo='$id_codigo'");				
		if($row=mysql_fetch_array($pa)){
			$existe=TRUE;
			$nombre_producto=$row['nombre'];
		}else{
			$existe=FALSE;	
		}
	}else{
		$existe=FALSE;	
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Solicitudes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Chalxsoft">

    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 30px;
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
    	<table width="70%" heigth="300%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Solicitudes de la Comunidad</h2>
                        <?php 
							if($existe==TRUE){ 
								$url1=cadenas().encrypt($id_codigo,'URLCODIGO');
						?>
                        	<h2 align="center">Personal [<?php echo $nombre_producto; ?>]</h2>
                        	<center>
                                <div class="btn-group">
                                    <a href="crear_producto.php?codigo=<?php echo $url1; ?>" class="btn"><strong> [ Producto ] </strong></a>
                                    <a href="inventario.php?codigo=<?php echo $url1; ?>" class="btn"><strong> [ Inventario ] </strong></a>
                                    <a href="crear_personal.php?codigo=<?php echo $url1; ?>" class="btn btn-primary"><strong> [ Personal ] </strong></a>
                                </div>
                            </center>
						<?php }	?>
                 
                	<form name="form2" method="post" action="" align="center">
                    
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                            	<strong>Numero de Radicado AIM</strong><br>
                                <input type="text" name="cod_radicado" autocomplete="off" required><br>
                            	<strong>Fecha de Solicitud (AAAA-MM-DD)</strong><br>
                                <input type="text" name="fecha_solicitud" autocomplete="off" required><br>
                                <strong>Numero de Radicado Gobernacion</strong><br>
                                <input type="text" name="cod_radicado_gobernacion" autocomplete="off"><br>
                                <strong>Contestada (Si / No)</strong><br>
                                  <select name="contestada">
					<?php
					$consultacontestada=mysql_query("SELECT * FROM contestada");
					while($filacontestada=mysql_fetch_array($consultacontestada)){
						echo '<option value="'.$filacontestada['cod_contestada'].'">'.$filacontestada['contestada'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Municipio</strong><br>
                                  <select name="cod_municipio">
					<?php
					$consultamunicipio=mysql_query("SELECT * FROM municipios");
					while($filamunicipio=mysql_fetch_array($consultamunicipio)){
						echo '<option value="'.$filamunicipio['cod_municipio'].'">'.$filamunicipio['municipio'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Asunto de la solicitud</strong><br>
                                <input type="text" name="asunto_solicitud" autocomplete="off" required><br>

                                <strong>Sector</strong><br>
                                  <select name="sector">
					<?php
					$consultasector=mysql_query("SELECT * FROM sectores");
					while($filasector=mysql_fetch_array($consultasector)){
						echo '<option value="'.$filasector['cod_sector'].'">'.$filasector['sector'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Remitido por (Institucion)</strong><br>
                                  <select name="remitido">
					<?php
					$consultaremitido=mysql_query("SELECT * FROM remitidos");
					while($filaremitido=mysql_fetch_array($consultaremitido)){
						echo '<option value="'.$filaremitido['cod_remitido'].'">'.$filaremitido['remitido'].'</option>';
					}
					?>
                                  </select>
				<br>
                            	<strong>Nombre del Peticionario</strong><br>
                                <input type="text" name="nombrepeticionario" autocomplete="off"><br>
                            </div>
                            <div class="span6">
                                <strong>Cargo del Peticionario</strong><br>
                                <input type="text" name="cargopeticionario" autocomplete="off"><br>
                                <strong>Telefono</strong><br>
                                <input type="text" name="telefono" autocomplete="off"><br>
                                <strong>Direccion</strong><br>
                                <input type="text" name="direccion" autocomplete="off"><br>
                                <strong>Barrio</strong><br>
                                <input type="text" name="barrio" autocomplete="off"><br>
                                <strong>Email</strong><br>
                                <input type="text" name="email" autocomplete="off"><br>
                                <strong>Codigo del Radicado Respuesta</strong><br>
                                <input type="text" name="radicadorespuesta" autocomplete="off"><br>
                                <strong>Via entrega de la respuesta</strong><br>
                                <input type="text" name="entregarespuesta" autocomplete="off"><br>
                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off"><br>
                            </div>
       					</div>
                    </div>
                	
    		            <button class="btn btn-primary"><strong>Ingresar</strong></button>
	              
                    </form>
               
                <div id="existe" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form1" method="post" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Asignar Proveedor Existente</h3>
                    </div>
                    <div class="modal-body">
                    	<?php 
							$pame=mysql_query("SELECT COUNT(cod_radicado)as very FROM solicitudescomunidad");				
							if($name=mysql_fetch_array($pame)){
								if($name['very']==0){
									echo mensajes('No hay Registro','rojo');
								}else{
						?>
                    	<strong>SOLICITUD COMUNIDAD</strong><BR>
                        <select name="proveedor_e">
							<?php							
                                $pa=mysql_query("SELECT * FROM solicitudescomunidad");				
                                while($row=mysql_fetch_array($pa)){
                                    echo '<option value="'.$row['cod_radicado'].'">'.$row['fecha_solicitud'].'</option>';	
                                }			
                            ?>
                        </select>
                        <?php }} ?>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
                        <button type="submit" class="btn btn-primary"><strong>Asignar Solicitud</strong></button>
                    </div>
                    </form>
                </div>
                
                <br>
                
                <?php 
					if(!empty($_POST['proveedor_e'])){
						$proveedor_e=limpiar($_POST['proveedor_e']);
						$oPro=new Consultar_Proveedor($proveedor_e);
						$nombre_prov=$oPro->consultar('nombre');
						
						$pa=mysql_query("SELECT * FROM pro_prov WHERE producto='$id_codigo' and proveedor='$proveedor_e'");				
                        if($row=mysql_fetch_array($pa)){
							echo mensajes('Este Proveedor "'.$nombre_prov.'" ya se Encuentra Relacionado con el Producto "'.$nombre_producto.'"','rojo');
						}else{
							mysql_query("INSERT INTO pro_prov (producto, proveedor) VALUES ('$id_codigo','$proveedor_e')");
							echo mensajes('El Producto "'.$nombre_producto.'" se le ha Asignado el Proveedor "'.$nombre_prov.'" con Exito','verde');
						}
					}
					
					if(!empty($_POST['cod_radicado']) and !empty($_POST['fecha_solicitud'])){
						$cod_radicado=limpiar($_POST['cod_radicado']);
						$fecha_solicitud=limpiar($_POST['fecha_solicitud']);
						$cod_radicado_gobernacion=limpiar($_POST['cod_radicado_gobernacion']);
						$contestada=limpiar($_POST['contestada']);
						$cod_municipio=limpiar($_POST['cod_municipio']);
						$asunto_solicitud=limpiar($_POST['asunto_solicitud']);
						$sector=limpiar($_POST['sector']);
						$remitido=limpiar($_POST['remitido']);
						$nombrepeticionario=limpiar($_POST['nombrepeticionario']);
						$cargopeticionario=limpiar($_POST['cargopeticionario']);
						$telefono=limpiar($_POST['telefono']);
						$direccion=limpiar($_POST['direccion']);
						$barrio=limpiar($_POST['barrio']);
						$email=limpiar($_POST['email']);

						$radicadorespuesta=limpiar($_POST['radicadorespuesta']);
						$entregarespuesta=limpiar($_POST['entregarespuesta']);
						$observaciones=limpiar($_POST['observaciones']);

						
						$pa=mysql_query("SELECT MAX(cod_radicado)as maxid FROM solicitudescomunidad");				
                        if($row=mysql_fetch_array($pa)){
							$max_prov=$row['maxid'];
						}
						

			$consulta="SELECT * FROM solicitudescomunidad WHERE cod_radicado=".$cod_radicado;
			$resultado=mysql_query($consulta) or die (mysql_error());
			if (mysql_num_rows($resultado)>0){
				echo mensajes('La Solicitud '.$cod_radicado.' ya existe','rojo');
					$result=mysql_query("SELECT cod_radicado, fecha_solicitud, cod_radicado_gobernacion FROM solicitudescomunidad WHERE cod_radicado=".$cod_radicado);
					while($row=mysql_fetch_row($result)){ 
						echo mensajes($row[0]." ".$row[1]." - ".$row[2],'rojo'); 
					} 

			} else {
					$oProv=new Proceso_Solicitud($cod_radicado, $fecha_solicitud, $cod_radicado_gobernacion, $contestada, $cod_municipio, $asunto_solicitud, $sector, $remitido, $nombrepeticionario, $cargopeticionario, $telefono, $direccion, $barrio, $email, $radicadorespuesta, $entregarespuesta, $observaciones);
					$oProv->crear();
					echo mensajes('La solicitud '.$cod_radicado.' ha sido registrada correctamente','verde');
			}

					}
				?>
                           </td>
                  </tr>
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
