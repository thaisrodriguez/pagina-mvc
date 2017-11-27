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
      <h2>Nosotros</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Quienessomos/index">Nosotros</a></li>
          <li class="active">Editar Principal</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Editar Nosotros</h3>
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>       
                <div class="form-group">
                      <label class="col-sm-3 control-label">Titulo</label>
                      <div class="col-sm-6">
                      <input name="titulo" id="titulo" type="text" class="form-control" placeholder="" value="<?php echo $datos->titulo;?>"></div>
                </div>
                <div class="form-group">
                              <label class="col-sm-3 control-label">Descripción</label>
                              <div class="col-sm-6">
                               <textarea name="descripcion" cols="45" rows="7"  id="descripcion" type="text"><?php echo $datos->descripcion;?></textarea>
                              </div>
                              <script type="text/javascript">
                                  jQuery(function() {
                                  CKEDITOR.replace(  'descripcion', { 
                                    stylesSet: 'estilos_x',
                                    toolbar :  [['Source','Bold', 'Italic', '−', 'NumberedList', 'BulletedList', '−', 'Link', 'Styles'] ],  enterMode : CKEDITOR.ENTER_BR, shiftEnterMode : CKEDITOR.ENTER_P, height: '150px' });
                                  
                                  CKEDITOR.stylesSet.add('estilos_x', [
                                    { name: 'Naranja', element: 'span', styles: { color: '#FF700C'}},
                                    { name: 'Cabeceras', element: 'h6', styles: { color: '#FF700C'}}
                                    ]); 
                                  
                                  });
                              </script>   
                </div>
                <div class="form-group">
                            <label class="col-sm-3 control-label">Imagen: <br>513px x 438px</label>
                            <div class="col-sm-6">
                                <div id="img_slider" style="float:left;border: 1px solid #464646;">    
                                <img id="imgslider" src="<?php echo $datos->imagen;?>" width="150" alt=""/>
                                </div>
                                <div id="container_slider" style="float:left; padding-left:5px;">
                                <div id="slider_cargador"></div>
                                <br />
                                <button id="pickfiles_slider" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                <button id="uploadfiles_slider" class="btn btn-danger">Subir</button>
                                </div>
                                <input type="hidden" id="vistaslider" name="vistaslider" value="<?php echo $datos->imagen;?>" />
                                </div>
                </div>             
                <div class="form-group">
                            <label class="col-sm-3 control-label">Fondo: <br>1500px x 209px*</label>
                            <div class="col-sm-6">
                                <div id="img_fondo" style="float:left;border: 1px solid #464646;">    
                                <img id="imgfondo" src="<?php echo $datos->fondo;?>" width="150" alt=""/>
                                </div>
                                <div id="container_fondo" style="float:left; padding-left:5px;">
                                <div id="fondo_cargador"></div>
                                <br />
                                <button id="pickfiles_fondo" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                <button id="uploadfiles_fondo" class="btn btn-danger">Subir</button>
                                </div>
                                <input type="hidden" id="vistafondo" name="vistafondo" value="<?php echo $datos->fondo;?>" />
                                </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input name="id" type="hidden" value="<?php echo $datos->id;?>">
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="./backend/Home/index">Cancelar</a>
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
    var carpeta = 'quienessomos';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
    var uploaderVideo = uploader('slider',hola,carpeta);
    uploaderVideo.init();
    $('#pickfiles_slider').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_slider').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderVideo.start();
            e.preventDefault();
    });
    var uploaderFondo = uploader('fondo',hola,carpeta);
    uploaderFondo.init();
    $('#pickfiles_fondo').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_fondo').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderFondo.start();
            e.preventDefault();
    });
  });
</script>