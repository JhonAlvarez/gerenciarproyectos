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
                
                    <a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Proyectos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Proyectos/listado_proyecto_usuariob.php"><i class="icon-list"></i> Listado de Proyectos</a></li>
                    </ul>
                  </li>


                  <li class="dropdown">
                    <a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Plan de Desarrollo<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="../PlandeDesarrollo/listado_plan.php"><i class="icon-list"></i> Listado de Plan de Desarrollo</a></li>
                      <li><a href="../PlandeDesarrolloEje/listado_eje.php"><i class="icon-list"></i> Listado de Eje</a></li>
                      <li><a href="../PlandeDesarrolloEstrategia/listado_estrategia.php"><i class="icon-list"></i> Listado de Politicas</a></li>
                      <li><a href="../PlandeDesarrolloPrograma/listado_programa.php"><i class="icon-list"></i> Listado de Programa</a></li>
                      <li><a href="../PlandeDesarrolloSubprograma/listado_subprograma.php"><i class="icon-list"></i> Listado de Subprograma</a></li>
                      <li><a href="../PlandeDesarrolloMeta/listado_meta.php"><i class="icon-list"></i> Listado de Meta</a></li>
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