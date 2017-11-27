<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Productos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
        $data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/productos.css')
		);
		$data['web_js'] = array(
		    array('src'=>'web/frontend/js/jquery.spritely-0.6.js'),						
			array('src'=>'web/frontend/js/productos.js'),
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = 'Productos - '.$datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['categorias'] = $this->egeneral_model->listar('categoria_productos',1);
        $data['tpl'] = 'frontend/productos/index';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
	public function categoria($categoriaseo)
	{	
		$data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/productos-interno.css'),
			array('href'=>'web/frontend/css/papel-higienico.css'),
			array('href'=>'web/frontend/css/jquery.bxslider.css'),	
			array('href'=>'web/frontend/css/tinyscrollbar.css')
		);
		$data['web_js'] = array(
		    array('src'=>'web/frontend/js/jquery.bxslider.min.js'),
			array('src'=>'web/frontend/js/jquery.tinyscrollbar.js'),			
			array('src'=>'web/frontend/js/productos-interno.js')
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['categoria'] = $this->egeneral_model->mostrarseo('categoria_productos',$categoriaseo);
		$data['datos'] = $this->egeneral_model->mostrar_principal('productos',$data['categoria']->id);
		if(!$data['datos']):
			redirect('productos');
		endif;
		$data['imagenes'] = $this->egeneral_model->listarSlider('productos_imagenes','id_padre',$data['datos']->id,1);
		$data['productos'] = $this->egeneral_model->listarSlider('productos','categoria',$data['categoria']->id,1);
        $data['tpl'] = 'frontend/productos/categoria';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
	public function producto($productoseo = NULL)
	{	
		$data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/productos-interno.css'),
			array('href'=>'web/frontend/css/papel-higienico.css'),
			array('href'=>'web/frontend/css/jquery.bxslider.css'),	
			array('href'=>'web/frontend/css/tinyscrollbar.css')
		);
		$data['web_js'] = array(
		    array('src'=>'web/frontend/js/jquery.bxslider.min.js'),
			array('src'=>'web/frontend/js/jquery.tinyscrollbar.js'),			
			array('src'=>'web/frontend/js/productos-interno.js')
		);
		$data['datos'] = $this->egeneral_model->mostrarseo('productos',$productoseo);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $data['datos']->titulo.' - '.$datos->titulo;
		$data['descripcion'] = $datos->descripcion;
		$data['categoria'] = $this->egeneral_model->mostrar('categoria_productos',$data['datos']->categoria);
		
		$data['imagenes'] = $this->egeneral_model->listarSlider('productos_imagenes','id_padre',$data['datos']->id,1);
		$data['productos'] = $this->egeneral_model->listarSlider('productos','categoria',$data['datos']->categoria,1);
        $data['tpl'] = 'frontend/productos/categoria';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}
}