<!--
GUARDA EN LA BASE DE DATOS Y DIRECCIONA BIEN
OK
-->



<!--
Modificad 01-03-2017
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



    <?php include_once "../../menu/m_plandedesarrolloeje.php"; ?>

	<div align="center">

    	<table width="40%">

          <tr>

            <td>

            	<table class="table table-bordered">

                  <tr class="well">

                    <td>

                    	<h2 align="center">Crear Eje</h2>

        <!--         
Quite el Codigo de el boton "Crear Eje"
-->
                

               <!--
Quite el Div para que se una el formulario con la tabla

               -->

                	<form name="form2" method="post" action="">

                    <!--
Elimine el Titulo del formulario que se mostraba en pantalla
                    -->

                    <div class="modal-body">

                        <div class="row-fluid">

                            <div class="span6">



                            	<strong>Elija Plan de Desarrollo</strong><br>

                                  <select name="cod_plan" class="input-xlarge">

					<?php

					$consultaplan=mysql_query("SELECT * FROM plandedesarrollo");

					while($filaplan=mysql_fetch_array($consultaplan)){

						echo '<option value="'.$filaplan['cod_plan'].'">'.$filaplan['plan'].'</option>';

					}

					?>

                                  </select>
                                  <br>


                            	<strong>Codigo del Eje</strong><br>

					<?php

					$consultaeje=mysql_query("SELECT MAX(cod_eje) AS ultimoEje FROM plandedesarrolloeje");

					while($filaeje=mysql_fetch_array($consultaeje)){

						$nuevoCod_eje=$filaeje['ultimoEje']+1;

						echo '<input type="text" name="cod_eje" value="'.$nuevoCod_eje.'" autocomplete="off" required readonly>';

					}

					?>

					<br>


				<strong>Nombre del Eje</strong><br>

                                <input type="text" name="eje" autocomplete="off" required><br>

                            </div>

     			</div>

                    </div>

                	

<!--
Quite la clase del boton cerra conecta todo con el formulario
-->
    		            <button class="btn btn-primary"><strong>Crear</strong></button>

	               
                    </form>

            
                

                <div id="existe" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                	<form name="form1" method="post" action="">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                        <h3 id="myModalLabel">Asignar Proveedor Existente</h3>

                    </div>

                    <div class="modal-body">

                    	<?php 

							$pame=mysql_query("SELECT COUNT(cod_eje)as very FROM plandedesarrolloeje");				

							if($name=mysql_fetch_array($pame)){

								if($name['very']==0){

									echo mensajes('No hay Registro','rojo');									

								}else{

						?>

                    	<strong>CREAR PLAN</strong><BR>

                        <select name="proveedor_e">

							<?php							

                                $pa=mysql_query("SELECT * FROM plandedesarrollo");				

                                while($row=mysql_fetch_array($pa)){

                                    echo '<option value="'.$row['cod_plan'].'">'.$row['cod_plan'].'</option>';	

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

							

			if(!empty($_POST['cod_eje']) and !empty($_POST['eje'])){

				$cod_eje=limpiar($_POST['cod_eje']);

				$eje=limpiar($_POST['eje']);

				$cod_plan=limpiar($_POST['cod_plan']);



				$pa=mysql_query("SELECT MAX(cod_eje) as maxid FROM plandedesarrolloeje");				

                        if($row=mysql_fetch_array($pa)){

							$max_prov=$row['maxid'];

						}



			$consulta="SELECT * FROM plandedesarrolloeje WHERE cod_eje=".$cod_eje;

			$resultado=mysql_query($consulta) or die (mysql_error());

			if (mysql_num_rows($resultado)>0){

				echo mensajes('El Eje '.$cod_eje.' ya existe','rojo');

				$result=mysql_query("SELECT cod_eje, eje, cod_plan FROM plandedesarrolloeje WHERE cod_eje=".$cod_eje);

					while($row=mysql_fetch_row($result)){ 

						echo mensajes($row[0]." ".$row[1]." ".$row[2],'rojo'); 

					} 



			} else {

					$oProv=new Proceso_PlandeDesarrolloEje($cod_eje, $eje, $cod_plan);

					$oProv->crear();

					echo mensajes('El Eje '.$cod_eje.' ha sido registrado correctamente','verde');

			}



					}

				?>

							   </td>

                  </tr>
                  			<!--
                  			Baje el cierra de la tabla para que quedara unida
                  			-->
                </table>
<!--



                
            </td>

          </tr>

        </table>

    </div>

   

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