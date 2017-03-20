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

    <title>Gerenciar Proyectos Meta</title>

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



    <?php
                   if($_SESSION['tipo_user']=='a'){
                    
                    include_once "../../menu/m_plandedesarrolloestrategia.php"; 
                   }if($_SESSION['tipo_user']=='b'){
                    
                    include_once "../../menu/m_plandedesarrolloestrategia_ub.php"; 
                   }   
    ?>

	<div align="center">

    	<table width="90%">

          <tr>

            <td>

            	<table class="table table-bordered">

                  <tr class="well">
 <br>
    <br>
<br>
                    <td>

                   	 <h1 align="center" >LISTADO DE POLITICAS </h1>
                   	 

                        <center>

                      	<form name="form3" method="post" action="" class="form-search">

                        	<div class="input-prepend input-append">

								<span class="add-on"><i class="icon-search"></i></span>

                        		<input type="text" name="buscar" autocomplete="off" class="input-xxlarge search-query" 

                                autofocus placeholder="Ingrese su busqueda">

                            </div>

                            <button type="submit" class="btn" name="buton"><strong>Buscar</strong></button>

                    	</form>

                        </center>

                    </td>

                  </tr>

                </table>

             

                <?php 

					if(!empty($_POST['cod_estrategia'])){ 

						$cod_estrategia=limpiar($_POST['cod_estrategia']);

						$estrategia=limpiar($_POST['estrategia']);

						$cod_eje=limpiar($_POST['cod_eje']);

						$cod_plan=limpiar($_POST['cod_plan']);

						

						if(empty($_POST['cod_estrategia'])){

							$oProv=new Proceso_PlandeDesarrolloEstrategia('', $cod_estrategia, $estrategia, $cod_eje, $cod_plan);

							$oProv->crear();

							echo mensajes('La Politica "'.$cod_estrategia.'" fue Creado con Exito','verde');

						}else{

							$cod_estrategia=limpiar($_POST['cod_estrategia']);

							$oProveedor=new Proceso_PlandeDesarrolloEstrategia($cod_estrategia, $estrategia, $cod_eje, $cod_plan);

							$oProveedor->actualizar();

							echo mensajes('La Politica "'.$cod_estrategia.'" fue Actualizado con Exito','verde');

						}

					}

				?>

                <table class="table table-bordered" style="width:90%" align="center">

                  <tr class="well">


                  <!--

                    <td><strong>Codigo Plan de Desarrollo</strong></td>
-->
                    <td style="width:5%"><strong>Nombre de Planes de Desarrollo</strong></td>
  <!--
                    <td><strong>Codigo Eje</strong></td>
-->
                    <td style="width:5%"><strong>Nombre de Eje</strong></td>
  <!--
                    <td><strong>Codigo Politica</strong></td>
-->
                    <td style="width:5%"><strong>Nombre Politica</strong></td>

                    <?php
                      if($_SESSION['tipo_user']=='a'){
                    ?>

<!--
                    <td><strong>Editar</strong></td>

                    -->
                    <?php } ?>

                  </tr>

				  <?php 

				  	if(!empty($_POST['buscar'])){

						$buscar=limpiar($_POST['buscar']);

						$pame=mysql_query("SELECT * FROM plandedesarrolloestrategia WHERE cod_estrategia and (cod_estrategia='$buscar' or estrategia LIKE '%$buscar%')");	

					}else{

						$pame=mysql_query("SELECT * FROM plandedesarrolloestrategia ORDER BY cod_estrategia DESC");		

					}		

					while($row=mysql_fetch_array($pame)){

				  ?>

                  <tr>
<!--

                    <td><?php echo $row['cod_plan']; ?></td>

                    -->

					<?php

					$consultaplan=mysql_query("SELECT * FROM plandedesarrollo WHERE cod_plan=".$row['cod_plan']);

					while($filaplan=mysql_fetch_array($consultaplan)){

						echo '<td style="width:5%">'.$filaplan['plan'].'</td>';

					}

					?>


<!--
                    <td><?php echo $row['cod_eje']; ?></td>
                    -->

					<?php

					$consultaeje=mysql_query("SELECT * FROM plandedesarrolloeje WHERE cod_eje=".$row['cod_eje']);

					while($filaeje=mysql_fetch_array($consultaeje)){

						echo '<td style="width:5%">'.$filaeje['eje'].'</td>';

					}

					?>




<!--
                    <td><?php echo $row['cod_estrategia']; ?></td>
                    -->

                    <td style="width:5%"><?php echo $row['estrategia']; ?></td>


                   <?php
                         if($_SESSION['tipo_user']=='a'){
                   ?>

<!--
                   <td>

                    	<center>

			<form method="POST" action="actualizar_estrategia.php">
			<input type="hidden" name="cod_proyecto" readonly value="<?php echo $row['cod_plan']; ?>">
			<input type="hidden" name="cod_eje" readonly value="<?php echo $row['cod_eje']; ?>">
			<input type="hidden" name="cod_estrategia" readonly value="<?php echo $row['cod_estrategia']; ?>">
			<input type="hidden" name="estrategia" readonly value="<?php echo $row['estrategia']; ?>">
			<br>
			<input type="submit" value="Editar">

                        </center>

                    </td>
-->
                    <?php } ?>

                  </tr>

                  <div id="act<?php echo $row['cod_eje']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                	<form name="form2" method="post" action="">

                    <input type="hidden" name="cod_eje" value="<?php echo $row['cod_eje']; ?>">
                    <input type="hidden" name="cod_estrategia" value="<?php echo $row['cod_estrategia']; ?>">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                        <h3 id="myModalLabel">Editar Politica</h3>

                    </div>

                    <div class="modal-body">

                        <div class="row-fluid">

                            <div class="span6">

                                <strong>Codigo Politica</strong><br>

                                <input type="text" name="cod_estrategia" autocomplete="off" required readonly value="<?php echo $row['cod_estrategia']; ?>"><br>

                                <strong>Nombre Politica</strong><br>

                                <input type="text" name="estrategia" autocomplete="off" required value="<?php echo $row['estrategia']; ?>"><br>

                                <strong>Codigo Eje</strong><br>

                                <input type="text" name="cod_eje" autocomplete="off" required readonly value="<?php echo $row['cod_eje']; ?>"><br>

                                <strong>Codigo Plan</strong><br>

                                <input type="text" name="cod_plan" autocomplete="off" required readonly value="<?php echo $row['cod_plan']; ?>"><br>

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