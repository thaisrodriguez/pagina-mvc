<div id="centerlizer">	
	<div class="full_all">	
		<div class="full_heaven">
			<h2><img src="web/frontend/images/productos/titulo-productos.svg" alt="nuestros productos"></h2>
			<div class="center_wall" style="background: url(<?php echo $categoria->fondo;?>)  repeat-x scroll 0 0 rgba(0, 0, 0, 0);">				
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-5 col-md-5">
							<div class="slider">
							<?php if($imagenes):
							foreach($imagenes as $imagen):?>
								<div class="slide">
									<div class="presentacion"><?php echo $imagen->titulo;?></div>
									<img src="<?php echo $imagen->imagen;?>" alt="<?php echo $imagen->titulo;?>">
								</div>
							<?php endforeach;
							endif;?>							
							</div>
						</div>
						<div class="col-xs-12 col-sm-7 col-md-7 f_smarth">
							<div class="encabezado">
								<h1 class="titulo_producto">
									<span><?php echo $categoria->titulo;?></span><div class="clearfix"></div>
									<span class="subcategoria"><?php echo $datos->titulo;?></span>
								</h1>
								<a href="productos" class="volver">Volver</a>	
							</div>							
							<div id="scrollbar1">
								<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
								<div class="viewport">
									<div class="overview">								
										<article class="descripcion">
											<p><?php echo $datos->descripcion;?></p>
										</article>
									</div>
								</div>
							</div><!-- end scrollbar1-->	
							<div class="carrousel_productos">								
								<div class="slider2">
									<?php
									if($productos):
									foreach($productos as $producto):?>
									<div class="slide ph">										
										<img src="<?php echo $producto->imagen;?>" alt="<?php echo $producto->titulo;?>">
										<h2><a href="productos/<?php echo $categoria->nombreseo;?>/<?php echo $producto->nombreseo;?>" class="active_ed"><?php echo $producto->titulo;?></a></h2>
									</div>
									<?php endforeach; endif;?>					
								</div>	
							</div>							
						</div>
					</div>
				</div>	
			</div>
		</div>		
	</div>
</div>
