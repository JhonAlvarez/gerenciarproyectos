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
         <link rel="stylesheet" type="text/css" href="../../css/styloproy.css">

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
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    <p align="center"><font size="6">
                    	LIQUIDACION DEL PROYECTO N°. <?php echo $cod_proyecto=$_GET['cod_proyecto'] ?></p></font>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_GET['cod_proyecto'];
			

			echo "<table  align=center  class=table table-bordered  style=width:100%> ";

				$consultacod_proyecto=mysql_query("SELECT * FROM proyectos WHERE cod_proyecto=".$cod_proyecto);
					while($filacod_proyecto=mysql_fetch_array($consultacod_proyecto)){
					echo "<tr >";
						
					
						
						echo '<td style="width: 30%"> <h1 font size=3 align=center> OBJETO <br>  <br> </h1> '.$filacod_proyecto['objetivoproyecto'].'   </td>';



				
							$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=".$filacod_proyecto['estadodelproyecto']);
							while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
								echo '<td style="width: 4%" >  <h1 font size=8> ESTADO <br>  <br> </h1>    '.$filaestadodelproyecto['estadodelproyecto'].'</td>';
							}



						
							$consultamunicipio1=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio1']);
							while($filamunicipio1=mysql_fetch_array($consultamunicipio1)){
								echo '<td style="width: 4%"> <h1 font size=8> MUNICIPIO <br>  <br> </h1>  '.$filamunicipio1['municipio'].'</td>';
							}
						
						
							$consultamunicipio2=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio2']);
							while($filamunicipio2=mysql_fetch_array($consultamunicipio2)){
							}
						
						

							$consultasupervisor=mysql_query("SELECT * FROM personal WHERE Cedula=".$filacod_proyecto['supervisor']);
							while($filasupervisor=mysql_fetch_array($consultasupervisor)){
								echo '<td style="width: 2%"> <h1 font size=5> SUPERVISOR  <br>  <br> </h1>  '.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</td>';
							}

		
				
					}
					echo "</tr>";
			echo "</table>";

				echo "<table style=width:100%>";
				echo "<tr>";
				$consultaplan=mysql_query("SELECT * FROM proyectosconmetas WHERE cod_proyectoconmeta=".$cod_proyecto);
					while($fila=mysql_fetch_array($consultaplan)){

						echo "</tr>";
	
					}



				?>
		


		<form method="POST" action="liquidacion3.php">
		<table>
		  <tr>
		    <td>
			<strong>Codigo Proyecto</strong>
		    </td>
		    

		    <td>
			<strong>Fecha</strong>
		    </td>
		  </tr>

		  <tr>
		    <td>
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
		    </td>
		   
		    <td>
			<input type="date" name="fecha_liquidacion">
		    </td>
		  </tr>


		  <tr>
		    <td>
			<strong>Momento Liquidacion</strong>
		    </td>
		   
		    <td>
			<strong>Observaciones</strong>
		    </td>
		   
		  </tr>

		  <tr>
		    <td>
                                  <select name="cod_momentoliquidacion">
					<?php
					$consultamomentoliquidacion=mysql_query("SELECT * FROM momentosliquidaciones ORDER BY momentoliquidacion asc");
					while($filamomentoliquidacion=mysql_fetch_array($consultamomentoliquidacion)){
						echo '<option value="'.$filamomentoliquidacion['cod_momentoliquidacion'].'">'.$filamomentoliquidacion['momentoliquidacion'].'</option>';
					}
					?>
                                  </select>

		    </td>
		 

		    <td>
			<input type="text" name="observaciones" >
		    </td>
		    <td>
			<input type="submit" value="Agregar >>">
		    </td>
		  </tr>
		</table>
		</form>

<hr>

		<table border="3" style="width:100%">
		  <tr>
		   
		    
		    <td style="width:7%">
			<strong>Fecha </strong>
		    </td>
		     
		    <td style="width:5%">
			<strong>Momento </strong>
		    </td>
		 

		    <td style="width:8%">
			<strong>Observaciones</strong>
		    </td>
		    <td style="width:1%">
			<strong>Soporte Digital</strong>
		    </td>
		   
		  </tr>

			<?php
				$consultaliquidacion=mysql_query("SELECT cod_liquidacion,cod_proyecto,momento_liquidacion,date_format(fecha_liquidacion, '%d/%m/%Y') as fecha_liquidacion,observaciones FROM liquidaciones WHERE cod_proyecto='$cod_proyecto' ORDER BY fecha_liquidacion desc");
				while($filaliquidacion=mysql_fetch_array($consultaliquidacion)){
					echo '<tr>';
					echo '<td style=width:7%>'.$filaliquidacion['fecha_liquidacion'].'</td>';





					
					$momentoliquidacion=$filaliquidacion['momento_liquidacion'];
						$consultamomentoliquidacion=mysql_query("SELECT * FROM momentosliquidaciones WHERE cod_momentoliquidacion='$momentoliquidacion'");
						while($filamomentoliquidacion=mysql_fetch_array($consultamomentoliquidacion)){



							$EditarMomento=$filaliquidacion['cod_liquidacion'];

							echo "<td style=width:5%><a href=#act$EditarMomento data-toggle=modal >"    .$filamomentoliquidacion['momentoliquidacion']."</a></td>";



						}
					echo '<td style=width:8%>'.$filaliquidacion['observaciones'].'</td>';
			?>
                    <td style="width:1%">
			<form method="POST" action="cargar_archivo_liquidacion.php">
			<?php
			if (file_exists("../../archivos_liquidacion/".$filaliquidacion['cod_liquidacion'].".pdf")){
				echo '<a href="../../archivos_liquidacion/'.$filaliquidacion['cod_liquidacion'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_liquidacion/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_liquidacion/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_liquidacion" autocomplete="off" required readonly value="<?php echo $filaliquidacion['cod_liquidacion']; ?>">
        	            <button type="submit" class="btn btn-primary"><strong>Cargar</strong></button>
			</form>			
			</td>

                  




<!--Ventana Editar comienza aqui-->

                  <div id="act<?php echo $filaliquidacion['cod_liquidacion']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="actualizar_liquidacion.php">
                    <input type="hidden" name="cod_liquidacion" value="<?php echo $filaliquidacion['cod_liquidacion']; ?>">
                    <div class="modal-header">
                       
                        <h3 id="myModalLabel">Editar Liquidacion</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaliquidacion['cod_proyecto']; ?>"><br>

                                

                                <strong>Momento</strong><br>
                                  <select name="momento_liquidacion">
					<?php
					$paLiquidacion=mysql_query("SELECT * FROM momentosliquidaciones");
					while($filae=mysql_fetch_array($paLiquidacion)){
						if($filae['cod_momentoliquidacion']==$filaliquidacion['momento_liquidacion']){
							echo '<option value="'.$filae['cod_momentoliquidacion'].'" selected>'.$filae['momentoliquidacion'].'</option>';
						}else{
							echo '<option value="'.$filae['cod_momentoliquidacion'].'">'.$filae['momentoliquidacion'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Fecha</strong><br>
                                <input type="date" name="fecha_liquidacion" autocomplete="off" value="<?php echo $filaliquidacion['fecha_liquidacion']; ?>"><br>

                               

                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off" value="<?php echo $filaliquidacion['observaciones']; ?>"><br>


                            </div>

                    	</div>
                    </div>
                     <button type="submit" class="btn btn-primary"><strong>Actualizar</strong></button>
                    <div class="modal-footer">
                    </form>
                    	<form name="form3" method="post" action="eliminar_liquidacion.php">
	                    <input type="hidden" name="cod_liquidacion" value="<?php echo $filaliquidacion['cod_liquidacion']; ?>">
	                    <div class="modal-header">
        	                
                	        <h3 id="myModalLabel">Eliminar Liquidacion</h3>
	                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaliquidacion['cod_proyecto']; ?>"><br>
                                <strong>Codigo Liquidacion</strong><br>
                                <input type="text" name="cod_liquidacion" autocomplete="off" required readonly value="<?php echo $filaliquidacion['cod_liquidacion']; ?>"><br>

	    	                <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
        	     	       <button type="submit" class="btn btn-primary"><strong>Eliminar</strong></button>
    	                
        	           
                    </div>
                    </form>
                </div>
<!--Ventana Editar finaliza aqui-->



<!--Aqui comienza la ventana Eliminar-->


                 
			</form>
		</div>
<!--Ventana Eliminar finaliza aqui-->


			<?php
					echo '<tr>';
				}
			?>


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