<div class="navbar navbar-inverse navbar-fixed-top">

      <div class="navbar-inner">

        <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

          <a class="brand" href="#" style="color:#FFF"><img src="../../img/logo.png" width="50">Chalxsoft</a>

          <div class="nav-collapse collapse">

            <ul class="nav">

              <li><a href="../../Principal.php" style="color:#FFF">Inicio</a></li>



              <li class="dropdown">

              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Configurar Datos<b class="caret"></b></a>

                <ul class="dropdown-menu">

                    <li><a href="empresa.php"><i class="icon-plus"></i> Empresa</a></li>

                    <li><a href="deposito.php"><i class="icon-plus"></i> Sucursales</a></li>

                    <li class="divider"></li>

                    <li><a href="departamento.php"><i class="icon-plus"></i> Departamentos</a></li>

                    <li class="divider"></li>

                    <li><a href="iva.php"><i class="icon-plus"></i> Impuestos</a></li>

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

                      	<li><a href="../../index.html"><i class="icon-off"></i> Salir</a></li>

                    </ul>

                </li>

          	</ul>

          </div><!--/.nav-collapse -->

        </div>

      </div>

    </div>

<!-- /container -->