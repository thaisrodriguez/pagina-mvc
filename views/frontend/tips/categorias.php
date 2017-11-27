<?php
if($categoria->id == 1):
	$prin_css = 'hogar';
else:
	$prin_css = 'dia';
endif;
?>
<div id="centerlizer">
	<div class="full_width">
		<div class="container">
			<div class="return">
				<?php if($categoria->id != 1):?>
					<a href="tips/en-el-hogar" class="return_hogar" title="En el hogar">En el Hogar</a>
				<?php else:?>
					<a href="tips/dia-dia" class="return_dia" title="En el día a día">En el Día a Día</a>
				<?php endif;?>
			</div>
			<div class="row">
				<div class="col-sm-3 col-md-2">
						<h2 class="estilo_<?php echo $prin_css;?>"><?php echo $categoria->titulo;?></h2>
					<div style="width:98%">			
						<div class="slider">
						<?php if($tips_lista): foreach($tips_lista as $listado):?>
							
							<?php if($categoria->id != 1):?>
								<div class="slide linkd">
							<?php else:?>
								<div class="slide linkh">
							<?php endif;?>
							<a href="tips/<?php echo $categoria->nombreseo;?>/<?php echo $listado->nombreseo;?>"><?php echo $this->milibreria->recortar_palabras($listado->titulo,60);?></a></div>
						<?php endforeach; endif;?>
						</div><!-- end slider-->
					</div>
				</div>
				<div class="col-sm-4 col-md-4 imagen_tip text-center">
					<img src="<?php echo $datos->imagen;?>" alt="<?php echo $datos->titulo;?>">
				</div>
				<div class="col-sm-5 col-md-6">
					<h1 class="tip_<?php echo $prin_css;?>"><?php echo $datos->titulo;?></h1>					
					<div id="scrollbar1">
						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
						<div class="viewport">
							<div class="overview">								
								<p><?php echo $datos->descripcion;?>.</p>
							</div>
						</div>
					</div><!-- end scrollbar1-->
					<div class="compartir">
						<img src="web/frontend/images/tips/compartir.jpg" alt="compartir">
					</div>
				</div><!-- end col-md -->
			</div><!-- end row -->
		</div>
	</div>
</div>
