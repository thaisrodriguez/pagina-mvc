<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Nosotros extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
        $data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/nosotros.css'),
			array('href'=>'web/frontend/css/supersized.css'),
			array('href'=>'web/frontend/css/tinyscrollbar.css')
		);
		$data['web_js'] = array(					
			array('src'=>'web/frontend/js/supersized_f.js'),			
			array('src'=>'web/frontend/js/jquery.tinyscrollbar.js'),
			array('src'=>'web/frontend/js/nosotros.js')
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['datos'] = $this->egeneral_model->mostrar('quienes_somos',1);
        $data['tpl'] = 'frontend/nosotros/index';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
}