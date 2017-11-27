<div class="full_ancho">
	<div class="container">
		<a href="novedades" class="volver">Volver</a>
		<div class="b_derecho">
			<h2><?php echo $datos->titulo;?></h2>
			<p><?php echo $datos->descripcion;?></p>
		</div>
	</div>
</div>
<div class="slide" data-scroll-reveal="enter from the top">
	<div class="fill sin_padding">
		<div id="myCarousel" class="carousel slide carousel-fade">
			<div class="carousel-inner">
				<?php
				if($imagenes):
					$j = 1;
				foreach($imagenes as $imagen):?>
				<div class="<?php if($j == 1): echo 'active'; endif;?> item">
				  <div class="fill" style="background-image:url('<?php echo $imagen->imagen;?>');">
					<div class="container">				      
					</div>
				  </div>
				</div>
				<?php $j++; endforeach; endif;?>
			</div>
		<?php if(count($imagenes) >= 2):?>
		  <div class="pull-center">
			<a class="carousel-control left" href="#myCarousel" data-slide="prev"><img src="web/frontend/images/home/prev.png" alt=""></a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next"><img src="web/frontend/images/home/next.png" alt=""></a>
		  </div>
		<?php endif;?>
		</div>
	</div>
</div><!-- End Slide-->
<div class="wrapper_video">
	<div class="height_auto">
		<div class="f_video" style="background: url('<?php echo $datos->imagen_video;?>') no-repeat scroll center top / cover rgba(0, 0, 0, 0) !important; ">
		<?php
		if($datos->video):?>
			<a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="<?php echo $datos->video;?>" class="play"><img src="web/frontend/images/novedades/play.png" alt=""></a>	
		<?php
		endif;?>		
		</div>
		<div class="f_pasos">
			<div class="container">
				<div class="row">
					<h2 class="tit_pasos">Como canjear</h2>
					<?php
					if($datos->pasos):
					$i = 1;
					$pasotes = json_decode($datos->pasos);
					$ii = 0;
					foreach($pasotes as $pasitos):?>
					<div class="col-xs-6 col-sm-6 col-md-3 text-center b_pasos">
						<div class="button_orange" data-scroll-reveal="enter left move 50px, after  <?php echo $ii;?>s" style="background:#f9a103"><?php echo $i;?></div>
                        <div class="shadow"><img src="web/frontend/images/novedades/sombra.png" alt="" /></div>
						<p class="p_breve"><?php echo $pasitos->paso;?></p>
					</div>
					<?php $i++; $ii += 0.3; endforeach; endif;?>
				</div>	
			</div>			
		</div>		
	</div>	
</div><!-- End bloque Video-->
<div class="centros">
	<div class="cell">
		<div class="container" style="overflow:hidden; margin-bottom:20px">
			<?php if($datos->titulo_opcional):?>
			<h2 class="tit_centros" data-scroll-reveal="enter right move 50px"><?php echo $datos->titulo_opcional;?></h2>
			<div class="row">
				
					<div class="col-md-12 all_loxdis item_lxd">
						<?php
							echo $datos->descripcion_opcional;
						?>
					</div>
			</div><!-- End Row -->
			<?php endif;?>
			
			<h2 class="tit_centros" data-scroll-reveal="enter right move 50px">Centros de canje</h2>
			<div class="row">
				<?php
				if($datos->lugares):
				$o = 1;
				$lugarsotes = json_decode($datos->lugares);
				$iix = 0;
				foreach($lugarsotes as $lugar):?>
				<div class="col-md-3 alto_puntos" data-scroll-reveal="enter top move 50px, after  <?php echo $ii;?>s">
					<h2 class="nom_local"><?php echo $lugar->lugar;?></h2>
					<div class="all_loxdis">
						<?php
							echo $this->milibreria->agregar_li($lugar->descripcion);
						?>
					</div>
				</div>
				<?php $iix += 0.3; $o++; if($o == 5): echo '<div class="clearfix"></div>'; $o = 1; endif; endforeach; endif;?>		
			</div><!-- End Row -->
		</div><!-- Container -->
	</div>
</div><!-- End centros -->	
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>           
	        <div class="cont_video">
	            <iframe width="100%" height="400" src=""></iframe>
	        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
cantidad = jQuery('.b_pasos').length;
valor = parseInt(12 / cantidad);
jQuery('.b_pasos').each(function(index) {
		$(this).removeClass('col-sm-3');
		$(this).removeClass('col-md-3');
		$(this).addClass('col-sm-'+valor);
		$(this).addClass('col-md-'+valor);
	});
});
</script>
