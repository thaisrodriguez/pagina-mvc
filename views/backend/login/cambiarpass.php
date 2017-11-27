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
              <h3>Cambiar contraseña</h3>              
            </div>
            <div class="content">
              <?php
              $attributes = array('class' => 'form-horizontal group-border-dashed', 'id' => 'formularios');
              echo form_open('', $attributes);
              ?>      
                <br><span style="color:red;"><?php echo $message;?></span>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Contraseña Actual</label>
                  <div class="col-sm-6">
                  <?php echo form_input($old_password);?>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label">Nueva Contraseña</label>
                  <div class="col-sm-6">
                  <?php echo form_input($new_password);?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Repetir nueva contraseña</label>
                  <div class="col-sm-6">
                  <?php echo form_input($new_password_confirm);?>
                  </div>
                </div>

               <div class="form-group">
                  <input type="hidden" id="valido" name="valido" value="valido" />
                  <input type="hidden" id="id" name="id" value="<?=$this->session->userdata('id_user')?>" />
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

<script>
var alto = screen.height - 100;
jQuery('.cl-mcont').css("height", alto);
</script>