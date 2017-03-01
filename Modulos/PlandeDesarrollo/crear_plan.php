<!--
Quedo listo Plan de Desarrollo
Y guarda en la base de datos OK
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



    <?php include_once "../../menu/m_plandedesarrollo.php"; ?>

	<div align="center">

    	<table width="40%">

          <tr>

            <td>

            	<table class="table table-bordered">

                  <tr class="well">

                    <td>

                    	<h2 align="center">Crear Plan de Desarrollo</h2>

                      



               
                

  
                	<form name="form2" method="post" action="">

                  

                    <div class="modal-body">

                        <div class="row-fluid">

                            <div class="span6">

                            	<strong>Codigo del Plan de Desarrollo</strong><br>

				<?php

				$consultaplan=mysql_query("SELECT MAX(cod_plan) AS ultimoPlan FROM plandedesarrollo");

					while($filaplan=mysql_fetch_array($consultaplan)){

						$nuevoCod_plan=$filaplan['ultimoPlan']+1;

						echo '<input type="text" name="cod_plan" readonly value="'.$nuevoCod_plan.'">';

					}



					?>



				<br>

                            	<strong>Nombre Plan de Desarrollo</strong><br>

                                <input type="text" name="plan" autocomplete="off" required><br>

                            </div>

     			</div>

                    </div>

                	

            		    
    		            <button class="btn btn-primary" align="right"><strong>Crear</strong></button>

	               

                    </form>


                

                <div id="existe" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                	<form name="form1" method="post" action="">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                        <h3 id="myModalLabel">Asignar Proveedor Existente</h3>

                    </div>

                    <div class="modal-body">

                    	<?php 

							$pame=mysql_query("SELECT COUNT(cod_plan)as very FROM plandedesarrollo");				

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

					

					if(!empty($_POST['cod_plan']) and !empty($_POST['plan'])){

						$cod_plan=limpiar($_POST['cod_plan']);

						$plan=limpiar($_POST['plan']);



						$pa=mysql_query("SELECT MAX(cod_plan)as maxid FROM plandedesarrollo");				

                        if($row=mysql_fetch_array($pa)){

							$max_prov=$row['maxid'];

						}

						



			$consulta="SELECT * FROM plandedesarrollo WHERE cod_plan=".$cod_plan;

			$resultado=mysql_query($consulta) or die (mysql_error());

			if (mysql_num_rows($resultado)>0){

				echo mensajes('El Plan '.$cod_plan.' ya existe','rojo');

				$result=mysql_query("SELECT cod_plan, plan FROM plandedesarrollo WHERE cod_plan=".$cod_plan);

					while($row=mysql_fetch_row($result)){ 

						echo mensajes($row[0]." ".$row[1],'rojo'); 

					} 



			} else {

					$oProv=new Proceso_PlandeDesarrollo($cod_plan, $plan);

					$oProv->crear();

					echo mensajes('El Plan '.$cod_plan.' ha sido registrado correctamente','verde');

			}



					}

				?>

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

                        <?php } ?>

                    </td>

                  </tr>

                </table> <!-- Cierra la tabla  -->




                
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