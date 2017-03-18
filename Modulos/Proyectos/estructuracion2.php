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
    	<table width="100%" >
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
      
                    	   	<p align="center"><font size="6">
                    	ESTRUCTURACION DEL PROYECTO N°. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></p></font>
                    </td>
                  </tr>
                </table>
             <div align="center">

		
<?php
			$cod_proyecto=$_POST['cod_proyecto'];
			

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
		</tr>

<table align="center" style="width:70%">
		<form method="POST" action="estructuracion3.php">
		<table>
		  <tr>
		    <td>
			<strong>Codigo Proyecto</strong>
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
		    </td>
		    
		    <td>
			<strong>Fecha </strong>
			<input type="date" name="fecha_estructuracion">
		    </td>
		  </tr>



		  <tr>
		    <td>
			<strong>Momento </strong>
			 <select name="cod_momento">
					<?php
					$consultamomento=mysql_query("SELECT * FROM momentos   ORDER BY momento asc ");
					while($filamomento=mysql_fetch_array($consultamomento)){
						echo '<option value="'.$filamomento['cod_momento'].'">'.$filamomento['momento'].'</option>';
					}
					?>
                                  </select>
		    </td>
		    <td>
			<strong>Observaciones</strong>
			<input type="text" size="30" name="observaciones" >

		    </td>
		    <td>
			<input type="submit" value="Agregar >>">
		    </td>
		  </tr>


		</table>
		</form>



<table  style="width:100%">
		  <tr>
		   


		    
		   
		    <td  style="width:7%">
		<strong>Fecha</strong>
		    </td>
		    <td  style="width:5%">
			<strong>Momento </strong>
		    </td>
		    <td  style="width:2%" >
			<strong>Observaciones</strong>
		    </td>
		    <td  style="width:2%">
			<strong>Soporte Digital</strong>
		    </td>
		    
		  </tr>


			<?php
				$consultaestructuracion=mysql_query("SELECT * FROM estructuracion WHERE cod_proyecto='$cod_proyecto' ORDER BY fecha_estructuracion desc");
				while($filaestructuracion=mysql_fetch_array($consultaestructuracion)){
					echo '<tr>';
					
					


					echo '<td  style=width:7%>'.$filaestructuracion['fecha_estructuracion'].'</td>';
					
					$momento=$filaestructuracion['momento'];
						$consultamomento=mysql_query("SELECT * FROM momentos WHERE cod_momento='$momento'");
						while($filamomento=mysql_fetch_array($consultamomento)){
							$AlmacenaEditarYEliminar=$filaestructuracion['cod_estructuracion'];
							echo "<td   style=width:2%><a href=#act$AlmacenaEditarYEliminar data-toggle=modal >".$filamomento['momento']."</a></td>";
 
						}
						$LinkObservaciones=$filaestructuracion['observaciones'];
						if (substr($LinkObservaciones, 0,4)=="http") {
							echo "<td  style=width:2%> <a href=$LinkObservaciones target=_blank>".$filaestructuracion['observaciones']."</a></td>";
						}else{
							echo "<td  style=width:2%>" .$filaestructuracion['observaciones']."</td>";
						}
					
			?>


			<!--Falta codigo para el link del momento que quede actualizar y eliminar
			-->


                    <td>
			<form method="POST" action="cargar_archivo_estructuracion.php">
			<?php
			if (file_exists("../../archivos_estructuracion/".$filaestructuracion['cod_estructuracion'].".pdf")){
				echo '<a href="../../archivos_estructuracion/'.$filaestructuracion['cod_estructuracion'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_estructuracion/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_estructuracion/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_estructuracion" autocomplete="off" required readonly value="<?php echo $filaestructuracion['cod_estructuracion']; ?>">
        	            <button type="submit" class="btn btn-primary"><strong>Cargar</strong></button>
			</form>			
		     </td>

         




<!--Ventana Editar comienza aqui-->

                  <div id="act<?php echo $filaestructuracion['cod_estructuracion']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" align="center">

                  <!--Archivo de actualizar
                  -->
                	<form name="form2" method="post" action="actualizar_estructuracion.php">
                	
                    <input type="hidden" name="cod_estructuracion" value="<?php echo $filaestructuracion['cod_estructuracion']; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 id="myModalLabel">Editar Estructuracion</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                           	
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaestructuracion['cod_proyecto']; ?>"><br>

                                


                                <strong>Momento </strong><br>
                                  <select name="momento">
					<?php
					$paEstructuracion=mysql_query("SELECT * FROM momentos ORDER BY  momento asc");
					while($filae=mysql_fetch_array($paEstructuracion)){
						if($filae['cod_momento']==$filaestructuracion['momento']){
							echo '<option value="'.$filae['cod_momento'].'" selected>'.$filae['momento'].'</option>';
						}else{
							echo '<option value="'.$filae['cod_momento'].'">'.$filae['momento'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Fecha</strong><br>
                                <input type="date" name="fecha_estructuracion" autocomplete="off" value="<?php echo $filaestructuracion['fecha_estructuracion']; ?>"><br>

                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off" value="<?php echo $filaestructuracion['observaciones']; ?>"><br>


                            </div>

                    	</div>
                    	<button type="submit" class="btn btn-primary"><strong>Actualizar</strong></button>
                    	</div>
                    
                    <div class="modal-footer">
    	                
        	            
        	             </form>
        	           	<form name="form3" method="post" action="eliminar_estructuracion.php">
	                    <input type="hidden" name="cod_estructuracion" value="<?php echo $filaestructuracion['cod_estructuracion']; ?>">
	                 
                        <div class="row-fluid">
                          <h2 id="myModalLabel">Eliminar Tabla Financiera</h3>
                            <div class="span6">
                           
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaestructuracion['cod_proyecto']; ?>"><br>
                                <strong>Codigo Estructuracion</strong><br>
                                <input type="text" name="cod_estructuracion" autocomplete="off" required readonly value="<?php echo $filaestructuracion['cod_estructuracion']; ?>"><br>
 						<button type="submit" class="btn btn-primary"><strong>Eliminar</strong></button>
 						<button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
			</form>
                            </div>
                    </div>
                    
                </div>
<!--Ventana Editar finaliza aqui-->



<!--Aqui comienza la ventana Eliminar-->
<!--Se subio para el mismo div del editar
-->



            
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