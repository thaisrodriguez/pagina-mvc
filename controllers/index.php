<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
		$data['web_css']  = array(
			  	array('href'=>'web/frontend/css/home.css')
        );
    	$data['web_js']   = array(  
			    array('src'=>'web/frontend/js/jquery.spritely-0.6.js'),					
				//array('src'=>'web/frontend/js/scrollReveal.js'),
				array('src'=>'web/frontend/js/home.js'),	
    		
        );
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['sliders'] = $this->egeneral_model->listar('home',1);
		$data['productos'] = $this->egeneral_model->listar('categoria_productos',1);
		$data['promociones'] = $this->egeneral_model->listar('novedades',1);
		$data['producto_nuevo'] = $this->egeneral_model->mostrar_nuevo();
        $data['tpl'] = 'frontend/home/index';
        $data['tpl'] = 'frontend/prueba/index';				
		$this->load->view('frontend/layout/layout', $data);
	}
}