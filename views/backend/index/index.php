<?php $settings = $this->egeneral_model->configuracion(); ?>
<style type="text/css">
.inicio > a {
    color: #fff !important;
    background-color: #36a3ff !important;
}
</style>
<div id="cl-wrapper" class="fixed-menu">
  <?php $this->load->view('backend/layout/sidebar'); ?>
  <div class="container-fluid" id="pcont" style="background-color:#f9f9f9">    
    <div class="page-head">
      <h2><center>ADMINISTRACIÓN</center></h2>
    </div>          
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">      
          <div class="block-flat">
            <div class="content">
             <?php
$attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
echo form_open('', $attributes);
?>              
                <div class="form-group">
                      <label class="col-sm-3 control-label">Titulo</label>
                      <div class="col-sm-6">
                      <input name="titulo" id="titulo" type="text" class="form-control" placeholder="Título" value="<?php echo $settings->titulo;?>"></div>
                </div>
                <div class="form-group">
                              <label class="col-sm-3 control-label">Descripción</label>
                              <div class="col-sm-6">
                               <textarea name="descripcion" cols="45" rows="4"  id="descripcion" class="form-control"><?php echo $settings->descripcion;?></textarea>
                              </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Email Contacto</label>
                      <div class="col-sm-6">
                      <input name="email" id="email" type="text" class="form-control" placeholder="" value="<?php echo $settings->email;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Email Atención al Cliente</label>
                      <div class="col-sm-6">
                      <input name="email_atencion" id="email_atencion" type="text" class="form-control" placeholder="" value="<?php echo $settings->email_atencion;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Email Copia</label>
                      <div class="col-sm-6">
                      <input name="email_copia" id="email_copia" type="text" class="form-control" placeholder="" value="<?php echo $settings->email_copia;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Facebook</label>
                      <div class="col-sm-6">
                      <input name="facebook" id="facebook" type="text" class="form-control" placeholder="" value="<?php echo $settings->facebook;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Youtube</label>
                      <div class="col-sm-6">
                      <input name="youtube" id="youtube" type="text" class="form-control" placeholder="" value="<?php echo $settings->youtube;?>"></div>
                </div>
                <div class="form-group">
                              <label class="col-sm-3 control-label">Fondo Testimonios: <br>1500px x 667px</label>
                              <div class="col-sm-6">
                                  <div id="img_imagen2" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgimagen2" src="<?php echo $settings->imagen_testimonio;?>" width="150" alt=""/>
                                  </div>
                                  <div id="container_imagen2" style="float:left; padding-left:5px;">
                                  <div id="imagen2_cargador"></div>
                                  <br />
                                  <button id="pickfiles_imagen2" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_imagen2" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistaimagen2" name="vistaimagen2" value="<?php echo $settings->imagen_testimonio;?>" />
                                  </div>
                  </div>
                <div class="form-group">
                              <label class="col-sm-3 control-label">Imagen Contacto: <br>449px x 407px</label>
                              <div class="col-sm-6">
                                  <div id="img_imagen" style="float:left;border: 1px solid #464646;">    
                                  <img id="imgimagen" src="<?php echo $settings->imagen_contacto;?>" width="150" alt=""/>
                                  </div>
                                  <div id="container_imagen" style="float:left; padding-left:5px;">
                                  <div id="imagen_cargador"></div>
                                  <br />
                                  <button id="pickfiles_imagen" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                  <button id="uploadfiles_imagen" class="btn btn-danger">Subir</button>
                                  </div>
                                  <input type="hidden" id="vistaimagen" name="vistaimagen" value="<?php echo $settings->imagen_contacto;?>" />
                                  </div>
                  </div>
                  <div class="form-group">
                              <label class="col-sm-3 control-label">Descripción Atención al Cliente</label>
                              <div class="col-sm-6">
                               <textarea name="descripcion_contacto" cols="45" rows="7"  id="descripcion_contacto" type="text"><?php echo $settings->descripcion_contacto;?></textarea>
                              </div>
                              <script type="text/javascript">
                                  jQuery(function() {
                                  CKEDITOR.replace(  'descripcion_contacto', { 
                                    stylesSet: 'estilos_x',
                                    toolbar :  [['Source','Bold', 'Italic', '−', 'NumberedList', 'BulletedList', '−', 'Link', 'Styles'] ],  enterMode : CKEDITOR.ENTER_BR, shiftEnterMode : CKEDITOR.ENTER_P, height: '150px' });
                                  
                                  CKEDITOR.stylesSet.add('estilos_x', [
                                    { name: 'Descripción', element: 'p', styles: { color: '#a3a3a3', 'font-family': '"Signika",sans-serif !important','font-size': '16px', 'text-align':'justify'}},
                                    { name: 'Cabeceras', element: 'h4', styles: { color: '#8cc3e7','font-style': 'italic'}},
                                    { name: 'Texto Celeste', element: 'div', class:'fila', styles: { color: '#8cc3e7'}}
                                    ]); 
                                  
                                  });
                              </script>   
                </div>
                 <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="./backend/Backend/index">Cancelar</a>
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
$(document).ready(function() {
  var carpeta = 'principal';
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
      <?php if($this->session->flashdata('aceptado')){ ?>
          $.gritter.add({
            position: 'bottom-right',
            title: 'Correcto',
            text: 'Los datos que has enviado, han sido actualizados correctamente.',
            image: 'web/backend/images/guardado_icono.png',
            class_name: 'clean',
            time: '9000'
          });
      <?php } ?>
});
</script>