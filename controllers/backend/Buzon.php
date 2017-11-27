<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Buzon extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
    endif;
    $this->session->set_userdata('titulo_cabecera', 'Buzón');
    $this->base_contacto = 'buzon';
    $this->base_cotizacion = 'buzon_atencion';
  }

  public function index()
  {
    $data['web_css']  = array(
        array('href'=>'web/backend/js/jgrid/css/ui.jqgrid.css'),
        array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css') 
    );
    $data['web_js']   = array(
        array('src'=>'web/backend/js/jgrid/js/jquery.jqGrid.min.js'),
        array('src'=>'web/backend/js/jgrid/js/i18n/grid.locale-en.js'),
        array('src'=>'web/backend/js/panel/jqgrid_opciones.js')
    );
    $data['tabla']                      = $this->base_contacto;
    $data['server_action']              = 10;
    $data['url_agregar']                = base_url('backend/Clientes/agregar');
    $data['url_eliminar']               = base_url("backend/ServerActions/borrar/");
    $data['url_eliminar_seleccionados'] = base_url("backend/ServerActions/borrar_seleccionados/");
    $data['url_cambiar_estado']         = base_url("backend/ServerActions/estado/");
    $data['tpl']                        = 'backend/buzon/index';    
    $this->load->view('backend/layout/layout', $data);
  }

  public function matriculas()
  {
    $data['web_css']  = array(
        array('href'=>'web/backend/js/jgrid/css/ui.jqgrid.css'),
        array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css') 
    );
    $data['web_js']   = array(
        array('src'=>'web/backend/js/jgrid/js/jquery.jqGrid.min.js'),
        array('src'=>'web/backend/js/jgrid/js/i18n/grid.locale-en.js'),
        array('src'=>'web/backend/js/panel/jqgrid_opciones.js')
    );
    $data['tabla']                      = $this->base_cotizacion;
    $data['server_action']              = 11;
    $data['url_agregar']                = base_url('backend/Clientes/agregar');
    $data['url_eliminar']               = base_url("backend/ServerActions/borrar/");
    $data['url_eliminar_seleccionados'] = base_url("backend/ServerActions/borrar_seleccionados/");
    $data['url_cambiar_estado']         = base_url("backend/ServerActions/estado/");
    $data['tpl']                        = 'backend/buzon/matricula';    
    $this->load->view('backend/layout/layout', $data);
  }  

  /* Ver */ 
  public function ver($id)
  {
    if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
    endif;
      $js_css          = $this->estilos_java();
      $data['web_js']  = $js_css['web_js'];
      $data['web_css'] = $js_css['web_css'];
      $data['datos'] = $this->egeneral_model->mostrar($this->base_contacto,$id);
      $data['tpl']   = 'backend/buzon/ver';    
      $this->load->view('backend/layout/layout', $data);
  }

  public function ver_matricula($id)
  {
    if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
    endif;
      $js_css          = $this->estilos_java();
      $data['web_js']  = $js_css['web_js'];
      $data['web_css'] = $js_css['web_css'];
      $data['datos']   = $this->egeneral_model->mostrar($this->base_cotizacion,$id);
      $data['tpl']     = 'backend/buzon/ver_matricula';    
      $this->load->view('backend/layout/layout', $data);
  }
  
  function estilos_java()
  {
    $data = array();
    $data['web_js']  = array(
        array('src'=>'web/backend/recursos/uploadjs/plupload.js'),
        array('src'=>'web/backend/recursos/uploadjs/plupload.gears.js'),
        array('src'=>'web/backend/recursos/uploadjs/plupload.silverlight.js'),
        array('src'=>'web/backend/recursos/uploadjs/plupload.flash.js'),
        array('src'=>'web/backend/recursos/uploadjs/plupload.browserplus.js'),
        array('src'=>'web/backend/recursos/uploadjs/plupload.html4.js'),
        array('src'=>'web/backend/recursos/uploadjs/plupload.html5.js'),
        array('src'=>'web/backend/recursos/uploadjs/jquery.ui.plupload/jquery.ui.plupload.js'),
        array('src'=>'web/backend/recursosubir.js')                
    );
    $data['web_css']  = array(
        array('href'=>'web/backend/js/bootstrap.switch/bootstrap-switch.css'),
        array('href'=>'web/backend/jgrid/css/ui.jqgrid.css')   
    );
    return $data;
  }
  
  function exportar($titulo,$tipo,$tabla)
  {
    $busquedas      = $this->input->get('q');
    $data['titulo'] =  $titulo;
    $data['tipo']   = $tipo;
    $data['listas'] =  $this->egeneral_model->exportar($tabla,$busquedas);
    $this->load->view('backend/buzon/exportar', $data);
  }
  function exportarmatricula($titulo,$tipo) // aumento el tipo, sólo para éste caso.
  {
    $busquedas = $this->input->get('q');
    $data['titulo']  =  $titulo;
    $data['tipo']    =  $tipo;
    $data['listas']  =  $this->egeneral_model->exportar('buzon_atencion',$busquedas);
    $this->load->view('backend/buzon/exportar_postulantes', $data);
  }
  function borrar()
  {
      if (!$this->ion_auth->logged_in()):
      //redirect them to the login page
      redirect('backend/login', 'refresh');
      endif;
      $id = $this->input->post('id');
      $this->egeneral_model->borrar('buzon',$id);
      $this->output->set_output('1');
  }
}