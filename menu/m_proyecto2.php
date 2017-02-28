<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#" style="color:#FFF"><img src="../../img/logo.png" width="50">Control</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="../../Principal.php" style="color:#FFF">Inicio</a></li>

    <li class="dropdown">

                <a href="#" id="drop2" style="color:#FFF" role="button" class="dropdown-toggle" data-toggle="dropdown">

                  Personal <b class="caret"></b>

                </a>

                <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">

                    <li role="presentation"><a role="menuitem" tabindex="-1" href="../Personal/crear_personal_supervisor.php"><i class="icon-plus"></i> Crear Personal</a>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="../Personal/listado_personal_supervisor.php"><i class="icon-list"></i> Listado del Personal</a>

                    </li>

                </ul>


              <li class="dropdown">
              	<a href="#" id="drop2" style="color:#FFF" role="button" class="dropdown-toggle" data-toggle="dropdown">
                	Proyectos <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="listado_proyecto_supervisor.php"><i class="icon-list"></i> Listado Proyectos</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="estructuracion_supervisor.php"><i class="icon-plus"></i> Estructuracion</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="tablafinanciera_supervisor.php"><i class="icon-plus"></i> Tabla Financiera</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="licitacion_supervisor.php"><i class="icon-plus"></i> Licitacion</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="ejecucion_supervisor.php"><i class="icon-plus"></i> Ejecucion</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="liquidacion_supervisor.php"><i class="icon-plus"></i> Liquidacion</a></li>
                </ul>
              </li> 



            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
              		<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown">
                    	<b>Usuario:</b> <?php echo $_SESSION['user_name'].' '.$_SESSION['cod_user']; ?> <b class="caret"></b>
                    </a>
                	<ul class="dropdown-menu">
	                    <li><a href="../../perfil.php"><i class="icon-user"></i> Mi Perfil</a></li>
                      	<li class="divider"></li>
                      	<li><a href="../../php_cerrar.php"><i class="icon-off"></i> Salir</a></li>
                    </ul>
                </li>
          	</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<!-- /container -->