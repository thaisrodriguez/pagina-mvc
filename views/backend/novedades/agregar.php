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
      <h2>Novedades</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Novedades/index">Novedades</a></li>
          <li class="active">Agregar</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Agregar</h3>
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>
              <div class="tab-container">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#datos">Datos Principales</a></li>
                      <li class=""><a data-toggle="tab" href="#imagenes">Imagenes</a></li>
                      <li class=""><a data-toggle="tab" href="#pasos">Pasos</a></li>
                      <li class=""><a data-toggle="tab" href="#lugares">Lugares de Canje</a></li>
                      <li class=""><a data-toggle="tab" href="#video">Video</a></li>
                      <li class=""><a data-toggle="tab" href="#adicionales">Datos Adicionales</a></li>
                    </ul>
                <div class="tab-content">
                  <div id="datos" class="tab-pane cont active"><!-- Tab -->
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Título</label>
                        <div class="col-sm-6">
                        <input name="titulo" id="titulo" type="text" class="form-control" placeholder="" value=""></div>
                  </div>
                  <div class="form-group">
                                <label class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-6">
                                 <textarea name="descripcion" cols="45" rows="7"  id="descripcion" type="text"></textarea>
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
                              <label class="col-sm-3 control-label">Imagen Principal: <br>1170px x 454px*</label>
                              <div class="col-sm-6">
                                  <div id="img_imagen" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgimagen" src="web/backend/images/nodisponible.png" width="150" alt=""/>
                                  </div>
                                  <div id="container_imagen" style="float:left; padding-left:5px;">
                                  <div id="imagen_cargador"></div>
                                  <br />
                                  <button id="pickfiles_imagen" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_imagen" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistaimagen" name="vistaimagen" value="" />
                                  </div>
                  </div>
                  <div class="form-group">
                              <label class="col-sm-3 control-label">Imagen Principal Ipad: <br>1170px x 454px*</label>
                              <div class="col-sm-6">
                                  <div id="img_imagen2" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgimagen2" src="web/backend/images/nodisponible.png" width="150" alt=""/>
                                  </div>
                                  <div id="container_imagen2" style="float:left; padding-left:5px;">
                                  <div id="imagen2_cargador"></div>
                                  <br />
                                  <button id="pickfiles_imagen2" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_imagen2" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistaimagen2" name="vistaimagen2" value="" />
                                  </div>
                  </div>
                  <div class="form-group">
                              <label class="col-sm-3 control-label">Imagen Promoción: <br>1920px x 1080px*</label>
                              <div class="col-sm-6">
                                  <div id="img_promo" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgpromo" src="web/backend/images/nodisponible.png" width="150" alt=""/>
                                  </div>
                                  <div id="container_promo" style="float:left; padding-left:5px;">
                                  <div id="promo_cargador"></div>
                                  <br />
                                  <button id="pickfiles_promo" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_promo" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistapromo" name="vistapromo" value="" />
                                  </div>
                  </div>
                </div><!-- Fin Tab -->
                  
                <div id="imagenes" class="tab-pane cont">
                        <div class="form-group">
                                    <label class="col-sm-3 control-label">Imagenes: <br>1920px x 1080px</label>
                                    <div class="col-sm-6">
                                        <div id="queue"></div>
                                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                                        <div style="width:100%;display:table;" id="interioresimg">
                                        </div>
                                    </div>
                        </div>
                </div>
                <div id="pasos" class="tab-pane cont">
                    <div class="form-group">
                                <label class="col-sm-3 control-label"><a href="javascript:;" id="agregar_" >Agregar Pasos</a> | <a href="javascript:;" id="borrar_" >Borrar Pasos</a></label>
                                <div class="col-sm-6">
                                    <div style="width:100%;display:table;" id="interior_pasos">
                                    </div>
                                </div>
                    </div>
                </div>
                <div id="lugares" class="tab-pane cont">
                    <div class="form-group">
                                <label class="col-sm-3 control-label"><a href="javascript:;" id="agregarcanje_" >Agregar Lugar</a> | <a href="javascript:;" id="borrarcanje_" >Borrar Lugar</a></label>
                                <div class="col-sm-6">
                                  <div style="width:100%;display:table;" id="interior_canje">
                                  </div>
                                </div>
                    </div>
                </div>
                <div id="video" class="tab-pane cont">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Video</label>
                        <div class="col-sm-6">
                        <input name="video" id="video" type="text" class="form-control" placeholder="" value=""></div>
                    </div>
                    <div class="form-group">
                              <label class="col-sm-3 control-label">Imagen Video: <br>1500px x 345px*</label>
                              <div class="col-sm-6">
                                  <div id="img_video" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgvideo" src="web/backend/images/nodisponible.png" width="150" alt=""/>
                                  </div>
                                  <div id="container_video" style="float:left; padding-left:5px;">
                                  <div id="video_cargador"></div>
                                  <br />
                                  <button id="pickfiles_video" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_video" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistavideo" name="vistavideo" value="" />
                                  </div>
                  </div>
                </div>
                <div id="adicionales" class="tab-pane cont">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> Título</label>
                        <div class="col-sm-6">
                        <input name="titulo_opcional" id="titulo_opcional" type="text" class="form-control" placeholder="" value=""></div>
                  </div>
                  <div class="form-group">
                                <label class="col-sm-3 control-label">Descripción Adicional</label>
                                <div class="col-sm-6">
                                 <textarea name="descripcion_opcional" cols="45" rows="7"  id="descripcion_opcional" type="text"></textarea>
                                </div>
                                <script type="text/javascript">
                                    jQuery(function() {
                                    CKEDITOR.replace(  'descripcion_opcional', { 
                                      stylesSet: 'estilos_x',
                                      toolbar :  [['Source','Bold', 'Italic', '−', 'NumberedList', 'BulletedList', '−', 'Link', 'Styles'] ],  enterMode : CKEDITOR.ENTER_BR, shiftEnterMode : CKEDITOR.ENTER_P, height: '150px' });
                                    
                                    });
                                </script>   
                  </div>
                </div>
                </div>
              </div>   
            
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input id="ControladorPadre" type="hidden" value="<?php echo $this->uri->segment(2);?>">
                      <input type="hidden" id="estado" name="estado" value="1" />
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
<?php $timestamp = time();?>
<script>
var control_ = $("#ControladorPadre").val();
$(document).ready(function(){
    var carpeta = 'novedades';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
    var uploaderIma = uploader('imagen',hola,carpeta);
    uploaderIma.init();
    $('#pickfiles_imagen').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_imagen').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderIma.start();
            e.preventDefault();
    });
    var uploaderIma2 = uploader('imagen2',hola,carpeta);
    uploaderIma2.init();
    $('#pickfiles_imagen2').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_imagen2').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderIma2.start();
            e.preventDefault();
    });
    var uploaderPromo = uploader('promo',hola,carpeta);
    uploaderPromo.init();
    $('#pickfiles_promo').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_promo').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderPromo.start();
            e.preventDefault();
    });
    var uploaderVideo = uploader('video',hola,carpeta);
    uploaderVideo.init();
    $('#pickfiles_video').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_video').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderVideo.start();
            e.preventDefault();
    });
  var counter = 0;
  var counter_canje = 0;
  $('#agregar_').click(function(){
     counter += 1;
     $('#interior_pasos').append(
     '<div id="paso__'+counter+'" style="display:block;"><b>Paso ' + counter + '</b><br />'
     + '<input class="form-control" id="field_' + counter + '" name="pasos[]' + '" type="text" /></div>' );   
  });
  $("#borrar_").click(function () {
    if(counter==1 || counter==0){
          return false;
       }   
    $("#paso__" + counter).remove();
    counter--;
  });
  $('#agregarcanje_').click(function(){
     counter_canje += 1;
     $('#interior_canje').append(
     '<div id="canje__'+counter_canje+'" style="display:block;"><b>Lugar de Canje ' + counter_canje + '</b><br />'
     + '<input class="form-control" id="lugar_' + counter_canje + '" name="canje[]' + '" type="text" /><br />' 
     + '<textarea class="form-control" id="lugar_des_' + counter_canje + '" name="canje_descripcion[]' + '" /></textarea></div>' );   
  });
  $("#borrarcanje_").click(function () {
    if(counter_canje==1 || counter_canje==0){
          return false;
    }   
    $("#canje__" + counter_canje).remove();
    counter_canje--;
  });
   // Udifi
     $('#file_upload').uploadify({
      'formData'     : {
        'timestamp' : '<?php echo $timestamp;?>',
        'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
        'carpeta'     : 'imagenes/'+carpeta+'/',
        'redimencionar'     : 'No',
        'folder'     : carpeta,
        'anchor' : '292',
        'altor' : '196',
        'tabla': 'novedades_imagenes'
        },
        'buttonText' : 'Seleccionar',
        'buttonClass' : 'btn btn-sm btn-default',
        'uploader' : '<?php echo site_url("backend/Uploadify/subir");?>/<?php echo $ultimoid->AUTO_INCREMENT;?>',
        swf           : '<?php echo site_url("web/backend/recursos/udify/uploadify.swf")?>',
        'onUploadComplete' : function(file) {
          listarimagenes(<?php echo $ultimoid->AUTO_INCREMENT;?>,'interioresimg');
         }
    });
});
   
</script>
 <style> .btn-sm { padding: 0px 3px !important; }</style>