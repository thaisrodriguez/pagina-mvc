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
      <h2>Home</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Home/index">Home</a></li>
          <li class="active">Editar</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Agregar Slider</h3>
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>    
                <div class="form-group">
                            <label class="col-sm-3 control-label">Slider: <br>1600px x 1120px</label>
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
                            <label class="col-sm-3 control-label">Imágen: <br>247px x 247px</label>
                            <div class="col-sm-6">
                                <div id="img_slider2" style="float:left;border: 1px solid #464646;">    
                                <img id="imgslider2" src="web/backend/images/nodisponible.png" width="150" alt=""/>
                                </div>
                                <div id="container_slider2" style="float:left; padding-left:5px;">
                                <div id="slider2_cargador"></div>
                                <br />
                                <button id="pickfiles_slider2" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                <button id="uploadfiles_slider2" class="btn btn-danger">Subir</button>
                                </div>
                                <input type="hidden" id="vistaslider2" name="vistaslider2" value="" />
                                </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Título</label>
                      <div class="col-sm-6">
                      <input type="text" value="" name="titulo" class="form-control"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Descripción</label>
                      <div class="col-sm-6">
                      <textarea name="descripcion" class="form-control"></textarea></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Link</label>
                      <div class="col-sm-6">
                      <input type="text" value="" name="link" class="pick-a-color form-control"></div>
                </div>   
                <div class="form-group">
                      <label class="col-sm-3 control-label">Color Texto</label>
                      <div class="col-sm-6">
                      <input type="text" value="" name="color_titulo" class="pick-a-color form-control color"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Color Botón</label>
                      <div class="col-sm-6">
                      <input type="text" value="" name="color_boton_fondo" class="pick-a-color form-control color_boton_fondo"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Color Texto Botón</label>
                      <div class="col-sm-6">
                      <input type="text" value="" name="color_boton" class="pick-a-color form-control color_boton"></div>
                </div>   
                <div class="form-group">
                      <label class="col-sm-3 control-label">Color Fondo</label>
                      <div class="col-sm-6">
                      <input type="text" value="" name="color_div" class="pick-a-color form-control color_div"></div>
                </div>  
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input name="id" type="hidden" value="<?php echo $datos->id;?>">
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="javascript:;" onclick="window.history.back();">Cancelar</a>
                    </div>
                 </div>
              
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
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
    var carpeta = 'home';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
    var uploaderVideo = uploader('slider',hola,carpeta);
    uploaderVideo.init();
    $('#pickfiles_slider').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_slider').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderVideo.start();
            e.preventDefault();
    });
    var uploaderVideo2 = uploader('slider2',hola,carpeta);
    uploaderVideo2.init();
    $('#pickfiles_slider2').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_slider2').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderVideo2.start();
            e.preventDefault();
    });
    $(".color").pickAColor();
    $(".color_boton_fondo").pickAColor();
    $(".color_boton").pickAColor();
    $(".color_div").pickAColor();
  });
</script>