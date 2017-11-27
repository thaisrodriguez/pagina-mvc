<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Contactenos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
        $data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/contactenos.css'),
		  	array('href'=>'web/frontend/css/supersized.css')
		);
		$data['web_js'] = array(					
			array('src'=>'web/frontend/js/supersized_f.js'),
			array('src'=>'web/frontend/js/jquery.validate.js'),
			array('src'=>'web/frontend/js/contactenos.js')
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		//$data['listas'] = $this->egeneral_model->listar('clientes',1);
        $data['tpl'] = 'frontend/contactenos/index';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}

	public function enviar()
	{
		if($this->input->post('nospam') == ""):
			$this->form_validation->set_rules('nombre', 'Nombres', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('telefono', 'Teléfono', 'required');
			$this->form_validation->set_rules('mensaje', 'Mensaje', 'required');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio.');
			// Validaciones Termina
			if($this->form_validation->run()==FALSE): 
				echo 2;
			else:
				$nombre         = $this->input->post('nombre');
				$email          = $this->input->post('email');
				$telefono       = $this->input->post('telefono');
				$mensaje        = $this->input->post('mensaje');
				$datos = array(
								'nombres'        => $nombre,
								'email'          => $email,
								'telefono'       => $telefono,
								'mensaje'        => $mensaje);
				$this->egeneral_model->agregar('buzon',$datos);
				/* ENVIAR MENSAJE */
				
				$config = $this->egeneral_model->configuracion();
				$mailp = $config->email; // Principal
				$mailc = $config->email_copia; // Copia
      			$para = explode(", ",$mailp);
      			$copia = explode(", ",$mailc);
      			$htmlMensaje 	 = 'Se ha registrado un mensaje de contacto mediante el formulario de "Elite":<br>';
     			$htmlMensaje 	.= '<b>Nombres</b>: '.$nombre;
     			$htmlMensaje 	.= '<br><b>Email</b>: '.$email;
     			$htmlMensaje 	.= '<br><b>Teléfono</b>: '.$telefono;
     			$htmlMensaje 	.= '<br><b>Mensaje</b>: '.$mensaje;
      			$this->solo_mail->enviarmail("Mensaje de Contacto", $para, $copia, $htmlMensaje);
      			
      			
      			/*$htmlRespuesta  = 'Hola '.$nombres.'<br><br>';
      			$htmlRespuesta .= 'Gracias por escribir a Adolphus, en breve nos pondremos en contacto contigo para brindarte mayor información sobre nuestros productos y servicios.';
      			$this->solo_mail->enviarmail("Mensaje de Contacto",$email,'no',$htmlRespuesta);
      			*/
      			/* FIN ENVIAR MENSAJE */
				
				//redirect('index.php/registrate', 'refresh');
				echo 1;
			endif;
		endif;
	}
}