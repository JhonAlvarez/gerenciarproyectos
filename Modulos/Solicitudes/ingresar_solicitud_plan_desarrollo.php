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

    <?php include_once "../../menu/m_solicitudplandedesarrollo.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Solicitudes Plan de Desarrollo</h2>
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
                    </td>
                  </tr>
                </table>
                <div align="right">
                    <a href="#nuevo" role="button" class="btn" data-toggle="modal"><strong>Ingresar solicitud</strong></a>
                </div>
                
                <div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="">
                    <div class="modal-header">
    	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	                    <h3 id="myModalLabel">Ingresar Solicitud plan de desarrollo</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                            	<strong>Numero de Solicitud</strong><br>
					<?php
					$consultacod_solicitudplan=mysql_query("SELECT MAX(cod_solicitudplan) AS ultimoCod_solicitudplan FROM solicitudesplandedesarrollo");
					while($filacod_solicitudplan=mysql_fetch_array($consultacod_solicitudplan)){
						$nuevoCod_solicitudplan=$filacod_solicitudplan['ultimoCod_solicitudplan']+1;
						echo '<input type="text" name="cod_solicitudplan" value="'.$nuevoCod_solicitudplan.'" autocomplete="off" required readonly>';
					}
					?>

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

                                <strong>Sector del Proyecto</strong><br>
                                  <select name="sectordelproyecto">
					<?php
					$consultasector=mysql_query("SELECT * FROM sectores");
					while($filasector=mysql_fetch_array($consultasector)){
						echo '<option value="'.$filasector['cod_sector'].'">'.$filasector['sector'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Objeto de la Solicitud</strong><br>
                                <input type="text" name="objetivoyubicacion" autocomplete="off" required><br>
                            </div>
                            <div class="span6">
                            	<strong>Afectacion del proyecto</strong><br>
                                <input type="text" name="afectacion" autocomplete="off"><br>
                                <strong>Fase</strong><br>
                                  <select name="fase">
					<?php
					$consultafase=mysql_query("SELECT * FROM fases");
					while($filafase=mysql_fetch_array($consultafase)){
						echo '<option value="'.$filafase['cod_fase'].'">'.$filafase['fase'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Valor Aproximado del Proyecto</strong><br>
                                <input type="text" name="valorproyecto" autocomplete="off"><br>
                            </div>
       					</div>
                    </div>
                	<div class="modal-footer">
            		    <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
    		            <button class="btn btn-primary"><strong>Registrar Solicitud</strong></button>
	                </div>
                    </form>
                </div>
                
                <div id="existe" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form1" method="post" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Asignar Proveedor Existente</h3>
                    </div>
                    <div class="modal-body">
                    	<?php 
							$pame=mysql_query("SELECT COUNT(Cedula)as very FROM solicitudesplandedesarrollo");				
							if($name=mysql_fetch_array($pame)){
								if($name['very']==0){
									echo mensajes('No hay Registro','rojo');									
								}else{
						?>
                    	<strong>SOLICITUD PLAN DE DESARROLLO</strong><BR>
                        <select name="proveedor_e">
							<?php							
                                $pa=mysql_query("SELECT * FROM solicitudesplandedesarrollo");				
                                while($row=mysql_fetch_array($pa)){
                                    echo '<option value="'.$row['cod_solicitudplan'].'">'.$row['cod_municipio'].'</option>';	
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
					
					if(!empty($_POST['cod_solicitudplan']) and !empty($_POST['cod_municipio'])){
						$cod_solicitudplan=limpiar($_POST['cod_solicitudplan']);
						$cod_municipio=limpiar($_POST['cod_municipio']);
						$sectordelproyecto=limpiar($_POST['sectordelproyecto']);
						$objetivoyubicacion=limpiar($_POST['objetivoyubicacion']);
						$afectacion=limpiar($_POST['afectacion']);
						$fase=limpiar($_POST['fase']);
						$valorproyecto=limpiar($_POST['valorproyecto']);

						
						$pa=mysql_query("SELECT MAX(cod_solicitudplan)as maxid FROM solicitudesplandedesarrollo");				
                        if($row=mysql_fetch_array($pa)){
							$max_prov=$row['maxid'];
						}
						

			$consulta="SELECT * FROM solicitudesplandedesarrollo WHERE cod_solicitudplan=".$cod_solicitudplan;
			$resultado=mysql_query($consulta) or die (mysql_error());
			if (mysql_num_rows($resultado)>0){
				echo mensajes('La Solicitud '.$cod_solicitudplan.' ya existe','rojo');
					$result=mysql_query("SELECT cod_municipio, sectordelproyecto, valorproyecto FROM solicitudesplandedesarrollo WHERE cod_solicitudplan=".$cod_solicitudplan);
					while($row=mysql_fetch_row($result)){ 
						echo mensajes($row[0]." ".$row[1]." - ".$row[2],'rojo'); 
					} 

			} else {
					$oProv=new Proceso_Solicitud($cod_solicitudplan, $cod_municipio, $sectordelproyecto, $objetivoyubicacion, $afectacion, $fase, $valorproyecto);
					$oProv->crear();
					echo mensajes('La solicitud '.$cod_solicitudplan.' ha sido registrada correctamente','verde');
			}

					}
				?>
                
                <table class="table table-bordered table table-hover">
                  <tr class="well">
                    <td><strong>Num Solicitud Plan</strong></td>
                    <td><strong>Municipio</strong></td>
                    <td><strong>Sector del Proyecto</strong></td>
                    <td><strong>Objeto de la Solicitud</strong></td>
                    <td><strong>Afectacion</strong></td>
                    <td><strong>Fase</strong></td>
                    <td><strong>Valor Aproximado del Proyecto</strong></td>
                  </tr>
                  <?php
					if($existe==TRUE){				  				  	
						$pa=mysql_query("SELECT * FROM solicitudesplandedesarrollo WHERE cod_solicitudplan='$cod_solicitudplan'");				
						while($row=mysql_fetch_array($pa)){
							$oProveedor=new Consultar_Proveedor($row['proveedor']);
				  ?>
                  <tr>
                  	<td><?php echo $oProveedor->consultar('Nombres'); ?></td>
                    <td><?php echo $oProveedor->consultar('dir'); ?></td>
                    <td><?php echo $oProveedor->consultar('tel'); ?></td>
                    <td><?php echo $oProveedor->consultar('fax'); ?></td>
                    <td><?php echo $oProveedor->consultar('contacto'); ?></td>
                  </tr>
                  <?php }}else{ 
					  $pa=mysql_query("SELECT * FROM solicitudesplandedesarrollo ORDER BY cod_solicitudplan DESC");				
						while($row=mysql_fetch_array($pa)){
				  ?>
                  <tr>
                    <td><?php echo $row['cod_solicitudplan']; ?></td>
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
                  <?php }} ?>
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
