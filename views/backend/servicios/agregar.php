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
      <h2>Servicios</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Servicios/index">Servicios</a></li>
          <li class="active">Agregar Servicios</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Agregar Servicio</h3>
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>        
                <div class="form-group">
                      <label class="col-sm-3 control-label">Nombre</label>
                      <div class="col-sm-6">
                      <input name="titulo" id="titulo" type="text" class="form-control" placeholder="" value="">
                      * Para texto en color naranja, encerrar entre etiquetas &lt;naranja&gt; &lt;/naranja&gt;</div>
                </div>
                <div class="form-group">
                              <label class="col-sm-3 control-label">Descripcion</label>
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
                      <label class="col-sm-3 control-label">Url SEO</label>
                      <div class="col-sm-6">
                      <input name="seo" id="seo" type="text" class="form-control" placeholder="" value=""></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Posición imagen</label>
                      <div class="col-sm-6">
                      <input name="posicion" id="posicion" type="text" class="form-control" placeholder="" value=""></div>
                </div>   
                <div class="form-group">
                      <label class="col-sm-3 control-label">Posición imagen Hover</label>
                      <div class="col-sm-6">
                      <input name="posicion_over" id="posicion_over" type="text" class="form-control" placeholder="" value=""></div>
                </div>   
                <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input id="ControladorPadre" type="hidden" value="<?php echo $this->uri->segment(2);?>">
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="./backend/Servicios/index">Cancelar</a>
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
    var carpeta = 'oficinas';
    var hola ='<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
});
</script>