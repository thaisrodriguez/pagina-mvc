<ul id="ordenable">
	<?php if($imagenes): foreach($imagenes as $imagen): ?>
	<li id="item-<?php echo $imagen->id;?>">
		<div class="cliItem" ><img src="<?php echo $imagen->imagen;?>" width="146" height="84" />
			<div style='position:absolute; bottom:0; background-color:#000; color:#FFF;padding:5px; cursor:pointer;' onclick="borrarimagenes(<?php echo $imagen->id;?>,<?php echo  $imagen->id_padre;?>,'interioresimg');" >
				Borrar
			</div>
			<div style='position:absolute; bottom:0; background-color:#000; color:#FFF;padding:5px; cursor:pointer;left: 68px;' onclick="renombrar(<?php echo $imagen->id;?>,<?php echo  $imagen->id_padre;?>,'interioresimg','<?php echo $imagen->titulo;?>');" >
				Renombrar
			</div>
		</div>
	</li>
	<?php endforeach; endif;?>		
</ul>