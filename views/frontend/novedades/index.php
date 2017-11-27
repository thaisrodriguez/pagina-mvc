<div id="centerlizer">
	<div class="full_width">		
		<div class="container">			
			<div class="row">
				<?php
				if($novedades):
				foreach($novedades as $novedad):?>
				<div class="col-xs-12 col-md-3 columna">
					<a href="novedades/<?php echo $novedad->nombreseo;?>" data-scroll-reveal="enter top hustle 50px over 1.5s"> 
						<img src="web/frontend/images/novedades/hover.png" alt="vasos de La Era del Hielo" class="roll">
						<img src="<?php echo $novedad->imagen;?>" alt="<?php echo $novedad->titulo;?>" class="imagen_desk_visible">
						<img src="<?php echo $novedad->imagen_ipad;?>" alt="<?php echo $novedad->titulo;?>" class="imagen_ipad_visible">
					</a>					
				</div>
				<?php endforeach;
				endif;?>
			</div><!-- end row -->
			<div class="col-md-12 sombra">
				<img src="web/frontend/images/novedades/sombra-inferior.png" alt="">
			</div>
		</div>
	</div>
</div>