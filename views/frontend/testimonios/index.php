<div id="centerlizer">
	<div class="full_width">
		<div class="container">			
			<div class="b_testimonios">
				<h3>Testimonios</h3>
				<div id="scrollbar1">
					<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
					<div class="viewport">
						<div class="overview">
							<?php
							if($testimonios):
							foreach($testimonios as $testimonio):?>					
							<div class="fila">              
								<div class="imagen_tes">                
									<img src="<?php echo $testimonio->imagen;?>" alt="<?php echo $testimonio->titulo;?>" />                
								</div>               
								<div class="testimonios">                
									<h4 class="nombre_tes"><?php echo $testimonio->titulo;?></h4>
									<span class="cargo"><?php echo $testimonio->cargo;?></span>                
									<div class="parrafos_test">
										<p>       
										<?php echo $testimonio->descripcion;?>
										</p> 
									</div>
								</div>
							</div><!-- end fila-->
							<?php endforeach; endif;?>

						</div>
					</div>
				</div><!-- end scrollbar1-->
			</div><!-- end b_testimonios-->
		</div>
	</div>
</div>
<script>
var imagenes_fondo =[{image : '<?php echo $config->imagen_testimonio;?>'}];
</script>