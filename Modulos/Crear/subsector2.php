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
    <title>Gerenciar Proyectos ...::... Chalxsoft</title>
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

    <?php include_once "../../menu/m_crear.php"; ?>

    <div align="center">
        <table width="90%">
          <tr>
            <td>
                <table class="table table-bordered">
                  <tr class="well">
                    <td>
                        <h2 align="center"> Crear SUB-Sector</h2>
                    </td>
                  </tr>
                </table>
                <div align="center">

        
            <?php
            $cod_subsector=$_POST['cod_subsector'];
            $subsector=$_POST['subsector'];


        $consultaInsertarCod_subsector=mysql_query("SELECT * FROM subsector WHERE cod_subsector='$cod_subsector' ");
        if($row=mysql_fetch_array($consultaInsertarCod_subsector)){
            echo mensajes('Este sector ya existe','rojo');
        }else{
            echo mensajes('Este sector fue agragado exitosamente','verde');
            mysql_query("INSERT INTO subsector (cod_subsector, subsector) VALUES ('$cod_subsector', '$subsector')");

        }
        ?>




            <h3 align='center'>SUB-Sector </h3>

        <table border="1">
          <tr>
            <td>
            <strong>Codigo SUB-Sector</strong>
            </td>
            <td>
            <strong>SUB-Sector</strong>
            </td>
          </tr>

            <?php
                $consultasubsector=mysql_query("SELECT * FROM subsector ORDER BY cod_subsector DESC");
                while($filasubsector=mysql_fetch_array($consultasubsector)){
                    echo '<tr>';
                    echo '<td>'.$filasubsector['cod_subsector'].'</td>';
                    echo '<td>'.$filasubsector['subsector'].'</td>';
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