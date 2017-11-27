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
      <h2>Productos</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li class="active">Productos</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Editar Productos</h3>
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
                    </ul>
                <div class="tab-content">
                  <div id="datos" class="tab-pane cont active"><!-- Tab -->
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
                      <label class="col-sm-3 control-label">Categoría</label>
                      <div class="col-sm-6">
                      <select aria-controls="datatable-icons" size="1" id="categoria" class="form-control" name="categoria">
                      <?php foreach($lista_categoria as $categoria):?>
                      <option <?php if($categoria->id == $datos->categoria): echo 'selected="selected"';endif;?> value="<?php echo $categoria->id;?>"><?php echo $categoria->titulo;?></option>
                      <?php endforeach;?>
                      </select>
                      </div>
                </div>     
                <div class="form-group">
                            <label class="col-sm-3 control-label">Imagen: <br>292px x 271px</label>
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
                      <label class="col-sm-3 control-label">Producto nuevo</label>
                      <div class="col-sm-6"><input type="checkbox" name="p_nuevo" value="1" <?php if($datos->p_nuevo == 1): echo 'checked'; endif;?>/>
                      </div>
                </div>
                </div><!-- Fin Tab -->
                  
                 <div id="imagenes" class="tab-pane cont">
                        <div class="form-group">
                                    <label class="col-sm-3 control-label">Imagenes: <br>382px * 260px</label>
                                    <div class="col-sm-6">
                                        <div id="queue"></div>
                                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                                        <div style="width:100%;display:table;" id="interioresimg">
                                        </div>
                                    </div>
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
    var carpeta = 'productos';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
    var uploaderIma = uploader('imagen',hola,carpeta);
    uploaderIma.init();
    $('#pickfiles_imagen').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_imagen').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderIma.start();
            e.preventDefault();
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
        'tabla': 'productos_imagenes'
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