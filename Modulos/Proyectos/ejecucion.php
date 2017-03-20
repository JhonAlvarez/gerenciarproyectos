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
            <link rel="stylesheet" type="text/css" href="../../css/stylo.css">

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
            <br>
            <br>
            <br>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                    	<h1 align="center">Ejecucion</h1>
                    </td>
                  </tr>
                </table>
             
                            	
			
					<?php
					$consultacod_proyecto=mysql_query("SELECT * FROM proyectos ORDER BY cod_proyecto desc");
                      $cantRegistros=mysql_num_rows( $consultacod_proyecto);
                        echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Se encontraron ".$cantRegistros." registros</strong>";


                                ?>
                    </div>	

 <table class="table table-bordered" style="width: 80%" align="center">
                  <tr class="well">
		      
                    <td style="width:1%"><strong>CODIGO </strong></td>

                    <td style="width:5%"><strong>PROYECTO</strong></td>
                 
                  </tr>
                                

<?php
		while($filacod_proyecto=mysql_fetch_array($consultacod_proyecto)){
		echo "<tr>";
						echo "<td style=width:1%><a href=ejecucion2.php?cod_proyecto=".$filacod_proyecto['cod_proyecto'].">".$filacod_proyecto['cod_proyecto']."</a></td>" ;
						echo '<td style=width:5%>'.$filacod_proyecto['objetivoproyecto'].' </td> ';
						echo "</tr>";
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