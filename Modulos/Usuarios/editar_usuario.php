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

$titulo='Editar Usuario';
$existe=TRUE;
//$boton='Crear';
$doc='';
$nom='';
$ape='';
$fecha='';
$tel='';
$cel='';
$sexo='';
$dir='';
$nota='';
$estado='';
$tipo='c';
$correo='';
$id_doc=$_GET['doc'];


	$pa=mysql_query("SELECT * FROM username WHERE username.usu='$id_doc'");
	if($row=mysql_fetch_array($pa)){
		$existe=TRUE;		$boton='Actualizar';		
		$doc=$id_doc;		$nom=$row['nom'];	$ape=$row['ape'];
		$fecha=$row['fecha'];	$tel=$row['tel'];	$cel=$row['cel'];
		$sexo=$row['sexo'];	$dir=$row['dir'];	$nota=$row['nota'];
		$fechar=date('Y-m-d');	$estado=$row['estado'];	$tipo=$row['tipo'];
		$correo=$row['correo'];	$titulo="Actualizar Usuario [ ".$nom." ".$ape." ]";
	}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Editar Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="shortcut icon" href="../../ico/favicon.png">

  </head>
  <body>

    <?php include_once "../../menu/m_usuario.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
		<?php
		#echo cadenas().encrypt('121212','URLCODIGO');
		if(!empty($_POST['doc']) and !empty($_POST['nom'])){
			$doc=limpiar($_POST['doc']);		$nom=limpiar($_POST['nom']);		$ape=limpiar($_POST['ape']);
			$fecha=limpiar($_POST['fecha']);	$tel=limpiar($_POST['tel']);		$cel=limpiar($_POST['cel']);
			$sexo=limpiar($_POST['sexo']);		$dir=limpiar($_POST['dir']);		$nota=limpiar($_POST['nota']);
			$fechar=date('Y-m-d');			$estado=limpiar($_POST['estado']);	$tipo=limpiar($_POST['tipo']);
			$correo=limpiar($_POST['correo']);	$con=$doc;				$url=cadenas().encrypt($doc,'URLCODIGO');


			$oConsultar=new Consultar_Usuario($doc);
			$oAlumno=new Proceso_Usuario($doc,$nom,$ape,$fecha,$tel,$cel,$sexo,$dir,$nota,$fechar,$estado,$correo,$con,$tipo);

			if(!empty($_GET['doc'])){
				$oAlumno->actualizar();


				//subir imagen
				$nameimagen = $_FILES['imagen']['name'];
				$tmpimagen = $_FILES['imagen']['tmp_name'];
				$extimagen = pathinfo($nameimagen);
				$ext = array("png","jpg");
				$urlnueva = "../../usuarios/".$doc.".jpg";

				if(is_uploaded_file($tmpimagen)){
					if(array_search($extimagen['extension'],$ext)){
						copy($tmpimagen,$urlnueva);
					}else{
						echo mensajes("No se cargo la Imagen, revice que la imagen sea .jpg o .png y que estas no esten en mayuscula","rojo");
					}
				}else{
					echo mensajes("No eligio Imagen","rojo");
				}
				echo mensajes('El Usuario "'.$nom.' '.$ape.'" Ha sido Actualizado<br>Tipo de Usuario "'.usuario($tipo).'"','verde');
			}else{
				if($oConsultar->consultar('nom')==NULL){
					$oAlumno->crear();
					echo mensajes('El Usuario "'.$nom.' '.$ape.'" Ha sido Registrado<br>Tipo de Usuario "'.usuario($tipo).'"<br><a href="crear_usuario.php?doc='.$url.'"><strong>Editar</strong></a>','verde');

					//subir la imagen
					$nameimagen = $_FILES['imagen']['name'];
					$tmpimagen = $_FILES['imagen']['tmp_name'];
					$extimagen = pathinfo($nameimagen);
					$ext = array("png","jpg");
					$urlnueva = "../../usuarios/".$doc.".jpg";

					if(is_uploaded_file($tmpimagen)){
						if(array_search($extimagen['extension'],$ext)){
							copy($tmpimagen,$urlnueva);
						}else{
							echo mensajes("No cargo Imagen 3","rojo");
						}
					}else{
						echo mensajes("No cargo Imagen 4","rojo");
					}
				}else{
					echo mensajes('El Usuario "'.$nom.' '.$ape.'" Ya se Encuentra Registrado con el Documento "'.$doc.'"','rojo');
				}
			}
		}
		?>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                        <h2>
			<?php
			if (file_exists("../../usuarios/".$doc.".jpg")){
				echo '<img src="../../usuarios/'.$doc.'.jpg" width="100" height="100" class="img-circle img-polaroid">';
			}else{
				echo '<img src="../../usuarios/adduser.jpg" width="100" height="100">';
			}
			?>
                        <?php echo $titulo ?></h2>                        
                    </td>
                  </tr>
                </table>
                
                <table class="table table-bordered">
                	<tr>
                    	<td>
                        	<form name="form1" enctype="multipart/form-data" method="post" action="">
                       		<div class="row-fluid">
	                            <div class="span4">
                                	<strong>Documento / Identidad</strong><br>
                                    <input type="text" name="doc" autocomplete="off" <?php if($existe==TRUE){ echo 'readonly'; }else{ echo 'required'; } ?>   value="<?php echo $doc; ?>" class="input-xlarge"><br>
                                	<strong>Nombres</strong><br>
                                    <input type="text" name="nom" autocomplete="off" required value="<?php echo $nom; ?>" class="input-xlarge"><br>
                                    <strong>Apellidos</strong><br>
                                    <input type="text" name="ape" autocomplete="off" required value="<?php echo $ape; ?>" class="input-xlarge"><br>
                                    <strong>Sexo</strong><br>
                                    <select name="sexo" class="input-xlarge">
                                    	<option value="m" <?php if($sexo=='m'){ echo 'selected'; } ?>>Masculino</option>
                                        <option value="f" <?php if($sexo=='f'){ echo 'selected'; } ?>>Femenino</option>
                                    </select><br>
                                    <strong>Estado</strong><br>
                                    <select name="estado" class="input-xlarge">
                                    	<option value="s" <?php if($estado=='s'){ echo 'selected'; } ?>>ACTIVO</option>
                                        <option value="n" <?php if($estado=='n'){ echo 'selected'; } ?>>NO ACTIVO</option>
                                    </select>
                                </div>
    	                        <div class="span4">
                                	<strong>Fecha de Nacimiento </strong>(AAAA-MM-DD)<br>
                                    <input type="date" name="fecha" autocomplete="off" required value="<?php echo $fecha; ?>" class="input-xlarge"><br>
                                	<strong>Telefono</strong><br>
                                    <input type="text" name="tel" autocomplete="off" value="<?php echo $tel; ?>" class="input-xlarge"><br>
                                    <strong>Celular</strong><br>
                                    <input type="text" name="cel" autocomplete="off" value="<?php echo $cel; ?>" class="input-xlarge"><br>
                                    <strong>Direccion</strong><br>
                                    <input type="text" name="dir" autocomplete="off" required value="<?php echo $dir; ?>" class="input-xlarge"><br>
                                    <strong>Observaciones</strong><br>
                                    <input type="text" name="nota" autocomplete="off" value="<?php echo $nota; ?>" class="input-xlarge"><br>
                                </div>
                                <div class="span4">
                                  <strong>Tipo Usuario</strong><br>
                                  <select name="tipo" class="input-xlarge">
                                  	<option value="a" <?php if($tipo=='a'){ echo 'selected'; } ?>>Administrador</option>
                                    <option value="c" <?php if($tipo=='c'){ echo 'selected'; } ?>>Supervisor</option>
                                  </select><br>
                                  <strong>Correo</strong><br>
                                  <input type="email" name="correo" autocomplete="off" required value="<?php echo $correo; ?>" class="input-xlarge"><br>
                                  <strong>Subir Imagen</strong><br>
                                  <input type="file" name="imagen"><br><br>
                                  <center>
                                  	<button type="submit" class="btn btn-large btn-primary"><?php echo $boton; ?></button>
                                    <a href="crear_usuario.php" class="btn btn-large">Cancelar</a>
                                  </center>
                                </div>
                            </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
          </tr>
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