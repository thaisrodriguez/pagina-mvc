<div id="centerlizer">
	<div class="full_width">
		<div class="container">
			<h1 class="titulo_interno">En todo momento, Elite siempre contigo</h1>
			<div class="row">
				<?php if($listado): foreach($listado as $lista):?>
				<div class="col-xs-6 col-sm-3 col-md-3 portafolio_item">
					<a href="tv/<?php echo $lista->nombreseo;?>">
						<div class="roll" >
							<span class="iconito"><img src="web/frontend/images/tv/icono_roll.png"></span>
							<h2><?php echo $lista->titulo;?></h2>
							<span class="descripcion"><?php echo $lista->descripcion;?></span>
							<span class="time"><?php echo $lista->tiempo;?></span>
						</div>
						<img src="<?php echo $lista->imagen;?>" alt="<?php echo $lista->titulo;?>">
					</a>
				</div>
				<?php endforeach; endif;?>
			</div><!-- end row -->
			<div class="col-md-12 sombra">
				<img src="web/frontend/images/tv/sombra-inferior.png" alt="">
				<div class="paginacion">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
</div>