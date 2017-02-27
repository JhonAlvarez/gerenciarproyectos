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
                	Plan de Desarrollo<b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                	<li role="presentation"><a role="menuitem" tabindex="-1" href="crear_subprograma.php"><i class="icon-plus"></i> Crear Subprograma</a>
                    	</li>
                    	<li role="presentation"><a role="menuitem" tabindex="-1" href="listado_subprograma.php"><i class="icon-list"></i> Listado Subprograma</a>
                    	</li>
                </ul>
              </li> 

            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
              		<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown">
                    	<b>Usuario:</b> <?php echo $_SESSION['user_name']; ?> <b class="caret"></b>
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