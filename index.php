<?php
session_start();
include_once "Modulos/php_conexion.php";
include_once "Modulos/funciones.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Gerenciar Proyectos ...::... Chalxsoft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
	background-image:url(img/background.jpg);
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
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

    <div class="container">
	  <form name="form1" method="post" action="" class="form-signin">
      	<center>
	<h1>Gerenciar Proyectos</h1><h2>..::Bienvenidos::..</h2>
	<br>
	<img src="img/chalxsoft_presentacion.jpg" width="800" height="400">
	</center>
	<br>
      	<?php 
	  	if(!empty($_POST['usu']) and !empty($_POST['con'])){ 
			$usu=limpiar($_POST['usu']);
			$con=limpiar($_POST['con']);
			
			$pa=mysql_query("SELECT * FROM username WHERE doc='$usu' and con='$con'");
			if($row=mysql_fetch_array($pa)){
				if($row['estado']=='s'){
					$nombre=$row['nom'];
					$nombre=explode(" ", $nombre);
					$nombre=$nombre[0];
					$_SESSION['user_name']=$nombre;
					$_SESSION['tipo_user']=$row['tipo'];
					$_SESSION['cod_user']=$usu;
					if($row['tipo']=='a'){
						echo mensajes('Administrador<br>'.$row['nom'].' '.$row['ape'].'','verde').'<br>';
						echo '<center><img src="img/ajax-loader.gif"></center><br>';
						echo '<meta http-equiv="refresh" content="2;url=Principal.php">';
					}else{
						echo mensajes('Usuario<br>'.$row['nom'].' '.$row['ape'].'','verde').'<br>';
						echo '<center><img src="img/ajax-loader.gif"></center><br>';
						echo '<meta http-equiv="refresh" content="2;url=Principal.php">';
					}
				}else{
					echo mensajes('La informacion no se encuentra Activa en la BD<br>Consulte al Administrador','rojo');	
				}
			}else{
				echo mensajes('El Usuario y/o la Clave son Incorrectos<br>','rojo');
				echo '<center><a href="index.php" class="btn"><strong>Intente de Nuevo</strong></a></center>';
			}
		}else{
			echo '	<input type="text" name="usu" class="input-block-level" placeholder="ID" autocomplete="off" required>
					<input type="password" name="con" class="input-block-level" placeholder="Clave" autocomplete="off" required>
					<div align="right"><button class="btn btn-large btn-primary" type="submit"><strong>Entrar ></strong></button><br>&copy;RMM</div>';		
		}
	  ?>
      </form>

    </div> <!-- /container -->
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