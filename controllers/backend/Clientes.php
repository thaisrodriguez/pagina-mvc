<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Clientes extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  /* Home */
  public function index()
  {    
    
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;
        
        $data['web_css']  = array(
          array('href'=>'web/backend/js/jgrid/css/ui.jqgrid.css'),
          array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css') 
        );
      $data['web_js']   = array(
          array('src'=>'web/backend/js/jgrid/js/jquery.jqGrid.min.js'),
          array('src'=>'web/backend/js/jgrid/js/i18n/grid.locale-en.js')
        );
        $data['tabla'] = 'clientes';
        $data['tpl'] = 'backend/clientes/index';       
        $this->load->view('backend/layout/layout', $data);
    }
    public function agregar()
    {
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;
        
        if($this->input->post('valido'))
                        {
                          $orden    = $this->egeneral_model->obtenerOrden('clientes');
                          $nuevaorden = $orden->orden+1; 
                            $data = array(
                              'titulo'=>$this->input->post('titulo'),
                              'imagen'=> $this->input->post('vistaslider'),
                              'orden'=> $nuevaorden
                            );
                             $result= $this->egeneral_model->agregar('clientes', $data);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             $this->egeneral_model->timeline('fa-smile-o','Cliente agregado: '.$this->input->post('titulo'),time(), $this->ion_auth->get_user_id(),1);
                             redirect('/backend/Clientes/index', 'refresh');
                             exit;
                        }
        $data['web_js']  = array(
                    array('src'=>'http://maps.google.com/maps/api/js?sensor=false'),
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
                  array('href'=>'web/backend/js/jquery.nanoscroller/nanoscroller.css'),
                  array('href'=>'web/backend/js/jquery.easypiechart/jquery.easy-pie-chart.css'),
                  array('href'=>'web/backend/js/bootstrap.switch/bootstrap-switch.css'),
                  array('href'=>'web/backend/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css'),
                  array('href'=>'web/backend/js/jquery.select2/select2.css'),
                  array('href'=>'web/backend/js/bootstrap.slider/css/slider.css'),
                  array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css'),
                  array('href'=>'web/backend/jgrid/css/ui.jqgrid.css'),
                  array('href'=>'web/backend/js/jquery.icheck/skins/square/blue.css')       
            );        
        $data['tpl'] = 'backend/clientes/agregar';       
        $this->load->view('backend/layout/layout', $data);
    }
    public function editar()
    {    
      
      if (!$this->ion_auth->logged_in()):
          redirect('backend/login', 'refresh');
      endif;          
          if($this->input->post('valido'))
                          {
                            $id   = $this->input->post('id');
                              $data = array(
                              'titulo'=>$this->input->post('titulo'),
                              'imagen'=> $this->input->post('vistaslider')
                              );
                               $result= $this->egeneral_model->editar('clientes', $data, $id);
                               $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                               $this->egeneral_model->timeline('fa-smile-o','Cliente editado: '.$this->input->post('titulo'),time(), $this->ion_auth->get_user_id(),1);
                               redirect('/backend/Clientes/index', 'refresh');
                               exit;
                          }
          $data['web_js']  = array(                     
                      array('src'=>'web/backend/recursos/uploadjs/plupload.js'),
                      array('src'=>'web/backend/recursos/uploadjs/plupload.gears.js'),
                      array('src'=>'web/backend/recursos/uploadjs/plupload.silverlight.js'),
                      array('src'=>'web/backend/recursos/uploadjs/plupload.flash.js'),
                      array('src'=>'web/backend/recursos/uploadjs/plupload.browserplus.js'),
                      array('src'=>'web/backend/recursos/uploadjs/plupload.html4.js'),
                      array('src'=>'web/backend/recursos/uploadjs/plupload.html5.js'),
                      array('src'=>'web/backend/recursos/uploadjs/jquery.ui.plupload/jquery.ui.plupload.js'),
                      array('src'=>'web/backend/recursosubir.js'),
                      array('src'=>'web/backend/recursoimagenes.js'),
                      array('src'=>'web/backend/recursos/udify/jquery.uploadify.min.js')                 
              );
          $data['web_css']  = array(
                    array('href'=>'web/backend/js/jquery.nanoscroller/nanoscroller.css'),
                    array('href'=>'web/backend/js/jquery.easypiechart/jquery.easy-pie-chart.css'),
                    array('href'=>'web/backend/js/bootstrap.switch/bootstrap-switch.css'),
                    array('href'=>'web/backend/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css'),
                    array('href'=>'web/backend/js/jquery.select2/select2.css'),
                    array('href'=>'web/backend/js/bootstrap.slider/css/slider.css'),
                    array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css'),
                    array('href'=>'web/backend/jgrid/css/ui.jqgrid.css'),
                    array('href'=>'web/backend/js/jquery.icheck/skins/square/blue.css'),
                    array('href'=>'web/backend/recursos/uplodify/udify.css')         
              );
          $data_id       = $this->uri->segment(4);
          $data['datos'] = $this->egeneral_model->mostrar('clientes',$data_id);
          $data['tpl'] = 'backend/clientes/editar';       
          $this->load->view('backend/layout/layout', $data);
      }

    public function textos()
  {    
    
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;
        
        if($this->input->post('valido'))
                        {
                          $id   = $this->input->post('id');
                            $data = array(
                              'titulo'         => $this->input->post('titulo'),
                              'descripcion'    => $this->input->post('descripcion'),
                              'keywords' => $this->input->post('keywords'),
                              'descripcion_web' => $this->input->post('descripcion_web'),
                              'titulo_web' => $this->input->post('titulo_web')
                            );
                             $result= $this->egeneral_model->editar('datos_textos', $data, 4);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Clientes/textos', 'refresh');
                             exit;
                        }
        $data['web_js']  = array(                
            );
        $data['web_css']  = array(
                  array('href'=>'web/backend/js/bootstrap.switch/bootstrap-switch.css'),
                  array('href'=>'web/backend/js/jquery.select2/select2.css'),
                  array('href'=>'web/backend/js/bootstrap.slider/css/slider.css'),
                  array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css'),
                  array('href'=>'web/backend/jgrid/css/ui.jqgrid.css'),
                  array('href'=>'web/backend/js/jquery.icheck/skins/square/blue.css')
            );
        $data['datos'] = $this->egeneral_model->mostrar('datos_textos',4);
        $data['tpl'] = 'backend/clientes/textos';       
        $this->load->view('backend/layout/layout', $data);
    }  
      
}
 