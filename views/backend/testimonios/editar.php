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
      <h2>Testimonios</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Tv/index">Testimonios</a></li>
          <li class="active">Editar Testimonios</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Editar Testimonios</h3>
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>   
                <div class="form-group">
                      <label class="col-sm-3 control-label">Título</label>
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
                                    { name: 'Naranja', element: 'span', styles: { color: '#FF700C'}}
                                    ]); 
                                  
                                  });
                              </script>   
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Cargo</label>
                      <div class="col-sm-6">
                      <input name="cargo" id="cargo" type="text" class="form-control" placeholder="" value="<?php echo $datos->cargo;?>"></div>
                </div>
                <div class="form-group">
                            <label class="col-sm-3 control-label">Imagen: <br>121px x 117px*</label>
                            <div class="col-sm-6">
                                <div id="img_imagen" style="float:left;border: 1px solid #464646;">    
                                <img id="imgimagen" src="<?php echo $datos->imagen;?>" width="150" alt=""/>
                                </div>
                                <div id="container_imagen" style="float:left; padding-left:5px;">
                                <div id="imagen_cargador"></div>
                                <br />
                                <button id="pickfiles_imagen" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                <button id="uploadfiles_imagen" class="btn btn-danger">Subir</button>
                                </div>
                                <input type="hidden" id="vistaimagen" name="vistaimagen" value="<?php echo $datos->imagen;?>" />
                                </div>
                </div>
                
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input name="id" value="<?php echo $datos->id;?>" type="hidden" />
                      <input id="ControladorPadre" type="hidden" value="<?php echo $this->uri->segment(2);?>">
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="javascript:;" onclick="window.history.back();">Cancelar</a>
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
<style>
.mapa_contenedor{
      position: relative;
      max-width:860px !important;
      margin:0 auto; 
    }
#mapita {
    border: 0 none;
    height: auto;
    max-width: 100%;
  }
.maker {
      position: absolute;
      color:#FFF;
    }
</style>
<?php $timestamp = time();?>
<script>
var control_ = $("#ControladorPadre").val();
$(document).ready(function(){
    var carpeta = 'testimonios';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
    var uploaderIma = uploader('imagen',hola,carpeta);
    uploaderIma.init();
    $('#pickfiles_imagen').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_imagen').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderIma.start();
            e.preventDefault();
    });
  });
</script>