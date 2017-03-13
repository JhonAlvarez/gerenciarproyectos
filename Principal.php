<?php

session_start();

include_once "Modulos/php_conexion.php";

include_once "Modulos/class_buscar.php";

include_once "Modulos/funciones.php";



	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='c'  or $_SESSION['tipo_user']=='b'){



	}else{

		header('Location: php_cerrar.php');

	}



$oUsuario=new Consultar_Usuario($_SESSION['cod_user']);

$Nombre=$oUsuario->consultar('nom').' '.$oUsuario->consultar('ape');

?>

<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">

    <title>Gerenciar Proyectos ...::... Chalxsoft</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Le styles -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <style type="text/css">

      body {

        padding-top: 60px;

        padding-bottom: 40px;

	background-image:url(img/background.jpg);

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



<center>	

    <DIV align="center" style="background-color: #ffffff; width:50%;" class="img-polaroid img-polaroid">

	<strong class="text-info"> <?php echo usuario($_SESSION['tipo_user']); ?></strong><br>

		<?php

            if (file_exists("usuarios/".$_SESSION['cod_user'].".jpg")){

                echo '<img src="usuarios/'.$_SESSION['cod_user'].'.jpg" width="100" height="100" class="img-polaroid img-polaroid">';

            }else{

                echo '<img src="usuarios/defecto.jpg" width="100" height="100">';

            }

        ?>

	<strong class="text-info"> <br> <?php echo $Nombre; ?>  </strong>

        <h1 class="text-info">Gerenciar Proyectos</h1>

	<img src="img/chalxsoft_presentacion.jpg" width="500" height="100">

	<br><br>

    </DIV>

</center>



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