<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Tips extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
        $data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/tips.css')
		);
		$data['web_js'] = array(					
			array('src'=>'web/frontend/js/tips.js')
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['tips'] = $this->egeneral_model->listar('categoria_tips',1);
        $data['tpl'] = 'frontend/tips/index';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
	public function categoria($categoriaseo)
	{	
		
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['categoria'] = $this->egeneral_model->mostrarseo('categoria_tips',$categoriaseo);
		$data['datos'] = $this->egeneral_model->mostrar_principal('tips',$data['categoria']->id);
		if(!$data['datos']):
			redirect('tips');
		endif;
		if($data['categoria']->id == 2):
			$css__ = 'dia';
		else:
			$css__ = 'hogar';
		endif;
		$data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/tips.css'),
			array('href'=>'web/frontend/css/'.$css__.'.css'),
			array('href'=>'web/frontend/css/jquery.bxslider2.css'),
			array('href'=>'web/frontend/css/tinyscrollbar.css')
		);
		$data['web_js'] = array(
		    array('src'=>'web/frontend/js/jquery.bxslider.min.js'),	
			array('src'=>'web/frontend/js/tips-interior.js'),						
			array('src'=>'web/frontend/js/jquery.tinyscrollbar.js'),
		);
		$data['imagenes'] = $this->egeneral_model->listarSlider('productos_imagenes','id_padre',$data['datos']->id,1);
		$data['tips_lista'] = $this->egeneral_model->listarSlider('tips','categoria',$data['categoria']->id,1);
        $data['tpl'] = 'frontend/tips/categorias';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
	public function tip($tipseo = NULL)
	{	
		
        $datos = $this->egeneral_model->mostrar('configuracion',1);
        $data['datos'] = $this->egeneral_model->mostrarseo('tips',$tipseo);
		$data['titulo'] = $data['datos']->titulo . ' - ' .$datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		
		$data['categoria'] = $this->egeneral_model->mostrar('categoria_tips',$data['datos']->categoria);
		
		if(!$data['datos']):
			redirect('tips');
		endif;
		if($data['categoria']->id == 2):
			$css__ = 'dia';
		else:
			$css__ = 'hogar';
		endif;
		$data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/tips.css'),
			array('href'=>'web/frontend/css/'.$css__.'.css'),
			array('href'=>'web/frontend/css/jquery.bxslider2.css'),
			array('href'=>'web/frontend/css/tinyscrollbar.css')
		);
		$data['web_js'] = array(
		    array('src'=>'web/frontend/js/jquery.bxslider.min.js'),	
			array('src'=>'web/frontend/js/tips-interior.js'),						
			array('src'=>'web/frontend/js/jquery.tinyscrollbar.js'),
		);
		$data['imagenes'] = $this->egeneral_model->listarSlider('productos_imagenes','id_padre',$data['datos']->id,1);
		$data['tips_lista'] = $this->egeneral_model->listarSlider('tips','categoria',$data['categoria']->id,1);
        $data['tpl'] = 'frontend/tips/categorias';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
}