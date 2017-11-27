<div id="centerlizer">

	<div class="full_width">

		<div class="container">

			<div class="row">

				<div class="col-sm-6 col-md-6 text-center" data-scroll-reveal="enter from the left">

					<img src="<?php echo $datos->imagen;?>" alt="nina elite" class="imagen_int">

				</div>

				<div class="col-sm-6 col-md-6">

					<h2 class="titulo_interno" data-scroll-reveal="enter from the top"><?php echo $datos->titulo;?></h2>

					<div id="scrollbar1">

						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>

						<div class="viewport">

							<div class="overview">								

								<p><?php echo $datos->descripcion;?></p>								

							</div>

						</div>

					</div><!-- end scrollbar1-->

				</div><!-- end col-md -->

			</div><!-- end row -->

		</div>

	</div>

</div>

<script type="text/javascript">

	var imagenes_fondo =[{image : '<?php echo $datos->fondo;?>'}];

</script>