<?php
session_start();
include_once "Modulos/php_conexion.php";
include_once "class/class.php";
include_once "class/funciones.php";
$documento=limpiar($_SESSION['cod_user']);
$paaw=mysql_query("SELECT * FROM username WHERE doc='$documento'");				
if($rwow=mysql_fetch_array($paaw)){
	$nombre=$rwow['nom'].' '.$rwow['ape'];
	$tel=$rwow['tel'];
	$cel=$rwow['cel'];
	$sexo=$rwow['sexo'];
	$dir=$rwow['dir'];
	$nota=$rwow['nota'];
	$fechar=$rwow['fechar'];
	$estado=$rwow['estado'];
	$correo=$rwow['correo'];
	$fecha=$rwow['fecha'];
	$tipo=$rwow['tipo'];
}

if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='c'){

}else{
	header('Location: php_cerrar.php');
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Gestion de Proyectos ...::... Chalxsoft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

	<link rel="shortcut icon" href="ico/favicon.png">
  </head>
  <body>
<?php include_once "menu/m_principal.php"; ?>
    <div align="center">
    <table width="80%">
      <tr>
        <td>
        	<div class="row-fluid">
                <div class="span4" align="center">
				<h3 align="center"><?php echo $nombre; ?></h3><br>
                	<div class="well">
		<?php
		if(file_exists("usuarios/".$_SESSION['cod_user'].".jpg")){
			echo '<img src="usuarios/'.$_SESSION['cod_user'].'.jpg" width="200" height="200" class="img-polaroid img-polaroid">';
		}else{
			echo '<img src="usuarios/defecto.png" width="200" height="200">';
		}
		?>
		<br><br>
                        <div class="btn-group btn-group-vertical">
	                        <a href="Principal.php" class="btn"><strong><i class="icon-home"></i> Regresar al Menu Inicio</strong></a>
                            <a href="cambiar_contra.php" class="btn"><strong><i class="icon-refresh"></i> Cambiar Clave</strong></a>
                            <a href="php_cerrar.php" class="btn"><strong><i class="icon-off"></i> Salir</strong></a>
                        </div>
                    
                    </div>
                </div>
                <div class="span8">
                	<h3 align="center">DATOS PRINCIPALES</h3><br>
			<strong><i class="icon-ok"></i> Documento: </strong> <?php echo $documento; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Telefono: </strong> <?php echo $tel; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Celular: </strong> <?php echo $cel; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Fecha Nacimiento: </strong> <?php echo $fecha; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Sexo: </strong>
			<?php 
			if($sexo=='m'){
				echo "MASCULINO";
			}else{
				echo "FEMENINO";
			} 
			?>
			<br><br>
			<strong><i class="icon-ok"></i> Direccion: </strong> <?php echo $dir; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Nota: </strong> <?php echo $nota; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Estado: </strong>
			<?php 
			if($estado=='s'){
				echo "ACTIVO";
			}else{
				echo "NO ACTIVO";
			} 
			?>
			<br><br>
			<strong><i class="icon-ok"></i> Correo: </strong> <?php echo $correo; ?>
			<br><br>
			<strong><i class="icon-ok"></i> Tipo: </strong> 
			<?php 
			if($tipo=='a'){
				echo "ADMINISTRADOR";
			}else{
				echo "SUPERVISOR";
			} 
			?>
			<br><br>
			<strong><i class="icon-ok"></i> Fecha Registro: </strong> <?php echo $fechar; ?>                    
                </div>
            </div>
        </td>
      </tr>
    </table>
    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
  </body>
</html>