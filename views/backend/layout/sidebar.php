<div class="cl-sidebar">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img alt="Avatar" src="<?php echo $user->imagen;?>" width="50" height="50"></div>
              <div class="info">
                <a href="backend/"><?php echo $user->first_name;?></a>
                <img alt="Status" src="web/backend/images/state_online.png"> <span>Online</span>
              </div>
            </div>              
            <ul class="cl-vnavigation inicio">
              <li><a data-controlador="Backend" href="./backend/Backend/index"><i class="fa fa-home"></i><span>Datos Generales</span><span data-action="index" class="hide"></a></li>
              <li><a data-controlador="Home" href="./backend/Home/index"><i class="fa fa-desktop"></i><span>Inicio</span><span data-action="index" class="hide"></a></li>
              <li><a href="#"><i class="fa fa-folder-open" ></i><span>Productos</span></a> 
                  <ul class="sub-menu slide">
                    <li><a data-controlador="Productos" href="./backend/Productos/categorias">Lista de Categorías<span data-action="categorias" class="hide"></span></a></li>
                    <li><a data-controlador="Productos" href="./backend/Productos/productos">Lista de Productos<span data-action="productos" class="hide"></span></a></li>
                  </ul>
              </li>
              <li><a href="#"><i class="fa fa-fire" ></i><span>Novedades</span></a> 
                  <ul class="sub-menu slide">
                    <li><a data-controlador="Novedades" href="./backend/Novedades/index">Lista de Novedades<span data-action="index" class="hide"></span></a></li>
                  </ul>
              </li>
              <li><a data-controlador="Quienessomos" href="./backend/Quienessomos/index"><i class="fa fa-home"></i><span>Nosotros</span><span data-action="index" class="hide"></a></li>
              <li><a href="#"><i class="fa fa-folder-open" ></i><span>Tips</span></a> 
                  <ul class="sub-menu slide">
                    <li><a data-controlador="Tips" href="./backend/Tips/categorias">Lista de Categorías<span data-action="categorias" class="hide"></span></a></li>
                    <li><a data-controlador="Tips" href="./backend/Tips/tips">Lista de Tips<span data-action="tips" class="hide"></span></a></li>
                  </ul>
              </li>
              <li><a data-controlador="Tv" href="./backend/Tv/index"><i class="fa fa-home"></i><span>Tv</span><span data-action="index" class="hide"></a></li>
              <li><a data-controlador="Testimonios" href="./backend/Testimonios/index"><i class="fa fa-home"></i><span>Testimonios</span><span data-action="index" class="hide"></a></li>
              <li><a href="#"><i class="fa fa-envelope-o"></i><span>Bandejas</span></a> 
                  <ul class="sub-menu slide">
                    <li><a data-controlador="Buzon" href="./backend/Buzon/index">Contacto<span data-action="index" class="hide"></span></a></li>
                    <li><a data-controlador="Buzon" href="./backend/Buzon/matriculas">Atención al Cliente<span data-action="index" class="hide"></span></a></li>
                    
                  </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>