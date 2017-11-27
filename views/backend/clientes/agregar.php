<style type="text/css">
.inicio > a {
    color: #fff !important;
    background-color: #36a3ff !important;
}
</style>
<div id="cl-wrapper" class="fixed-menu">
  <?php $this->load->view('backend/layout/sidebar'); ?>
	<div class="container-fluid" id="pcont">    
		<div class="page-head">
      <h2>Clientes</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Clientes/index">Clientes</a></li>
          <li class="active">Agregar Clientes</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Agregar Cliente</h3>
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>              
                <div class="form-group">
                      <label class="col-sm-3 control-label">Nombre</label>
                      <div class="col-sm-6">
                      <input name="titulo" id="titulo" type="text" class="form-control" placeholder="" value=""></div>
                </div>
                <div class="form-group">
                            <label class="col-sm-3 control-label">Imagen: <br>231px x 164px</label>
                            <div class="col-sm-6">
                                <div id="img_slider" style="float:left;border: 1px solid #464646;">    
                                <img id="imgslider" src="web/backend/images/nodisponible.png" width="150" alt=""/>
                                </div>
                                <div id="container_slider" style="float:left; padding-left:5px;">
                                <div id="slider_cargador"></div>
                                <br />
                                <button id="pickfiles_slider" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                <button id="uploadfiles_slider" class="btn btn-danger">Subir</button>
                                </div>
                                <input type="hidden" id="vistaslider" name="vistaslider" value="" />
                                </div>
                </div>              
               
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="./backend/Clientes/index">Cancelar</a>
                    </div>
                 </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div> 
</div>
<script>
$(document).ready(function(){
    var carpeta = 'clientes';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
    var uploaderVideo = uploader('slider',hola,carpeta);
    uploaderVideo.init();
    $('#pickfiles_slider').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_slider').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderVideo.start();
            e.preventDefault();
    });
  });
</script>