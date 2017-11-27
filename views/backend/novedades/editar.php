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
          <li class="active">Editar</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Editar</h3>
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
                              <label class="col-sm-3 control-label">Imagen Principal: <br>1170px x 454px*</label>
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
                              <label class="col-sm-3 control-label">Imagen Principal Ipad: <br>1170px x 454px*</label>
                              <div class="col-sm-6">
                                  <div id="img_imagen2" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgimagen2" src="<?php echo $datos->imagen_ipad;?>" width="150" alt=""/>
                                  </div>
                                  <div id="container_imagen2" style="float:left; padding-left:5px;">
                                  <div id="imagen2_cargador"></div>
                                  <br />
                                  <button id="pickfiles_imagen2" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_imagen2" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistaimagen2" name="vistaimagen2" value="<?php echo $datos->imagen_ipad;?>" />
                                  </div>
                  </div>
                  <div class="form-group">
                              <label class="col-sm-3 control-label">Imagen Promoción: <br>1920px x 1080px*</label>
                              <div class="col-sm-6">
                                  <div id="img_promo" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgpromo" src="<?php echo $datos->imagen_promo;?>" width="150" alt=""/>
                                  </div>
                                  <div id="container_promo" style="float:left; padding-left:5px;">
                                  <div id="promo_cargador"></div>
                                  <br />
                                  <button id="pickfiles_promo" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_promo" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistapromo" name="vistapromo" value="<?php echo $datos->imagen_promo;?>" />
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
                                    <?php                                    
                                    $pasitos = json_decode($datos->pasos);
                                    if($pasitos):
                                    $i = 1;
                                    foreach($pasitos as $paso):?>
                                      <div id="paso__<?php echo $i;?>" style="display:block;"><b>Paso <?php echo $i;?></b><br />
                                          <input class="form-control" id="field_<?php echo $i;?>" name="pasos[]" value="<?php echo $paso->paso;?>" type="text" />
                                      </div>
                                    <?php $i++; endforeach; endif;?>
                                    </div>
                                </div>
                    </div>
                </div>
                <div id="lugares" class="tab-pane cont">
                    <div class="form-group">
                                <label class="col-sm-3 control-label"><a href="javascript:;" id="agregarcanje_" >Agregar Lugar</a> | <a href="javascript:;" id="borrarcanje_" >Borrar Lugar</a></label>
                                <div class="col-sm-6">
                                  <div style="width:100%;display:table;" id="interior_canje">
                                  <?php
                                  $lugares = json_decode($datos->lugares);
                                  if($lugares):
                                  $ix = 1;
                                  foreach($lugares as $lugar):?>
                                    <div id="canje__<?php echo $ix;?>" style="display:block;"><b>Lugar de Canje</b><br />
                                      <input class="form-control" id="lugar_<?php echo $ix;?>" name="canje[]" type="text" value="<?php echo $lugar->lugar;?>" /><br />
                                      <textarea class="form-control" id="lugar_des_<?php echo $ix;?>" name="canje_descripcion[]" /><?php echo $lugar->descripcion;?></textarea></div>
                                  <?php $ix++; endforeach; endif;?>
                                  </div>
                                </div>
                    </div>
                </div>
                <div id="video" class="tab-pane cont">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Video</label>
                        <div class="col-sm-6">
                        <input name="video" id="video" type="text" class="form-control" placeholder="" value="<?php echo $datos->video;?>"></div>
                    </div>
                    <div class="form-group">
                              <label class="col-sm-3 control-label">Imagen Video: <br>1500px x 345px*</label>
                              <div class="col-sm-6">
                                  <div id="img_video" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgvideo" src="<?php echo $datos->imagen_video;?>" width="150" alt=""/>
                                  </div>
                                  <div id="container_video" style="float:left; padding-left:5px;">
                                  <div id="video_cargador"></div>
                                  <br />
                                  <button id="pickfiles_video" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_video" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistavideo" name="vistavideo" value="<?php echo $datos->imagen_video;?>" />
                                  </div>
                  </div>
                </div>
                <div id="adicionales" class="tab-pane cont">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> Título</label>
                        <div class="col-sm-6">
                        <input name="titulo_opcional" id="titulo_opcional" type="text" class="form-control" placeholder="" value="<?php echo $datos->titulo_opcional;?>"></div>
                  </div>
                  <div class="form-group">
                                <label class="col-sm-3 control-label">Descripción Adicional</label>
                                <div class="col-sm-6">
                                 <textarea name="descripcion_opcional" cols="45" rows="7"  id="descripcion_opcional" type="text"><?php echo $datos->descripcion_opcional;?></textarea>
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
                      <input name="id" id="id" type="hidden" value="<?php echo $datos->id;?>" />
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
  listarimagenes(<?php echo $datos->id;?>,'interioresimg');
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
  var counter = <?php echo count($pasitos);?>;
  var counter_canje = <?php echo count($lugares);?>;
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
        'uploader' : '<?php echo site_url("backend/Uploadify/subir");?>/<?php echo $datos->id;?>',
        swf           : '<?php echo site_url("web/backend/recursos/udify/uploadify.swf")?>',
        'onUploadComplete' : function(file) {
          listarimagenes(<?php echo $datos->id;?>,'interioresimg');
         }
    });
});
   
</script>
 <style> .btn-sm { padding: 0px 3px !important; }</style>