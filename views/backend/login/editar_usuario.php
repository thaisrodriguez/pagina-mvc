<style type="text/css">
.micuenta > a {
    color: #fff !important;
    background-color: #36a3ff !important;
}
</style>
<div id="cl-wrapper" class="fixed-menu">
		<?php $this->load->view('backend/layout/sidebar'); ?>
	<div class="container-fluid" id="pcont">
		<div class="page-head">
			<h2>Panel De Usuario</h2>
		</div>		
      <div class="cl-mcont">    
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header">            
              <h3>Editando Usuario  <a href="backend/MiCuenta/pass"><span class="label label-primary pull-right">Cambiar Contraseña</span></a> </h3>          
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>      
                <br><span style="color:red;"><?php echo $message;?></span>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nombres</label>
                  <div class="col-sm-6">
                 <?php echo form_input($first_name);?>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label">Apellidos</label>
                  <div class="col-sm-6">
                  <?php echo form_input($last_name);?>
                  </div>
                </div>
                

                <div class="form-group">
                            <label class="col-sm-3 control-label">Foto<br>150 x 150px</label>
                            <div class="col-sm-6">
                                <div id="img_slider" style="float:left;border: 1px solid #464646;">    
                                <img id="imgslider" src="<?php echo $user->imagen?>" width="150" alt=""/>
                                </div>
                                <div id="container_slider" style="float:left; padding-left:5px;">
                                <div id="filelist"></div>
                                <br />
                                <button id="pickfiles_slider" class="btn btn-primary">Seleccione Im&aacute;gen</button>
                                <button id="uploadfiles_slider" class="btn btn-danger">Subir</button>
                                </div>
                                <input type="hidden" id="vistaslider" name="vistaslider" value="<?php echo $user->imagen?>" />
                                </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-3 control-label">* Contraseña</label>
                  <div class="col-sm-6">
                  <?php echo form_input($password);?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">* Confirmar contraseña</label>
                  <div class="col-sm-6">
                  <?php echo form_input($password_confirm);?>
                  </div>
                </div>


               <div class="form-group">
                  <input type="hidden" id="valido" name="valido" value="valido" />
                   <?php echo form_input($company);?>
                   <?php echo form_input($phone);?>

                  <?php echo form_hidden('id', $user->id);?>
                  <?php echo form_hidden($csrf); ?>
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-6">
                  <input type="submit" data-target="#mod-success" class="btn btn-success" value="Guardar">
                  <a class="btn btn-default" onclick="cancelar();">Cancelar</a>
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
.label{padding:0.2em !important;}
</style>
<script>
var alto = screen.height - 100;
jQuery('.cl-mcont').css("height", alto);

$(document).ready(function(){
    var carpeta = 'usuarios';
    var hola = '../web/backend/recursos/uploadphp/subir.php?carpeta='+carpeta;
    var uploaderVideo = uploader('slider',hola,carpeta);
    uploaderVideo.init();
    $('#pickfiles_slider').button({icons: {primary: 'ui-icon-image'},text: false});
    $('#uploadfiles_slider').button({icons: {primary: 'ui-icon-check'},text: false}).click(function(e) {
            uploaderVideo.start();
            e.preventDefault();
    });
  });
</script>