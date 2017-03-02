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

$titulo='Crear Personal';
$existe=FALSE;
$boton='Crear';
$Nombres='';
$Apellidos='';
$Dependencia='';
$Observaciones='';
$Celular='';
$Cargo='';
$Profesion='';
$Especializacion='';
$Email='';
$tipo='c';


if(!empty($_GET['Cedula'])){
	$id_Cedula=limpiar($_GET['Cedula']);

	$pa=mysql_query("SELECT * FROM personal WHERE Cedula='$id_Cedula'");
	if($row=mysql_fetch_array($pa)){
		$existe=TRUE;
		//$boton='Actualizar';
		$Cedula=$row['Cedula'];
		$Nombres=$row['Nombres'];
		$Apellidos=$row['Apellidos'];
		$Dependencia=$row['Dependencia'];
		$Observaciones=$row['Observaciones'];
		$Celular=$row['Celular'];
		$Cargo=$row['Cargo'];
		$Profesion=$row['Profesion'];
		$Especializacion=$row['Especializacion'];
		$Email=$row['Email'];
		$titulo="Actualizar Usuario [ ".$Nombres." ".$Apellidos." ]";
	}else{
		header('Location: crear_personal.php');
	}
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title><?php echo $titulo ?></title>
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

    <?php include_once "../../menu/m_personal.php"; ?>
	<div align="center">
    	<table width="90%">
          <tr>
            <td>
		<?php
		#echo cadenas().encrypt('121212','URLCODIGO');
		if(!empty($_POST['Cedula']) and !empty($_POST['Nombres'])){
			$Cedula=limpiar($_POST['Cedula']);
			$Nombres=limpiar($_POST['Nombres']);
			$Apellidos=limpiar($_POST['Apellidos']);
			$Dependencia=limpiar($_POST['Dependencia']);
			$Observaciones=limpiar($_POST['Observaciones']);
			$Celular=limpiar($_POST['Celular']);
			$Cargo=limpiar($_POST['Cargo']);
			$Profesion=limpiar($_POST['Profesion']);
			$Especializacion=limpiar($_POST['Especializacion']);
			$Email=limpiar($_POST['Email']);
			$con=$Cedula;
			$url=$Cedula;


			$oConsultar=new Consultar_Usuario($Cedula);
			$oAlumno=new Proceso_Personal($Cedula, $Nombres, $Apellidos, $Dependencia, $Observaciones, $Celular, $Cargo, $Profesion, $Especializacion, $Email);

			if(!empty($_GET['Cedula'])){
				$oAlumno->actualizar();


				//subir imagen
				$nameimagen = $_FILES['imagen']['name'];
				$tmpimagen = $_FILES['imagen']['tmp_name'];
				$extimagen = pathinfo($nameimagen);
				$ext = array("png","jpg");
				$urlnueva = "../../personal_img/".$Cedula.".jpg";

				if(is_uploaded_file($tmpimagen)){
					if(array_search($extimagen['extension'],$ext)){
						copy($tmpimagen,$urlnueva);
					}else{
						echo mensajes("No se cargo la Imagen, revise que la imagen sea .jpg o .png y que estas no esten en mayuscula","rojo");
					}
				}else{
					echo mensajes("No eligio Imagen","rojo");
				}
				echo mensajes('El Personal "'.$Nombres.' '.$Apellidos.'" Ha sido Actualizado<br>','verde');
			}else{
				if($oConsultar->consultar('Nombres')==NULL){
					$q=mysql_query("SELECT * FROM personal WHERE Cedula='$Cedula'");
					if(mysql_num_rows($q) == 0){	
						$oAlumno->crear();
						echo mensajes('El Personal '.$Nombres.' '.$Apellidos.' Ha sido Registrado','verde');
					}else{
						echo mensajes('Esta identificacion '.$Cedula.' ya existe','rojo');
					}

					//subir la imagen
					$nameimagen = $_FILES['imagen']['name'];
					$tmpimagen = $_FILES['imagen']['tmp_name'];
					$extimagen = pathinfo($nameimagen);
					$ext = array("png","jpg");
					$urlnueva = "../../personal_img/".$Cedula.".jpg";

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
					echo mensajes('El personal "'.$Nombres.' '.$Apellidos.'" Ya se Encuentra Registrado con el Documento "'.$Cedula.'"','rojo');
				}
			}
		}
		?>
            	<table class="table table-bordered">
                  <tr class="well">
                    <td>
                        <h2>
			<?php
			if (file_exists("../../personal_img/".$Cedula.".jpg")){
				echo '<img src="../../personal_img/'.$Cedula.'.jpg" width="100" height="100" class="img-circle img-polaroid">';
			}else{
				echo '<img src="../../personal_img/adduser.jpg" width="100" height="100">';
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
                                    <input type="text" name="Cedula" autocomplete="off" <?php if($existe==TRUE){ echo 'readonly'; }else{ echo 'required'; } ?>   value="<?php echo $Cedula; ?>" class="input-xlarge"><br>
                                	<strong>Nombres</strong><br>
                                    <input type="text" name="Nombres" autocomplete="off" required value="<?php echo $Nombres; ?>" class="input-xlarge"><br>
                                    <strong>Apellidos</strong><br>
                                    <input type="text" name="Apellidos" autocomplete="off" required value="<?php echo $Apellidos; ?>" class="input-xlarge"><br>
                                    <strong>Dependencia / Municipio</strong><br>
                                  <select name="Dependencia" class="input-xlarge">
					<?php
					$paDependencia=mysql_query("SELECT * FROM dependencias");
					while($filaDependencia=mysql_fetch_array($paDependencia)){
						if($filaDependencia['cod_dependencia']==$Dependencia){
							echo '<option value="'.$filaDependencia['cod_dependencia'].'" selected>'.$filaDependencia['dependencia'].'</option>';
						}else{
							echo '<option value="'.$filaDependencia['cod_dependencia'].'">'.$filaDependencia['dependencia'].'</option>';	
						}
					}
					?>
                                  </select>
				<br>
                                    <strong>Observaciones</strong><br>
                                    <input type="text" name="Observaciones" autocomplete="off" value="<?php echo $Observaciones; ?>" class="input-xlarge"><br>

                                </div>
    	                        <div class="span4">
                                    <strong>Celular</strong><br>
                                    <input type="text" name="Celular" autocomplete="off" value="<?php echo $Celular; ?>" class="input-xlarge"><br>

                                    <strong>Cargo</strong><br>
                                  <select name="Cargo" class="input-xlarge">
					<?php
					$pa=mysql_query("SELECT * FROM cargos");
					while($filacargo=mysql_fetch_array($pa)){
						if($filacargo['cod_cargo']==$Cargo){
							echo '<option value="'.$filacargo['cod_cargo'].'" selected>'.$filacargo['cargo'].'</option>';
						}else{
							echo '<option value="'.$filacargo['cod_cargo'].'">'.$filacargo['cargo'].'</option>';	
						}
					}
					?>
                                  </select>
				<br>
                                	<strong>Profesion</strong><br>
                                  <select name="Profesion" class="input-xlarge">
					<?php
					$paProfesion=mysql_query("SELECT * FROM profesiones");
					while($filaprofesion=mysql_fetch_array($paProfesion)){
						if($filaprofesion['cod_profesion']==$Profesion){
							echo '<option value="'.$filaprofesion['cod_profesion'].'" selected>'.$filaprofesion['profesion'].'</option>';
						}else{
							echo '<option value="'.$filaprofesion['cod_profesion'].'">'.$filaprofesion['profesion'].'</option>';	
						}
					}
					?>
                                  </select>

				<br>
                                	<strong>Especializacion</strong><br>
                                    <input type="text" name="Especializacion" autocomplete="off" value="<?php echo $Especializacion; ?>" class="input-xlarge"><br>
                                    <strong>Email</strong><br>
                                    <input type="text" name="Email" autocomplete="off" value="<?php echo $Email; ?>" class="input-xlarge"><br>

                                </div>


                                <div class="span4">

                                  <strong>Subir Imagen</strong><br>
                                  <input type="file" name="imagen"><br><br>
                                  <center>
				<?php
				if(!empty($Cedula)){
					echo '<a href="crear_personal.php" class="btn btn-large">Nuevo</a>';
				}else{
                                  	echo '<button type="submit" class="btn btn-large btn-primary">Crear</button>';
				}
				?>
                                    <a href="listado_personal.php" class="btn btn-large">Cancelar</a>
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