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
    <title>Gerenciar Proyectos Meta</title>
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
    	<table width="100%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<p align="center"><font size="6">EJECUCION DEL PROYECTO N° <?php echo $cod_proyecto=$_GET['cod_proyecto'] ?></font></p>
                    </td>
                  </tr>
                </table>
                <div align="center">

				
			<?php
			$cod_proyecto=$_GET['cod_proyecto'];

			echo "<table  align=center  class=table table-bordered  style=width:100%> ";

				$consultacod_proyecto=mysql_query("SELECT * FROM proyectos WHERE cod_proyecto=".$cod_proyecto);
					while($filacod_proyecto=mysql_fetch_array($consultacod_proyecto)){
					echo "<tr>";

						echo '<td style="width: 30%"> <h1 font size=3 align=center> OBJETO <br>  <br> </h1> '.$filacod_proyecto['objetivoproyecto'].'   </td>';


					$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=".$filacod_proyecto['estadodelproyecto']);
							while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
						echo '<td style="width: 4%" >  <h1 font size=8> ESTADO <br>  <br> </h1>    '.$filaestadodelproyecto['estadodelproyecto'].'</td>';

						}





$consultamunicipio1=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio1']);
							while($filamunicipio1=mysql_fetch_array($consultamunicipio1)){
					echo '<td style="width: 4%" >  <h1 font size=8> MUNICIPIO <br>  <br> </h1>    '.$filamunicipio1['municipio'].'</td>';
}

$consultasupervisor=mysql_query("SELECT * FROM personal WHERE Cedula=".$filacod_proyecto['supervisor']);
							while($filasupervisor=mysql_fetch_array($consultasupervisor)){
					echo '<td style="width: 4%" >  <h1 font size=8> SUPERVISOR <br>  <br> </h1>    '.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</td>';
}

					echo "</tr>";




				



					}
			echo "</table>";


			
				
					


				?>
		


		<form method="post" action="ejecucion3.php">
		<table align="center" style="width:60%">
		  <tr>
		    <td style="width:2%">
			<strong>Codigo Proyecto</strong>
		    </td>
		    
		    <td style="width:2%">
			<strong>Momento </strong>
		    </td>
		    <td style="width:2%">
			<strong>Fecha </strong>
		    </td>

		   
		  </tr>

		  <tr >
		    <td style="width:2%">
			<input type="text" name="cod_proyecto" readonly value="<?php echo $cod_proyecto; ?>">
		    </td>
		    

		    <td style="width:2%">
                                  <select name="cod_momentoejecucion">
					<?php
					$consultamomentoejecucion=mysql_query("SELECT * FROM momentosejecuciones  ORDER BY momentoejecucion asc");
					while($filamomentoejecucion=mysql_fetch_array($consultamomentoejecucion)){
						echo '<option value="'.$filamomentoejecucion['cod_momentoejecucion'].'">'.$filamomentoejecucion['momentoejecucion'].'</option>';
					}
					?>
                                  </select>

		    </td>
		    <td style="width:2%">
			<input type="date" name="fecha_ejecucion">
		    </td>

		  

		  </tr>


		  <tr>
		    <td style="width:2%">
			<strong>Avance Programado</strong>
		    </td>

		    <td style="width:2%">
			<strong>Avance Ejecutado</strong>
		    </td>

		    <td style="width:5%">
			<strong>Observaciones</strong>
		    </td>
		    <td style="width:2%">
			<strong></strong>
		    </td>
		  </tr>

		  <tr>

		    <td style="width:2%">
			<input type="text" name="avance_programado" value="%">
		    </td>
		    <td style="width:2%">
			<input type="text" name="avance_ejecutado" value="%">
		    </td>

		    <td style="width:2%">
			<input type="text" name="observaciones" >
		    </td>
		    <td style="width:2%">
			<input type="submit" value="Agregar >>">
		    </td>
		  </tr>
		</table>
		</form>

<hr>

		<table border="3" style="width:80%">
		  <tr>
		   
		    <td style="width:8%">
			<strong>Fecha </strong>
		    </td>
		    <td style="width:5%">
			<strong>Momento </strong>
		    </td>

		   
		   
		    <td style="width:1%">
			<strong>Avance Programado</strong>
		    </td>
		    <td style="width:1%">
			<strong>Avance Ejecutado</strong>
		    </td>
		    <td style="width:6%">
			<strong>Observaciones</strong>
		    </td>

		    <td style="width:1%">
			<strong>Soporte Digital</strong>
		    </td>
		  
		  </tr>

			<?php
				$consultaejecucion=mysql_query("SELECT 	cod_ejecucion,cod_proyecto,date_format(fecha_ejecucion, '%d/%m/%Y') as fecha_ejecucion,momento_ejecucion, avance_programado,avance_ejecutado,observaciones  FROM ejecuciones WHERE cod_proyecto='$cod_proyecto' ORDER BY fecha_ejecucion desc ");
				while($filaejecucion=mysql_fetch_array($consultaejecucion)){

					echo '<tr>';
						echo '<td style=width:8%>'.$filaejecucion['fecha_ejecucion'].'</td>';

					$momentoejecucion=$filaejecucion['momento_ejecucion'];
						$consultamomentoejecucion=mysql_query("SELECT * FROM momentosejecuciones WHERE cod_momentoejecucion='$momentoejecucion'");
						while($filamomentoejecucion=mysql_fetch_array($consultamomentoejecucion)){
							$EditarMomento=$filaejecucion['cod_ejecucion'];
		echo "<td style=width:5%><a href=#act$EditarMomento data-toggle=modal >" .$filamomentoejecucion['momentoejecucion']."</a></td>";
						}

					echo '<td style=width:1%>'.$filaejecucion['avance_programado'].'</td>';
					echo '<td style=width:1%>'.$filaejecucion['avance_ejecutado'].'</td>';
					echo '<td style=width:6%>'.$filaejecucion['observaciones'].'</td>';
			?>
                    <td style="width:1%">
			<form method="POST" action="cargar_archivo_ejecucion.php">
			<?php
			if (file_exists("../../archivos_ejecucion/".$filaejecucion['cod_ejecucion'].".pdf")){
				echo '<a href="../../archivos_ejecucion/'.$filaejecucion['cod_ejecucion'].'.pdf" target="_blank">';
				echo '<img src="../../archivos_ejecucion/pdf_logo.jpg" width="30" height="30">';
				echo '</a>';
			}else{
				echo '<img src="../../archivos_ejecucion/defecto.jpg" width="30" height="30">';
			}
			?>
                            <input type="hidden" name="cod_ejecucion" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_ejecucion']; ?>">
        	            <button type="submit" class="btn btn-primary"><strong>Cargar</strong></button>
			</form>			
			</td>


                    




<!--Ventana Editar comienza aqui-->

                  <div id="act<?php echo $filaejecucion['cod_ejecucion']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                	<form name="form2" method="post" action="actualizar_ejecucion.php">
                    <input type="hidden" name="cod_ejecucion" value="<?php echo $filaejecucion['cod_ejecucion']; ?>">
                    <div class="modal-header">
                        
                        <h3 id="myModalLabel">Editar Ejecucion</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_proyecto']; ?>"><br>

                                

                                <strong>Momento Ejecucion</strong><br>
                                  <select name="momento_ejecucion">
					<?php
					$paEjecucion=mysql_query("SELECT * FROM momentosejecuciones ORDER BY momentoejecucion asc");
					while($filae=mysql_fetch_array($paEjecucion)){
						if($filae['cod_momentoejecucion']==$filaejecucion['momento_ejecucion']){
							echo '<option value="'.$filae['cod_momentoejecucion'].' '.$filae['momentoejecucion'].'</option>';
						}else{
							echo '<option value="'.$filae['cod_momentoejecucion'].'">'.$filae['momentoejecucion'].'</option>';	
						}
					}
					?>
                                  </select><br>

                                <strong>Fecha</strong><br>
                                <input type="date" name="fecha_ejecucion" autocomplete="off" value="<?php echo $filaejecucion['fecha_ejecucion']; ?>"><br>

			    </div>
                            <div class="span6">
                                

                                <strong>Avance Programado</strong><br>
                                <input type="text" name="avance_programado" autocomplete="off" value="<?php echo $filaejecucion['avance_programado']; ?>"><br>

                                <strong>Avance Ejecutado</strong><br>
                                <input type="text" name="avance_ejecutado" autocomplete="off" value="<?php echo $filaejecucion['avance_ejecutado']; ?>"><br>

                                <strong>Observaciones</strong><br>
                                <input type="text" name="observaciones" autocomplete="off" value="<?php echo $filaejecucion['observaciones']; ?>"><br>


                            </div>

                    	</div>
                    </div>
                     <button type="submit" class="btn btn-primary"><strong>Actualizar</strong></button>
                    <div class="modal-footer">
                    </form>

                    <form name="form3" method="post" action="eliminar_ejecucion.php">
	                    <input type="hidden" name="cod_ejecucion" value="<?php echo $filaejecucion['cod_ejecucion']; ?>">
	                    <div class="modal-header">
        	               
                	        <h3 id="myModalLabel">Eliminar Ejecucion</h3>
				
	                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            <div class="span6">
                                <strong>Codigo Proyecto</strong><br>
                                <input type="text" name="cod_proyecto" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_proyecto']; ?>"><br>
                                <strong>Codigo Ejecucion</strong><br>
                                <input type="text" name="cod_ejecucion" autocomplete="off" required readonly value="<?php echo $filaejecucion['cod_ejecucion']; ?>"><br>

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