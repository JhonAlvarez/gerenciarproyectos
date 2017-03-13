<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="Principal.php" style="color:#FFF"> Inicio</a></li>
               <?php if($_SESSION['tipo_user']=='a'){   ?>


              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Personal<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/Personal/crear_personal.php"><i class="icon-plus"></i> Crear Personal</a></li>
                    <li><a href="Modulos/Personal/listado_personal.php"><i class="icon-list"></i> Listado del Personal</a></li>
                </ul>
              </li>

              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Solicitudes<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/Solicitudes/ingresar_solicitud_plan_desarrollo.php"><i class="icon-plus"></i> Ingresar Solicitud Plan Desarrollo</a></li>
                    <li><a href="Modulos/Solicitudes/listado_solicitud_plan_desarrollo.php"><i class="icon-list"></i> Listado Solicitud Plan Desarrollo</a></li>
                    <li><a href="Modulos/SolicitudesComunidad/ingresar_solicitud_comunidad.php"><i class="icon-plus"></i> Ingresar Solicitud de la Comunidad</a></li>
                    <li><a href="Modulos/SolicitudesComunidad/listado_solicitud_comunidad.php"><i class="icon-list"></i> Listado Solicitud de la Comunidad</a></li>
                </ul>
              </li>


              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Proyectos<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/Proyectos/crear_proyecto.php"><i class="icon-plus"></i> Crear Proyecto</a></li>
                    <li><a href="Modulos/Proyectos/listado_proyecto.php"><i class="icon-list"></i> Listado de Proyectos</a></li>
                    <li><a href="Modulos/Proyectos/estructuracion.php"><i class="icon-plus"></i> Estructuracion</a></li>
                    <li><a href="Modulos/Proyectos/tablafinanciera.php"><i class="icon-plus"></i> Tabla Financiera</a></li>
                   
                    <li><a href="Modulos/Proyectos/ejecucion.php"><i class="icon-plus"></i> Ejecucion</a></li>
                    <li><a href="Modulos/Proyectos/liquidacion.php"><i class="icon-plus"></i> Liquidacion</a></li>
                </ul>
              </li>


              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Plan de Desarrollo<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/PlandeDesarrollo/crear_plan.php"><i class="icon-plus"></i> Crear Plan de Desarrollo</a></li>
                    <li><a href="Modulos/PlandeDesarrollo/listado_plan.php"><i class="icon-list"></i> Listado de Plan de Desarrollo</a></li>
                    <li><a href="Modulos/PlandeDesarrolloEje/crear_eje.php"><i class="icon-plus"></i> Crear Eje</a></li>
                    <li><a href="Modulos/PlandeDesarrolloEje/listado_eje.php"><i class="icon-list"></i> Listado de Eje</a></li>
                    <li><a href="Modulos/PlandeDesarrolloEstrategia/crear_estrategia.php"><i class="icon-plus"></i> Crear Politicas</a></li>
                    <li><a href="Modulos/PlandeDesarrolloEstrategia/listado_estrategia.php"><i class="icon-list"></i> Listado de Politicas</a></li>
                    <li><a href="Modulos/PlandeDesarrolloPrograma/crear_programa.php"><i class="icon-plus"></i> Crear Programa</a></li>
                    <li><a href="Modulos/PlandeDesarrolloPrograma/listado_programa.php"><i class="icon-list"></i> Listado de Programa</a></li>
                    <li><a href="Modulos/PlandeDesarrolloSubprograma/crear_subprograma.php"><i class="icon-plus"></i> Crear Subprograma</a></li>
                    <li><a href="Modulos/PlandeDesarrolloSubprograma/listado_subprograma.php"><i class="icon-list"></i> Listado de Subprograma</a></li>
                    <li><a href="Modulos/PlandeDesarrolloMeta/crear_meta.php"><i class="icon-plus"></i> Crear Meta</a></li>
                    <li><a href="Modulos/PlandeDesarrolloMeta/listado_meta.php"><i class="icon-list"></i> Listado de Meta</a></li>
                </ul>
              </li>

         <ul class="nav">
                  <li class="dropdown">
                <a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Crear<b class="caret"></b></a>
                <ul class="dropdown-menu">


<!--
Dividir los crear por clases
-->

  <li><a href="#"><i class=""></i> ------------------Personal-----------------</a></li>

                    <li><a href="Modulos/Crear/municipio.php"><i class="icon-plus"></i> Crear Municipio</a></li>
                    <li><a href="Modulos/Crear/cargo.php"><i class="icon-plus"></i> Crear Cargo</a></li>
                    <li><a href="Modulos/Crear/dependencia.php"><i class="icon-plus"></i> Crear Dependencia</a></li>
                    <li><a href="Modulos/Crear/profesion.php"><i class="icon-plus"></i> Crear Profesion</a></li>

  <li><a href="#"><i class=""></i> ------------Solicitud Desarrollo-----------</a></li>


                      <li><a href="Modulos/Crear/sector.php"><i class="icon-plus"></i> 
                    Crear Sector</a></li>

  <li><a href="#"><i class=""></i> ------------Solicitud Comunidad-----------</a></li>
     <li><a href="Modulos/Crear/sector.php"><i class="icon-plus"></i> 
                    Crear Sector</a></li>

                    <li><a href="Modulos/Crear/remitido.php"><i class="icon-plus"></i> Crear Remitido</a></li>



  <li><a href="#"><i class=""></i> ----------------Proyectos-------------------</a></li>


                    <li><a href="Modulos/Crear/enteejecutor.php"><i class="icon-plus"></i>  Ente Ejecutor</a></li>



                  
                    <li><a href="Modulos/Crear/estadodelproyecto.php"><i class="icon-plus"></i>  Estado </a></li>
                    <li><a href="Modulos/Crear/estrategiadelproyecto.php"><i class="icon-plus"></i>  Estrategia </a></li>
                    <li><a href="Modulos/Crear/inversion.php"><i class="icon-plus"></i>  Sector de Inversion </a></li>
                    <li><a href="Modulos/Crear/subsector.php"><i class="icon-plus"></i>  SUB-Sector de Inversion </a></li>


                    <li><a href="#"><i class=""></i> -----------------Momentos------------------</a></li>


                    <li><a href="Modulos/Crear/momentoestructuracion.php"><i class="icon-plus"></i> Estructuracion</a></li>
                    <li><a href="Modulos/Crear/momentotablafinanciera.php"><i class="icon-plus"></i> Tabla Financiera</a></li>
                    
                    <li><a href="Modulos/Crear/momentoejecucion.php"><i class="icon-plus"></i> Ejecucion</a></li>
                    <li><a href="Modulos/Crear/momentoliquidacion.php"><i class="icon-plus"></i> Liquidacion</a></li>

                </ul>
              </li>
              </ul>



              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown">Usuarios<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/Usuarios/crear_usuario.php"><i class="icon-plus"></i> Crear Usuario</a></li>
                    <li><a href="Modulos/Usuarios/ver_usuario.php"><i class="icon-list"></i> Ver Usuarios</a></li>
                </ul>
              </li>

              <?php } elseif(($_SESSION['tipo_user']=='c')){	 ?>

              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Personal<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/Personal/crear_personal_supervisor.php"><i class="icon-plus"></i> Crear Personal</a></li>
                    <li><a href="Modulos/Personal/listado_personal_supervisor.php"><i class="icon-list"></i> Listado del Personal</a></li>
                </ul>
              </li>

              <li class="dropdown">
              	<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Proyectos<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="Modulos/Proyectos/listado_proyecto_supervisor.php"><i class="icon-list"></i> Listado de Proyectos</a></li>
                    <li><a href="Modulos/Proyectos/estructuracion_supervisor.php"><i class="icon-plus"></i> Estructuracion</a></li>
                    <li><a href="Modulos/Proyectos/tablafinanciera_supervisor.php"><i class="icon-plus"></i> Tabla Financiera</a></li>
                    
                    <li><a href="Modulos/Proyectos/ejecucion_supervisor.php"><i class="icon-plus"></i> Ejecucion</a></li>
                    <li><a href="Modulos/Proyectos/liquidacion_supervisor.php"><i class="icon-plus"></i> Liquidacion</a></li>
                </ul>
              </li>


              <?php }elseif($_SESSION['tipo_user']=='b'){	 ?>
                <li class="dropdown">
                
                    <a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Proyectos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="Modulos/Proyectos/listado_proyecto_usuariob.php"><i class="icon-list"></i> Listado de Proyectos</a></li>
                    </ul>
                  </li>


                  <li class="dropdown">
                    <a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown"> Plan de Desarrollo<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="Modulos/PlandeDesarrollo/listado_plan.php"><i class="icon-list"></i> Listado de Plan de Desarrollo</a></li>
                      <li><a href="Modulos/PlandeDesarrolloEje/listado_eje.php"><i class="icon-list"></i> Listado de Eje</a></li>
                      <li><a href="Modulos/PlandeDesarrolloEstrategia/listado_estrategia.php"><i class="icon-list"></i> Listado de Politicas</a></li>
                      <li><a href="Modulos/PlandeDesarrolloPrograma/listado_programa.php"><i class="icon-list"></i> Listado de Programa</a></li>
                      <li><a href="Modulos/PlandeDesarrolloSubprograma/listado_subprograma.php"><i class="icon-list"></i> Listado de Subprograma</a></li>
                      <li><a href="Modulos/PlandeDesarrolloMeta/listado_meta.php"><i class="icon-list"></i> Listado de Meta</a></li>
                    </ul>
                  </li>

              <?php } ?>




            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
              		<a href="#" style="color:#FFF" class="dropdown-toggle" data-toggle="dropdown">
                    	<b>Usuario:</b> <?php echo $_SESSION['user_name'].' '.$_SESSION['cod_user']; ?> <b class="caret"></b>
                    </a>
                	<ul class="dropdown-menu">
	                    <li><a href="perfil.php"><i class="icon-user"></i> Mi Perfil</a></li>
                      	<li class="divider"></li>
                      	<li><a href="index.html"><i class="icon-off"></i> Salir</a></li>
                    </ul>
                </li>
          	</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<!-- /container -->