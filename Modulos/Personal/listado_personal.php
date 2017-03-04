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
    <title>Listado del Personal</title>
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

    <?php include_once "../../menu/m_personal.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                   	 	<h1 align="center">Listado del Personal</h1>
                        <center>
                      	<form name="form3" method="post" action="" class="form-search">
                        	<div class="input-prepend input-append">
								<span class="add-on"><i class="icon-search"></i></span>
                        		<input type="text" name="buscar" autocomplete="off" class="input-xxlarge search-query" 
                                autofocus placeholder="Buscar Personal por Nombre">
                            </div>
                            <button type="submit" class="btn" name="buton"><strong>Buscar</strong></button>
                    	</form>
                        </center>
                    </td>
                  </tr>
                </table>
                <div align="left">


<br>


<!--
Buscador 
-->
			<strong >Buscar por la Dependencia: </strong>
				<form method="POST" action="buscar_personal_dependencia.php">
                                  <select name="cod_dependencia">
					<?php
					$consultadependencia=mysql_query("SELECT * FROM dependencias");
					while($filadependencia=mysql_fetch_array($consultadependencia)){
						echo '<option value="'.$filadependencia['cod_dependencia'].'">'.$filadependencia['dependencia'].'</option>';
					}
					?>
                                  </select>



				<input type="submit" value="Buscar">
				</form>
	                <!--<a href="#nuevo" role="button" class="btn" data-toggle="modal"><strong>Crear Nuevo Personal</strong></a>-->
                </div>


    <!--
Tabla de mostrar informacion
    -->

                
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
                                <strong>Dependencia</strong><br>
                                <input type="text" name="Dependencia" autocomplete="off" required value=""><br>

                                <strong>Cargo</strong><br>
                                <input type="text" name="Cargo" autocomplete="off" required value=""><br>

                                <strong>Observaciones</strong><br>
                                <input type="text" name="Observaciones" autocomplete="off" value=""><br>
                            </div>
                            <div class="span6">
                                <strong>Celular</strong><br>
                                <input type="text" name="Celular" autocomplete="off" value=""><br>

                                <strong>Profesion</strong><br>
                                <input type="text" name="Profesion" autocomplete="off" required value=""><br>
<!--
Se agrega municipio y barrio 
-->
   <strong>Municipio</strong><br>
                                <input type="text" name="Municipio" autocomplete="off" required value=""><br>
    <strong>Barrio</strong><br>
                                <input type="text" name="Barrio" autocomplete="off" required value=""><br>
<!--
Codigo nuevo de municipio y barrio
-->




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





<!--
Se cambio el orden de la tabla algunas cosas
-->

                
                <br>
                <?php 
					if(!empty($_POST['Nombres'])){ 
						$Cedula=limpiar($_POST['Cedula']);			
						$Nombres=limpiar($_POST['Nombres']);
						$Apellidos=limpiar($_POST['Apellidos']);
						$Dependencia=limpiar($_POST['Dependencia']);
                        $Cargo=limpiar($_POST['Cargo']);
						
						$Celular=limpiar($_POST['Celular']);
					$Profesion=limpiar($_POST['Profesion']);
                    $Municipio=limpiar($_POST['Municipio']);
                    $Barrio=limpiar($_POST['Barrio']);
						$Especializacion=limpiar($_POST['Especializacion']);	
                        $Email=limpiar($_POST['Email']);
                        $Observaciones=limpiar($_POST['Observaciones']);
						
						if(empty($_POST['Cedula'])){
							$oProv=new Proceso_Personal('', $Cedula, $Nombres, $Apellidos, $Dependencia, $Observaciones, $Celular, $Cargo, $Profesion, $Especializacion, $Email);
							$oProv->crear();
							echo mensajes('Personal "'.$Nombres.'" Creado con Exito','verde');
						}else{
							$Cedula=limpiar($_POST['Cedula']);
							$oProveedor=new Proceso_Personal($Cedula, $Nombres, $Apellidos, $Dependencia, $Observaciones, $Celular, $Cargo, $Profesion, $Especializacion, $Email);
							$oProveedor->actualizar();
							echo mensajes('Personal "'.$Nombres.'" Actualizado con Exito','verde');
						}
					}
				?>
                <table class="table table-bordered">
                  <tr class="well">
		    <td><strong>Img</strong></td>
                    <td><strong>Cedula</strong></td>
                    <td><strong>Nombres</strong></td>
                    <td><strong>Apellidos</strong></td>
                    <td><strong>Dependencia</strong></td>

                    <td><strong>Observaciones</strong></td>
                    <td><strong>Celular</strong></td>
                    <td><strong>Cargo</strong></td>
                    <td><strong>Profesion</strong></td>
                    <td><strong>Especializacion</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Accion</strong></td>
                    <td><strong>Municipio</strong></td>
                    <td><strong>Barrio</strong></td>
                    
                  </tr>
				  <?php 
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysql_query("SELECT * FROM personal WHERE Nombres LIKE '%$buscar%' ORDER BY Nombres");	
						/* determinar el n�mero de filas del resultado */

				$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}else{
						$pame=mysql_query("SELECT * FROM personal ORDER BY Nombres");		
						/* determinar el n�mero de filas del resultado */
						$cantRegistros=mysql_num_rows($pame);
						echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";

					}		
					while($row=mysql_fetch_array($pame)){
				  ?>





 <tr>
		    <td>
			<?php
			if (file_exists("../../personal_img/".$row['Cedula'].".jpg")){
				echo '<img src="../../personal_img/'.$row['Cedula'].'.jpg" width="100" height="100">';
			}else{
				echo '<img src="../../personal_img/adduser.jpg" width="100" height="100">';
			}
			?>
		    </td>
                    <td><?php echo $row['Cedula']; ?></td>
                    <td><?php echo $row['Nombres']; ?></td>
                    <td><?php echo $row['Apellidos']; ?></td>
			<td>
			    <?php
				$id_dependencia=$row['Dependencia'];
				$consultaDependencia2=mysql_query("SELECT * FROM dependencias WHERE cod_dependencia=$id_dependencia");
					while($filaDependencia2=mysql_fetch_array($consultaDependencia2)){
						echo $filaDependencia2['dependencia'];
					}
					?>
			</td>
                    <td><?php echo $row['Observaciones']; ?></td>
                    <td><?php echo $row['Celular']; ?></td>
			<td>
			    <?php
				$id_cargo=$row['Cargo'];
				$consultaCargo2=mysql_query("SELECT * FROM cargos WHERE cod_cargo=$id_cargo");
					while($filaCargo2=mysql_fetch_array($consultaCargo2)){
						echo $filaCargo2['cargo'];
					}
					?>
			</td>
			<td>
			    <?php
				$id_profesion=$row['Profesion'];
				$consultaProfesion2=mysql_query("SELECT * FROM profesiones WHERE cod_profesion=$id_profesion");
					while($filaProfesion2=mysql_fetch_array($consultaProfesion2)){
						echo $filaProfesion2['profesion'];
					}
					?>
			</td>                    

            <td><?php echo $row['Especializacion'] ?></td>
                <td><?php echo $row['Email'] ?></td>



                 <td>
                    	<center>

            <a href="#act<?php echo $row['Cedula']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-edit"></i>
                            </a>
                            <a href="#eli<?php echo $row['Cedula']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                                <i class="icon-remove"></i>
                            </a>
                        </center>
                    </td>

                    <td><?php echo $row['Municipio']; ?></td>
                     
                    <td><?php echo $row['Barrio']; ?></td>
 </tr>






<!--Ventana Editar comienza aqui-->


                  <div id="act<?php echo $row['Cedula']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="">
                    <input type="hidden" name="Cedula" value="<?php echo $row['Cedula']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Personal</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Cedula</strong><br>
                                <input type="text" name="Cedula" autocomplete="off" required readonly value="<?php echo $row['Cedula']; ?>"><br>
                                <strong>Nombres</strong><br>
                                <input type="text" name="Nombres" autocomplete="off" required value="<?php echo $row['Nombres']; ?>"><br>
                                <strong>Apellidos</strong><br>
                                <input type="text" name="Apellidos" autocomplete="off" required value="<?php echo $row['Apellidos']; ?>"><br>

                            	<strong>Dependencia</strong><br>
                                  <select name="Dependencia">
					<?php
					$paDependencia=mysql_query("SELECT * FROM dependencias");
					while($filadependencia=mysql_fetch_array($paDependencia)){
						if($filadependencia['cod_dependencia']==$row['Dependencia']){
							echo '<option value="'.$filadependencia['cod_dependencia'].'" selected>'.$filadependencia['dependencia'].'</option>';
						}else{
							echo '<option value="'.$filadependencia['cod_dependencia'].'">'.$filadependencia['dependencia'].'</option>';	
						}
					}
					?>
                                  </select>
				<br>

                                <strong>Observaciones</strong><br>
                                <input type="text" name="Observaciones" autocomplete="off" value="<?php echo $row['Observaciones']; ?>"><br>

                            </div>
                            <div class="span6">
                                <strong>Celular</strong><br>
                                <input type="text" name="Celular" autocomplete="off" value="<?php echo $row['Celular']; ?>"><br>

                            	<strong>Cargo</strong><br>
                                  <select name="Cargo">
					<?php
					$pa=mysql_query("SELECT * FROM cargos");
					while($filacargo=mysql_fetch_array($pa)){
						if($filacargo['cod_cargo']==$row['Cargo']){
							echo '<option value="'.$filacargo['cod_cargo'].'" selected>'.$filacargo['cargo'].'</option>';
						}else{
							echo '<option value="'.$filacargo['cod_cargo'].'">'.$filacargo['cargo'].'</option>';	
						}
					}
					?>
                                  </select>
				<br>
                            	<strong>Profesion</strong><br>
                                  <select name="Profesion">
					<?php
					$paProfesion=mysql_query("SELECT * FROM profesiones");
					while($filaprofesion=mysql_fetch_array($paProfesion)){
						if($filaprofesion['cod_profesion']==$row['Profesion']){
							echo '<option value="'.$filaprofesion['cod_profesion'].'" selected>'.$filaprofesion['profesion'].'</option>';
						}else{
							echo '<option value="'.$filaprofesion['cod_profesion'].'">'.$filaprofesion['profesion'].'</option>';	
						}
					}
					?>
                                  </select>
				<br>

                                <strong>Especializacion</strong><br>
                                <input type="text" name="Especializacion" autocomplete="off" required value="<?php echo $row['Especializacion']; ?>"><br>
                                <strong>Email</strong><br>
                                <input type="text" name="Email" autocomplete="off" required value="<?php echo $row['Email']; ?>"><br>




    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	            <button type="submit" class="btn btn-primary"><strong>Actualizar Personal</strong></button>
                            </div>
                    </form>


			<form method="POST" action="cambiar_imagen.php">
			<?php
			if (file_exists("../../personal_img/".$row['Cedula'].".jpg")){
				echo '<img src="../../personal_img/'.$row['Cedula'].'.jpg" width="100" height="100">';
			}else{
				echo '<img src="../../personal_img/adduser.jpg" width="100" height="100">';
			}
			?>
			    <br>
                            <input type="text" name="Cedula" autocomplete="off" required readonly value="<?php echo $row['Cedula']; ?>"><br>
                            <input type="text" name="Nombres" autocomplete="off" required readonly value="<?php echo $row['Nombres']; ?>"><br>
                            <input type="text" name="Apellidos" autocomplete="off" required readonly value="<?php echo $row['Apellidos']; ?>"><br>
        	            <button type="submit" class="btn btn-primary"><strong>Cambiar Imagen</strong></button>
			</form>



                    	</div>
                    </div>
                    <div class="modal-footer">
    	               ---------

                    </div>
                </div>




<!--Aqui comienza la ventana Eliminar-->


                  <div id="eli<?php echo $row['Cedula']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form3" method="post" action="eliminar_personal.php">
	                    <input type="hidden" name="Cedula" value="<?php echo $row['Cedula']; ?>">
	                    <div class="modal-header">
        	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                	        <h3 id="myModalLabel">Eliminar Personal</h3>
				<font color="red">Esta seguro que desea eliminar este registro?</font>
	                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Cedula</strong><br>
                                <input type="text" name="Cedula" autocomplete="off" required readonly value="<?php echo $row['Cedula']; ?>"><br>
                                <strong>Nombres</strong><br>
                                <input type="text" name="Nombres" autocomplete="off" required readonly value="<?php echo $row['Nombres']; ?>"><br>
                                <strong>Apellidos</strong><br>
                                <input type="text" name="Apellidos" autocomplete="off" required readonly value="<?php echo $row['Apellidos']; ?>"><br>

	    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	     	       <button type="submit" class="btn btn-primary"><strong>Eliminar Personal</strong></button>
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
