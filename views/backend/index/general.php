<?php $settings = $this->egeneral_model->configuracion(); ?>
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
			<h2><center>Datos Generales</center></h2>
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
                      <input name="titulo" id="terminos" type="text" class="form-control" placeholder="Título Web" value="<?php echo $settings->titulo;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Descripción</label>
                      <div class="col-sm-6">
                      <input name="descripcion" id="descripcion" type="text" class="form-control" placeholder="Descripción Web" value="<?php echo $settings->descripcion;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Keywords</label>
                      <div class="col-sm-6">
                      <input name="keywords" id="keywords" type="text" class="form-control" placeholder="Keywords Web" value="<?php echo $settings->keywords;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Facebook</label>
                      <div class="col-sm-6">
                      <input name="facebook" id="facebook" type="text" class="form-control" placeholder="Url Facebook" value="<?php echo $settings->facebook;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Twitter</label>
                      <div class="col-sm-6">
                      <input name="twitter" id="twitter" type="text" class="form-control" placeholder="URL Twitter" value="<?php echo $settings->twitter;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Youtube</label>
                      <div class="col-sm-6">
                      <input name="youtube" id="youtube" type="text" class="form-control" placeholder="Youtube" value="<?php echo $settings->youtube;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">G Plus</label>
                      <div class="col-sm-6">
                      <input name="gplus" id="gplus" type="text" class="form-control" placeholder="" value="<?php echo $settings->gplus;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">LinkedIn</label>
                      <div class="col-sm-6">
                      <input name="linkedin" id="linkedin" type="text" class="form-control" placeholder="" value="<?php echo $settings->linkedin;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Link Trofeos</label>
                      <div class="col-sm-6">
                      <input name="trofeos" id="trofeos" type="text" class="form-control" placeholder="" value="<?php echo $settings->trofeos;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">E-mail Contacto</label>
                      <div class="col-sm-6">
                      <input name="email" id="email" type="text" class="form-control" placeholder="E-mail de contacto" value="<?php echo $settings->email;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">E-mail Postulantes</label>
                      <div class="col-sm-6">
                      <input name="e_distribuidores" id="e_distribuidores" type="text" class="form-control" placeholder="E-mail Distribuidores" value="<?php echo $settings->email_postulantes;?>"></div>
                </div>
                
                <div class="form-group">
                      <label class="col-sm-3 control-label">E-mail copia</label>
                      <div class="col-sm-6">
                      <input name="email_copia" id="email_copia" type="text" class="form-control" placeholder="E-mail copia" value="<?php echo $settings->email_copia;?>"></div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Puestos Actuales Disponibles</label>
                      <div class="col-sm-6">
                      <input name="puestos" id="puestos" type="text" class="form-control" placeholder="" value="<?php echo $settings->puestos;?>">
                      * Separado por ',' (comas) y sin espacio.</div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Puestos Generales</label>
                      <div class="col-sm-6">
                      <input name="puestos_2" id="puestos_2" type="text" class="form-control" placeholder="" value="<?php echo $settings->puestos_2;?>">
                      * Separado por ',' (comas) y sin espacio.</div>
                </div>
                <div class="form-group">
                      <label class="col-sm-3 control-label">Cómo llegaste a nosotros</label>
                      <div class="col-sm-6">
                      <input name="conociste" id="conociste" type="text" class="form-control" placeholder="" value="<?php echo $settings->conociste;?>">
                      * Separado por ',' (comas) y sin espacio.</div>
                </div>
                 <div class="form-group">
                  	  <label class="col-sm-3 control-label"></label>
	                  <div class="col-sm-6">
                      <input name="valido" type="hidden" value="1">
	                    <input type="submit" data-target="#mod-success" type="button" class="btn btn-success" value="Guardar">
	                    <a class="btn btn-default"  href="./backend/">Cancelar</a>
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
      <?php if($this->session->flashdata('aceptado')){ ?>
          $.gritter.add({
            position: 'bottom-right',
            title: 'Correcto',
            text: 'Los datos que has enviado, han sido actualizados correctamente.',
            image: 'web/backend/images/guardado_icono.png',
            class_name: 'clean',
            time: '9000'
          });
          return false;
      <?php } ?>
});
</script>