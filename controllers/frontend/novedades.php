<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Novedades extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
        $data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/novedades.css')
		);
		$data['web_js'] = array(					
			array('src'=>'web/frontend/js/novedades.js'),
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		//$data['titulo'] = $datos->titulo;
		//$data['descripcion'] = $datos->descripcion;
		$data['titulo'] = "Canjea los Lindos Vasos Elite de La Era de Hielo";
		$data['descripcion'] = "¡Esta es una promoción que no podrás resistir! Canjea, desde el 8 de Julio, en los principales mercados y autoservicios los lindos y divertidos vasos con tus personajes favoritos de La Era de Hielo Choque de Mundos.";
		$data['novedades'] = $this->egeneral_model->listar('novedades',1);
        	$data['tpl'] = 'frontend/novedades/index';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
	
	public function interior($productoseo = NULL)
	{	
		$data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/novedades.css')
		);
		$data['web_js'] = array(					
			//array('src'=>'web/frontend/js/scrollReveal.js'),
			array('src'=>'web/frontend/js/novedades-interior.js')
		);
		$data['datos'] = $this->egeneral_model->mostrarseo('novedades',$productoseo);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $data['datos']->titulo.' - '.$datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		
		$data['imagenes'] = $this->egeneral_model->listarSlider('novedades_imagenes','id_padre',$data['datos']->id,1);
        $data['tpl'] = 'frontend/novedades/interior';		
		$this->load->view('frontend/layout/layout', $data);
	}
}