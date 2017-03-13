<!--
Modificado 01-03-2017
-->



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
    	<table width="70%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Crear Proyecto</h2>

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
                   



                 <!--
         Quite el DIV de crear proyecto 
         -->
                	<form name="form2" method="post" action="" align="center">

                   <!--
                   Eliminado el titulo del encabezado del crea Proyecto
                   -->

                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                            	<strong>Codigo del Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required><br>
                            	<strong>Objeto del Proyecto</strong><br>
                                <input type="text" name="objetivoproyecto" autocomplete="off" required><br>
                                <strong>Municipio </strong><br>
                                  <select name="municipio1">
					<?php
					$consultamunicipio=mysql_query("SELECT * FROM municipios");
					while($filamunicipio=mysql_fetch_array($consultamunicipio)){
						echo '<option value="'.$filamunicipio['cod_municipio'].'">'.$filamunicipio['municipio'].'</option>';
					}
					?>
                                  </select>
				<br>

                                
				

                                <strong>Estado del Proyecto</strong><br>
                                  <select name="estadodelproyecto">
					<?php
					$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto");
					while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
						echo '<option value="'.$filaestadodelproyecto['cod_estadodelproyecto'].'">'.$filaestadodelproyecto['estadodelproyecto'].'</option>';
					}
					?>
                                  </select>
				<br>

        <strong>Supervisor</strong><br>
                                  <select name="supervisor">
          <?php
          $consultasupervisor=mysql_query("SELECT * FROM personal");
          while($filasupervisor=mysql_fetch_array($consultasupervisor)){
            echo '<option value="'.$filasupervisor['Cedula'].'">'.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</option>';
          }
          ?>
                                  </select>

                            </div>
                            <div class="span6">
                            	
				<br>

                                <strong>Politica</strong><br>
                                  <select name="estrategia">
					<?php
					$consultaestrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto");
					while($filaestrategiadelproyecto=mysql_fetch_array($consultaestrategiadelproyecto)){
						echo '<option value="'.$filaestrategiadelproyecto['cod_estrategiadelproyecto'].'">'.$filaestrategiadelproyecto['estrategiadelproyecto'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Sector de Inversion</strong><br>
                                  <select name="sectordeinversion">
					<?php
					$consultasectordeinversion=mysql_query("SELECT * FROM sectordeinversion");
					while($filasectordeinversion=mysql_fetch_array($consultasectordeinversion)){
						echo '<option value="'.$filasectordeinversion['cod_sectordeinversion'].'">'.$filasectordeinversion['sectordeinversion'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Subsector</strong><br>
                                  <select name="subsector">
					<?php
					$consultasubsector=mysql_query("SELECT * FROM subsector");
					while($filasubsector=mysql_fetch_array($consultasubsector)){
						echo '<option value="'.$filasubsector['cod_subsector'].'">'.$filasubsector['subsector'].'</option>';
					}
					?>
                                  </select>
				<br>

                                <strong>Ente Ejecutor</strong><br>
                                  <select name="enteejecutor">
					<?php
					$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor");
					while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){
						echo '<option value="'.$filaenteejecutor['cod_enteejecutor'].'">'.$filaenteejecutor['enteejecutor'].'</option>';
					}
					?>
                                  </select>
				<br>
                            </div>
       					</div>
                    </div>
                	
            		    
    		            <button class="btn btn-primary"><strong align="right" >Crear</strong></button>
	              
                    </form>
               
                
                <div id="existe" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form1" method="post" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Asignar Proveedor Existente</h3>
                    </div>
                    <div class="modal-body">
                    	<?php 
							$pame=mysql_query("SELECT COUNT(cod_proyecto)as very FROM proyectos");				
							if($name=mysql_fetch_array($pame)){
								if($name['very']==0){
									echo mensajes('No hay Registro','rojo');									
								}else{
						?>
                    	<strong>CREAR PROYECTO</strong><BR>
                        <select name="proveedor_e">
							<?php							
                                $pa=mysql_query("SELECT * FROM proyectos");				
                                while($row=mysql_fetch_array($pa)){
                                    echo '<option value="'.$row['cod_proyecto'].'">'.$row['cod_proyecto'].'</option>';	
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
					
					if(!empty($_POST['cod_proyecto']) and !empty($_POST['objetivoproyecto'])){
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

						$pa=mysql_query("SELECT MAX(cod_proyecto)as maxid FROM proyectos");				
                        if($row=mysql_fetch_array($pa)){
							$max_prov=$row['maxid'];
						}
						

			$consulta="SELECT * FROM proyectos WHERE cod_proyecto=".$cod_proyecto;
			$resultado=mysql_query($consulta) or die (mysql_error());
			if (mysql_num_rows($resultado)>0){
				echo mensajes('El Proyecto '.$cod_proyecto.' ya existe','rojo');
				$result=mysql_query("SELECT cod_proyecto, objetivoproyecto, municipio1 FROM proyectos WHERE cod_proyecto=".$cod_proyecto);
					while($row=mysql_fetch_row($result)){ 
						echo mensajes($row[0]." ".$row[1]." - ".$row[2],'rojo'); 
					} 

			} else {
					$oProv=new Proceso_Proyecto($cod_proyecto, $objetivoproyecto, $municipio1, $municipio2, $estadodelproyecto, $supervisor, $estrategia, $sectordeinversion, $subsector, $enteejecutor);
					$oProv->crear();
					echo mensajes('El Proyecto '.$cod_proyecto.' ha sido registrado correctamente','verde');
			}

					}
				?>
                
                <!-- Tablas estaticas eliminadas las de abajo
                -->
                	 </td>
                  </tr>
                </table><!--Qued todo en una misma tabla OK BASES DE DATOS
                -->

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