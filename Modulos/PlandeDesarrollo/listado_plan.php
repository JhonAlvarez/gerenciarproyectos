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
                    
                    include_once "../../menu/m_plandedesarrollo.php"; 
                   }if($_SESSION['tipo_user']=='b'){
                    
                    include_once "../../menu/m_plandedesarrollo_ub.php"; 
                   }   
    ?>
    

	<div align="center">

    	<table width="80%">

          <tr>

            <td>

            	<table class="table table-bordered">

                  <tr class="well">
                   <br>
    <br>
<br>
                    <td>
 
   
<h1 align="center">LISTADO PLANES DESARROLLO</h1>                   	 	  	

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

					if(!empty($_POST['cod_plan'])){ 

						$cod_plan=limpiar($_POST['cod_plan']);

						$plan=limpiar($_POST['plan']);

						

						if(empty($_POST['cod_plan'])){

							$oProv=new Proceso_PlandeDesarrollo('', $cod_plan, $plan);

							$oProv->crear();

							echo mensajes('El plan de Desarrollo "'.$cod_plan.'" fue Creado con Exito','verde');

						}else{

							$cod_plan=limpiar($_POST['cod_plan']);

							$oProveedor=new Proceso_PlandeDesarrollo($cod_plan, $plan);

							$oProveedor->actualizar();

							echo mensajes('El Plan de Desarrollo "'.$cod_plan.'" fue Actualizado con Exito','verde');

						}

					}

				?>

                <table class="table table-bordered" align="center"  style="width: 90%"  >

                  <tr class="well">


           

                    <td align="center"><strong>NOMBRE DE PLANES DE DESARROLLO</strong></td>

                    <?php
                   if($_SESSION['tipo_user']=='a'){
                    
                  ?>
                    
                    <?php } ?>

                  </tr>

				  <?php 

				  	if(!empty($_POST['buscar'])){

						$buscar=limpiar($_POST['buscar']);

						$pame=mysql_query("SELECT * FROM plandedesarrollo WHERE cod_plan and (cod_plan='$buscar' or plan LIKE '%$buscar%')");	

					}else{

						$pame=mysql_query("SELECT * FROM plandedesarrollo ORDER BY cod_plan DESC");		

					}		

					while($row=mysql_fetch_array($pame)){

				  ?>

                  <tr>

                 

                    

                    <td style="width:5%"><?php echo $row['plan']; ?></td>


                    <?php
                         if($_SESSION['tipo_user']=='a'){
                    ?>
                 
                    <?php } ?>

                  </tr>

                  <div id="act<?php echo $row['cod_plan']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                	<form name="form2" method="post" action="">

                    <input type="hidden" name="cod_plan" value="<?php echo $row['cod_plan']; ?>">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                        <h3 id="myModalLabel">Editar Plan de Desarrollo</h3>

                    </div>

                    <div class="modal-body">

                        <div class="row-fluid">

                            <div class="span6">

                                <strong>Codigo del Plan de Desarrollo</strong><br>

                                <input type="text" name="cod_plan" readonly autocomplete="off" required value="<?php echo $row['cod_plan']; ?>"><br>

                                <strong>Nombre del Plan de Desarrollo</strong><br>

                                <input type="text" name="plan" autocomplete="off" required value="<?php echo $row['plan']; ?>"><br>

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