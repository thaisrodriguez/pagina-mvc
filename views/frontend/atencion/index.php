<div id="centerlizer">
	<div class="full_width">
		<div class="container">
			<h2 class="titulo_interno"><img src="web/frontend/images/atencion/titulo-atencion.svg" alt="Atencion al cliente Elite" class="imagen_int"></h2>
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<form role="form" id="ajax-form">
						<div class="form-group">
							<input type="text" class="form-control" name="nombre" id="nombre" placeholder="* Nombres y Apellidos">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="email" id="email" placeholder="* Email">
						</div>	
						<div class="form-group">
							<input type="text" class="form-control" name="telefono" id="telefono" placeholder="* Telefono">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="* Ciudad">
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="5" name="mensaje"  placeholder="Comentarios..."></textarea>
						</div>
						<div class="form-group p_botones">
							<label for="ejemplo_email_1" class="c_obligatorios">(*)Campos obligatorios
								<div class="msj_enviado" id="enviando_div" style="display:none;">
									<h3>Gracias!</h3>
									<h4>Tu mensaje fué enviado</h4>
								</div>
							</label>									
							<button type="submit" class="btn botonf">Enviar</button>
							<button class="btn botonf" type="reset">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-sm-6 col-md-6">
					<?php echo $config->descripcion_contacto;?>
				</div><!-- end col-md -->
			</div><!-- end row -->
		</div>
	</div>
</div>
<script>	
var imagenes_fondo =[{image : 'web/frontend/images/atencion/fondo-atencion.jpg'}];

$(document).ready(function() {
  var validacion = jQuery('#ajax-form').validate({
            rules :{
                email : {
                    required : true,
                    email    : true
                },
                nombre : {
                    required : true
                },
                ciudad : {
                    required : true
                },
                telefono : {
                    required : true
                },
                mensaje : {
                    required : true
                }
            },
            messages: {
		        email: {
		            required: "Debes ingresar un email",
		            email: "Debes ingresar un email válido",
		        },
		        ciudad: {
		            required: "Debes ingresar una ciudad"
		        },
		        nombre: {
		            required: "Debes ingresar un nombre"
		        },
		        telefono: {
		            required: "Debes ingresar un teléfono"
		        },
		        mensaje: {
		            required: "Debes ingresar un mensaje"
		        }
		    },
            submitHandler: function (form) {
                // setup some local variables
                $('.btn_enviar').attr('disabled','true');
                var $form = $(this);
                // let's select and cache all the fields
                var $inputs = $form.find("input, select, button, textarea");
                // serialize the data in the form
                var serializedData = $('#ajax-form').serialize();
                // let's disable the inputs for the duration of the ajax request
                $inputs.prop("disabled", true);
                // fire off the request to /form.php
                request = $.ajax({
                    url: "<?php echo site_url('atencion/enviar');?>",
                    type: "post",
                    data: serializedData
                });
               
                request.done(function (response, textStatus, jqXHR) {    
                	$('.btn_enviar').removeAttr('disabled');    
                	//alert('Su mensaje ha sido enviado correctamente'); 
                	$('#ajax-form')[0].reset();           
                    $('#formulario_div').slideUp('slow');
                    $('#enviando_div').slideDown('slow');
                });
                
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    
                   $('#err-timedout').slideDown('slow');
                   $('#send').show();
                });
                                
                request.always(function () {
                    // reenable the inputs
                    $inputs.prop("disabled", false);
                });
            }
    });
    $('[type="reset"]').on('click', function(){
               validacion.resetForm();
    });
});
</script>