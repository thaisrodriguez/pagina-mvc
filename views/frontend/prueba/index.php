<h1 class="titulo_home_seo">Elite Peru</h1>
<div class="slide" data-scroll-reveal="enter from the top">
	<div class="fill sin_padding">
		<div id="myCarousel" class="carousel slide carousel-fade">
			<div class="carousel-inner">
				<?php
				$i = 0;
				if($sliders):
				foreach($sliders as $slider):?>
				<div class="<?php if($i == 0): echo 'active'; endif;?> item">
				<div class="fill" data-color="<?php echo $slider->color_div;?>" data-imagen="<?php echo $slider->imagen;?>">
					<div class="container inside_ph">
						<div class="col-sm-6 col-md-6">
							<div class="imagen_homepro">
								<img src="<?php echo $slider->imagen2;?>" alt="">
							</div>							
							<h2 class="titulo_wh" style="color:<?php echo $slider->color_titulo;?>"><?php echo $slider->titulo;?></h2>
							<div class="resumen_wh" style="color:<?php echo $slider->color_titulo;?>">
								<?php echo $slider->descripcion;?>
							</div>
							<?php if($slider->link):?>
							<a href="<?php echo $slider->link;?>" target="_blank" class="more_bl" style="background:<?php echo $slider->color_boton_fondo;?>; color:<?php echo $slider->color_boton;?>">M&aacute;s detalles</a>
							<?php endif;?>
						</div>
						<div class="col-sm-6 col-md-6">
						</div>
					</div>
				</div>
				</div>
				<?php $i++;
				endforeach;
				endif;?>
			</div>
		  <div class="pull-center">
			<?php if(count($sliders) >= 2):?>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev"><img src="web/frontend/images/home/prev.png" alt=""></a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next"><img src="web/frontend/images/home/next.png" alt=""></a>
		  	<?php endif;?>
		  </div>
		</div>
	</div>
</div>
<div class="cat_productos">	
	<div class="container">
		<h2 class="text-center tit_prod" data-scroll-reveal="enter from the top"><img src="web/frontend/images/home/titulo-nuestros-productos.svg" alt="nuestros productos elite"></h2>
		<div class="row">
			<?php
			if($producto_nuevo):
			$catee = $this->egeneral_model->mostrar('categoria_productos',$producto_nuevo->categoria);?>
			<div class="col-xs-12 col-sm-6 col-md-4 text-center margen_b_prod fondo_new" data-scroll-reveal="enter left">
				<a href="productos/<?php echo $catee->nombreseo;?>/<?php echo $producto_nuevo->nombreseo;?>" class="image">
					<span class="rollover" ></span>
					<img src="<?php echo $producto_nuevo->imagen;?>" alt="<?php echo $producto_nuevo->titulo;?>">					
				</a>				
			</div>
			<?php 
			endif;?>
			<?php
			if($productos):
			foreach($productos as $producto):?>
			<div class="col-xs-12 col-sm-6 col-md-4 text-center margen_b_prod" data-scroll-reveal="enter from the bottom">
				<a href="productos/<?php echo $producto->nombreseo;?>" class="image name_prod">
					<span class="rollover" ></span>
					<img src="<?php echo $producto->imagen;?>" alt="<?php echo $producto->titulo;?>">
					<h3><?php echo $producto->titulo;?></h3>
				</a>
			</div>
			<?php
			endforeach;
			endif; ?>
		</div>
	</div>
	<div id="far-clouds" class="far-clouds stage"></div>
</div>
<div class="slide" data-scroll-reveal="enter from the bottom">
	<div class="fill sin_padding">
		<div id="myCarousel2" class="carousel slide carousel-fade">
			<div class="carousel-inner">
				<?php
				$ix = 0;
				if($promociones):
				foreach($promociones as $promocion):?>
				<div class="<?php if($ix == 0): echo 'active'; endif;?> item">
				  <div class="fill" data-imagen="<?php echo $promocion->imagen_promo;?>" style="background-image:url('<?php echo $promocion->imagen_promo;?>');">
					<a href="novedades/<?php echo $promocion->nombreseo;?>" class="vinculo"></a>
				  </div>
				</div>
				<?php $ix++;
				endforeach;
				endif;?>
			</div>		  
		</div>
	</div>
</div>
<!--
<div class="modal fade" id="popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="margin-top:50px;">
        <div class="modal-content" style="background:none;border:none;border-radius:0;box-shadow:none;margin-top:120px;">
            <div class="modal-body overflow-visible">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="http://elite.pe/novedades/canjea-los-lindos-vasos-elite-de-la-era-de-hielo"><img src="<?//=base_url()?>imagenes/home/pop-up-elite-la-era-de-hielo.png" style="width:100%;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->