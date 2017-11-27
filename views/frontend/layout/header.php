<header>
    <nav class="navbar cabezal navbar-default" role="navigation">
        <div class="container">            
            <div class="navbar-header">                
                <h2 class="elite_logo"><a href="index.php" class="navbar-brand"><img src="web/frontend/images/general/elite.svg" title="Elite maxima suavidad" alt="Elite"></a></h2>
                <ul class="sociales socia_smarth">
                    <li><a href="<?php echo $config->youtube;?>" target="_blank" class="youtube">youtube</a></li>                    
                    <li><a href="<?php echo $config->facebook;?>" target="_blank" class="facebook">facebook</a></li>
                </ul>                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acoplar">
                    <span class="sr-only">toggle Navigation</span>                    
                    <span class="la">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>                                            
                </button>
                <div class="menu">MENU</div>
            </div>            
            <div class="collapse navbar-collapse navbar-right" id="acoplar">
                <ul class="sociales navbar-right sociales_no_smarth">
                    <li><a href="<?php echo $config->youtube;?>" target="_blank" class="youtube">youtube</a></li>                    
                    <li><a href="<?php echo $config->facebook;?>" target="_blank" class="facebook">facebook</a></li>
                </ul>
                <div class="clearfix"></div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url();?>" class="m-home">Inicio</a></li>
                    <li><a href="<?php echo site_url('productos');?>" class="m-productos">Productos</a></li>
                    <li><a href="<?php echo site_url('novedades');?>" class="m-novedades">Novedades</a></li>
                    <li><a href="<?php echo site_url('nosotros');?>" class="m-nosotros">Nosotros</a></li>
                    <li><a href="<?php echo site_url('tips');?>" class="m-tips">Tips</a></li>
                    <li><a href="<?php echo site_url('tv');?>" class="m-tv">Tv</a></li>
                    <li><a href="<?php echo site_url('contactenos');?>" class="m-contacto sin_lin">Cont&aacute;ctanos</a></li>
                </ul>                
            </div>
        </div>
    </nav>
</header>