<div id="centerlizer">
	<div class="full_width">		
		<div class="container">
			<h1 class="titulo_interno"><?php echo $datos->slogan;?></h1>
			<div class="row">
				<div class="col-sm-3 col-md-3 column_izq">
					<h2><?php echo $datos->titulo;?></h2>
					<span class="descripcion"><?php echo $datos->descripcion;?></span>
					<span class="time"><?php echo $datos->tiempo;?></span>
					<div class="compartir">
						Compartir...
						<ul>
							<li><a href="#" class="face">Facebook</a></li>
							<li><a href="#" class="twit">twitter</a></li>
							<li><a href="#" class="goog">google mas</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9 col-md-9 column_der">
					<iframe width="100%" height="372" src="//www.youtube.com/embed/<?php echo $datos->video;?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
					<a href="tv" class="regresar">regresar</a>
				</div>
			</div><!-- end row -->
			<div class="col-md-12 sombra">
				<img src="web/frontend/images/tv/sombra-inferior.png" alt="">
			</div>
		</div>
	</div>
</div>
