<div id="cl-wrapper" class="fixed-menu">
<?php $this->load->view('backend/layout/sidebar'); ?>
	<div class="container-fluid" id="pcont">    
		<div class="page-head">
      <h2>Buzón de Contacto</h2>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
             <h3>Mensaje de: <?php echo $datos->nombres;?></h3>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="block-flat">
           <div class="content no-padding">
                <h4 class="title">Información General</h4>
                <div class="list-group tickets">
                  <li href="#" class="list-group-item"><b>Nombres</b>: <?php echo $datos->nombres;?></li>
                  <li href="#" class="list-group-item"><b>Email</b>: <?php echo $datos->email;?></li>
                  <li href="#" class="list-group-item"><b>Teléfono</b>: <?php echo $datos->telefono;?></li> 
                  <li href="#" class="list-group-item"><b>Mensaje</b>: <?php echo $datos->mensaje;?></li>           
                  <li href="#" class="list-group-item"><b>Fecha</b>: <?php echo $datos->fecha;?></li>
                </div>  

                <a href="<?php echo base_url('backend/Buzon/index');?>" class="btn btn-success">Regresar</a>            
            </div>
          </div>
        </div>
      </div>
    </div>
	</div> 
</div>
<style> .btn-sm { padding: 0px 3px !important; }</style>