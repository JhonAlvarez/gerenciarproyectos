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

    <?php include_once "../../menu/m_proyecto.php"; ?>

	<div align="center">
    	<table width="90%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h2 align="center">Meta agregada al Proyecto No. <?php echo $cod_proyecto=$_POST['cod_proyecto'] ?></h2>
                    </td>
                  </tr>
                </table>
                <div align="center">

		
			<?php
			$cod_proyecto=$_POST['cod_proyecto'];
			$cod_plan=$_POST['cod_plan'];
			$cod_eje=$_POST['cod_eje'];
			$cod_estrategia=$_POST['cod_estrategia'];
			$cod_programa=$_POST['cod_programa'];
			$cod_subprograma=$_POST['cod_subprograma'];
			$cod_meta=$_POST['cod_meta'];


		$consultaInsertarCod_proyecto=mysql_query("SELECT * FROM proyectosconmetas WHERE cod_proyectoconmeta='$cod_proyecto'");				
		if($row=mysql_fetch_array($consultaInsertarCod_proyecto)){
			echo mensajes('Este proyecto ya tiene una meta','rojo');
		}else{
			echo mensajes('A este proyecto se le agrego la Meta exitosamente','verde');
			mysql_query("INSERT INTO proyectosconmetas (cod_proyectoconmeta, cod_planConMeta, cod_ejeConMeta, cod_estrategiaConMeta, cod_programaConMeta, cod_subprogramaConMeta, cod_metaConMeta) VALUES ('$cod_proyecto', '$cod_plan', '$cod_eje',  '$cod_estrategia', '$cod_programa', '$cod_subprograma', '$cod_meta')");

		}


			echo "<h3 align='center'>Informacion General del Proyecto</h3>";

			echo "<table>";

				$consultacod_proyecto=mysql_query("SELECT * FROM proyectos WHERE cod_proyecto=".$cod_proyecto);
					while($filacod_proyecto=mysql_fetch_array($consultacod_proyecto)){
					echo "<tr>";
						echo '<td><strong>Codigo del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td>'.$filacod_proyecto['cod_proyecto'].'</td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Objeto del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td>'.$filacod_proyecto['objetivoproyecto'].'</td>';
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Municipio 1: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultamunicipio1=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio1']);
							while($filamunicipio1=mysql_fetch_array($consultamunicipio1)){
								echo '<td>'.$filamunicipio1['municipio'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Municipio 2: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultamunicipio2=mysql_query("SELECT * FROM municipios WHERE cod_municipio=".$filacod_proyecto['municipio2']);
							while($filamunicipio2=mysql_fetch_array($consultamunicipio2)){
								echo '<td>'.$filamunicipio2['municipio'].'</td>';
							}
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Estado del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultaestadodelproyecto=mysql_query("SELECT * FROM estadodelproyecto WHERE cod_estadodelproyecto=".$filacod_proyecto['estadodelproyecto']);
							while($filaestadodelproyecto=mysql_fetch_array($consultaestadodelproyecto)){
								echo '<td>'.$filaestadodelproyecto['estadodelproyecto'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Supervisor: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultasupervisor=mysql_query("SELECT * FROM personal WHERE Cedula=".$filacod_proyecto['supervisor']);
							while($filasupervisor=mysql_fetch_array($consultasupervisor)){
								echo '<td>'.$filasupervisor['Nombres'].' '.$filasupervisor['Apellidos'].'</td>';
							}
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Politica del Proyecto: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultaestrategiadelproyecto=mysql_query("SELECT * FROM estrategiadelproyecto WHERE cod_estrategiadelproyecto=".$filacod_proyecto['estrategia']);
							while($filaestrategiadelproyecto=mysql_fetch_array($consultaestrategiadelproyecto)){
								echo '<td>'.$filaestrategiadelproyecto['estrategiadelproyecto'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Sector de Inversion: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultasectordeinversion=mysql_query("SELECT * FROM sectordeinversion WHERE cod_sectordeinversion=".$filacod_proyecto['sectordeinversion']);
							while($filasectordeinversion=mysql_fetch_array($consultasectordeinversion)){
								echo '<td>'.$filasectordeinversion['sectordeinversion'].'</td>';
							}
					echo "</tr>";

					echo "<tr>";
						echo '<td><strong>Subsector: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultasubsector=mysql_query("SELECT * FROM subsector WHERE cod_subsector=".$filacod_proyecto['subsector']);
							while($filasubsector=mysql_fetch_array($consultasubsector)){
								echo '<td>'.$filasubsector['subsector'].'</td>';
							}
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>';
						echo '<td><strong>Ente Ejecutor: </strong></td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
							$consultaenteejecutor=mysql_query("SELECT * FROM enteejecutor WHERE cod_enteejecutor=".$filacod_proyecto['enteejecutor']);
							while($filaenteejecutor=mysql_fetch_array($consultaenteejecutor)){
								echo '<td>'.$filaenteejecutor['enteejecutor'].'</td>';
							}
					echo "</tr>";


					}
			echo "</table>";

			echo "<h3 align='center'>Informacion del Plan de Desarrollo del Proyecto</h3>";

				echo "<table>";
				echo "<tr>";
				$consultaplan=mysql_query("SELECT * FROM plandedesarrollo WHERE cod_plan=".$cod_plan);
					while($fila=mysql_fetch_array($consultaplan)){
						echo '<td><strong>Plan de Desarrollo: </strong></td><td>'.$fila['plan'].'</td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
					}

				$consultaeje=mysql_query("SELECT * FROM plandedesarrolloeje WHERE cod_eje=$cod_eje and cod_plan=$cod_plan");
					while($filaeje=mysql_fetch_array($consultaeje)){
						echo '<td><strong>Eje: </strong></td><td>'.$filaeje['eje'].'</td>';
					}
				echo "</tr>";

				echo "<tr>";
				$consultaestrategia=mysql_query("SELECT * FROM plandedesarrolloestrategia WHERE cod_estrategia=$cod_estrategia and cod_eje=$cod_eje and cod_plan=$cod_plan");
					while($filaestrategia=mysql_fetch_array($consultaestrategia)){
						echo '<td><strong>Politica: </strong></td><td>'.$filaestrategia['estrategia'].'</td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
					}

				$consultaprograma=mysql_query("SELECT * FROM plandedesarrolloprograma WHERE cod_programa=$cod_programa and cod_estrategia=$cod_estrategia and cod_eje=$cod_eje and cod_plan=$cod_plan");
					while($filaprograma=mysql_fetch_array($consultaprograma)){
						echo '<td><strong>Programa: </strong></td><td>'.$filaprograma['programa'].'</td>';
					}
				echo "</tr>";

				echo "<tr>";
				$consultasubprograma=mysql_query("SELECT * FROM plandedesarrollosubprograma WHERE cod_subprograma=$cod_subprograma and cod_programa=$cod_programa and cod_estrategia=$cod_estrategia and cod_eje=$cod_eje and cod_plan=$cod_plan");
					while($filasubprograma=mysql_fetch_array($consultasubprograma)){
						echo '<td><strong>Subprograma: </strong></td><td>'.$filasubprograma['subprograma'].'</td>';
						echo '<td>&nbsp; &nbsp; &nbsp; &nbsp; </td>';
					}

				$consultameta=mysql_query("SELECT * FROM plandedesarrollometa WHERE cod_meta=$cod_meta and cod_subprograma=$cod_subprograma and cod_programa=$cod_programa and cod_estrategia=$cod_estrategia and cod_eje=$cod_eje and cod_plan=$cod_plan");
					while($filameta=mysql_fetch_array($consultameta)){
						echo '<td><strong>Meta: </strong></td><td>'.$filameta['meta'].'</td>';
					}




				?>
		</tr>

		<table>



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