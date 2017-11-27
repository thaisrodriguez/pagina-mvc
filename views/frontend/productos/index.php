<div id="centerlizer">	

	<div class="full_all">

		<div class="full_width">

			<h1 data-scroll-reveal="enter from the top"><img src="web/frontend/images/productos/titulo-productos.svg" alt="nuestros productos elite"></h1>

		</div>

		<div class="full_heaven">

			<div id="far-clouds" class="far-clouds stage"></div>

			<div class="container">

				<div class="row">

				<?php if($categorias):

				foreach($categorias as $categoria):?>

					<div class="col-md-15 col-sm-3 text-center cat_prod">

						<a href="productos/<?php echo $categoria->nombreseo;?>"><img src="<?php echo $categoria->imagen;?>" alt="<?php echo $categoria->titulo;?>"></a>

						<h3 class="nom_cat"><?php echo $categoria->titulo;?></h3>

						<a href="productos/<?php echo $categoria->nombreseo;?>" class="mas_detalles">M&aacute;s detalles</a>

					</div>

				<?php endforeach; endif;?>

				</div>

			</div>	

		</div>		

	</div>

</div>

