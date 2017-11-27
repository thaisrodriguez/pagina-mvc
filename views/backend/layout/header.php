<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header" >
        <a class="navbar-brand" style="padding:10px 0 !important; width:250px" href="./backend/"><img height="40" style="margin-top:2px;" src="web/frontend/images/general/elite.svg"></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        </ul>

    <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="<?php echo $user->imagen;?>" width="30" height="30" /><?php echo $user->first_name;?> <?php echo $user->last_name;?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="./" target="_blank">Ver Website</a></li>
          <li><a href="./backend/MiCuenta">Mi Cuenta</a></li>
          <li><a href="./backend/salir">Salir</a></li>
        </ul>
      </li>
    </ul>			

  </div><!--/.nav-collapse -->

    </div>

  </div>