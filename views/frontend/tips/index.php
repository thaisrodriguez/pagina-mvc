<div id="centerlizer">		
	<div class="row sn_margin alto">
		<?php if($tips): foreach($tips as $tip):
		if($tip->id == 1):
			$clase = 'hogar';
			$clase2 = 'lateral_a';
		else:
			$clase = 'dia';
			$clase2 = 'lateral_b';
		endif;
		?>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 sn_padding fondo1" style="background: url('<?php echo $tip->imagen;?>') no-repeat scroll center top / cover rgba(0, 0, 0, 0); !important">
			<a href="tips/<?php echo $tip->nombreseo;?>" class="<?php echo $clase;?>"><?php echo $tip->titulo;?></a>
			<div class="<?php echo $clase2;?>"></div>
		</div>
		<?php endforeach; endif;?>		
	</div><!-- end row -->
</div>
