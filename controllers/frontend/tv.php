<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Tv extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{		
        $data['web_css'] = array( 
		  	array('href'=>'web/frontend/css/tv.css')
		);
		$data['web_js'] = array(					
			array('src'=>'web/frontend/js/tv.js')
		);
        $datos = $this->egeneral_model->mostrar('configuracion',1);
		$data['titulo'] = $datos->titulo;
		$data['descripcion'] = $datos->descripcion;

		//la url de mi paginacion
        $config['base_url'] = base_url();
        //le decimos cual es la url del primer link (1)
        $config['first_url'] = base_url().'/tv';
        //Agregamos un prefix page (SEO)
        $config['prefix'] = '/tv/';
        //Habilitamos esta opcion para que los link sean page/1,page/2,etc (SEO)
        $config['use_page_numbers'] = TRUE;
        //Le indicamos el numero total de filas
        $config['total_rows'] = $this->egeneral_model->total_filas_tabla('tv');
        //cuantas noticias vamos a mostrar por página
        $config['per_page'] = '8';
        //cantidad de link a mostrar en la paginacion
        $config['num_links'] = 4;
        //la uri de donde se encuentra nuestra pagina /paginacion/page/1
        $config['uri_segment'] = 2;
         /*Se personaliza la paginación para que se adapte a bootstrap*/
		$config['cur_tag_open']   = '<a href="javascript:;">';
		$config['cur_tag_close']  = '</a>';
		$config['last_link']      = FALSE;
		$config['first_link']     = FALSE;
        //Logica para obtener el limit
        $inicio = 0;
        if($this->uri->segment(2))
        $inicio = ($this->uri->segment(2)-1)*$config['per_page'];
         
        //cargamos la configuracion en la paginacion
        $this->pagination->initialize($config);
        //las noticias por pagina
        $data['listado'] = $this->egeneral_model->get_tabla_paginacion('tv',$config['per_page'],$inicio);
        //alamacenamos los link en una variable
        $data['tpl'] = 'frontend/tv/index';		
		$this->load->view('frontend/layout/layout-interno', $data);
	}

	public function interior($seo)
	{	
		$data['web_css']  = array(
            array('href'=>'web/frontend/css/tv.css')
          );
        $data['web_js']   = array(
            array('src'=>'web/frontend/js/tv.js')
          );
		$data['config'] = $this->egeneral_model->mostrar('configuracion',1);
		$data['datos'] = $this->egeneral_model->mostrarseo('tv',$seo);
		$data['titulo'] = $data['datos']->titulo.' - '.$data['config']->titulo;
		$data['tpl']    = 'frontend/tv/interior';
		$this->load->view('frontend/layout/layout-interno', $data);
	}
}