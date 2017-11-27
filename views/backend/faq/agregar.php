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
      <h2>PREGUNTAS FRECUENTES</h2>
      <ol class="breadcrumb">
          <li><a href="backend/Backend/index">Inicio</a></li>
          <li><a href="backend/Faq/index">Preguntas Frecuentes</a></li>
          <li class="active">Agregar</li>
      </ol>
    </div>       
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">          
          <div class="block-flat">
            <div class="header">              
              <h3>Agregar Pregunta Frecuente</h3>
            </div>
            <div class="content">
                <?php
                $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
                echo form_open('', $attributes);
                ?> 
                <div class="form-group">
                      <label class="col-sm-3 control-label">Pregunta</label>
                      <div class="col-sm-6">
                      <input name="titulo" id="titulo" type="text" class="form-control" placeholder="" value=""></div>
                </div>
                <div class="form-group">
                              <label class="col-sm-3 control-label">Respuesta</label>
                              <div class="col-sm-6">
                               <textarea name="descripcion" cols="45" rows="7"  id="descripcion" type="text"></textarea>
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
                      <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
                      <input id="ControladorPadre" type="hidden" value="<?php echo $this->uri->segment(2);?>">
                      <input type="hidden" id="estado" name="estado" value="1" />
                      <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
                      <a class="btn btn-default"  href="./backend/Faq/index">Cancelar</a>
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
    var carpeta = 'faq';
    var hola = '<?php echo base_url("backend/ServerUpload/index");?>?carpeta='+carpeta;
      
});
</script>
 <style> .btn-sm { padding: 0px 3px !important; }</style>