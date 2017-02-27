<?php
session_start();
include_once "Modulos/php_conexion.php";
include_once "class/class.php";
include_once "class/funciones.php";
$documento=limpiar($_SESSION['cod_user']);

if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='c'){

}else{
	header('Location: php_cerrar.php');
}
?>
<!DOCTYPE html>
<html lang="en">
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

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

	<link rel="shortcut icon" href="ico/favicon.png">
</head>
<body>
<?php include_once "menu/m_principal.php"; ?><br>
    <div align="center">
    <table width="50%">
      <tr>
        <td>
<table border="0" class="table table-bordered">
  <tr class="well">
    <td><h1 align="center"><strong>Cambiar Clave</strong></h1></td>
  </tr>
  <tr>
    <td>
      <div align="center">
        <form name="form1" method="post" action="">
          <label><strong>Clave Actual: </strong></label><input type="password" class="input-xlarge" name="contra" id="contra">
          <label><strong>Nueva Clave: </strong></label><input type="password" class="input-xlarge" name="c1" id="c1" required>
          <label><strong>Repita la Nueva Clave: </strong></label><input type="password" class="input-xlarge" name="c2" id="c2" required><br><br>
	<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Cambiar Clave</strong></button>
          </form>
	<?php 
	if(!empty($_POST['c1']) and !empty($_POST['c2']) and !empty($_POST['contra'])){
		if($_POST['c1']==$_POST['c2']){
			$usuario=limpiar($_SESSION['cod_user']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM username WHERE usu='".$usuario."' and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				$cnueva=limpiar($_POST['c2']);
				$sql="Update username Set con='$cnueva' Where usu='$usuario'";
				mysql_query($sql);
				echo mensajes("Clave Actualizada","verde");
			}else{
				echo mensajes("La Clave Digitada no corresponde a la Clave Actual","rojo");
			}
		}else{
			echo mensajes("Las Claves Nuevas no soy iguales","verde");
		}
	}
	?>
        </div>
      </td>
    </tr>
</table>
</td></tr>
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