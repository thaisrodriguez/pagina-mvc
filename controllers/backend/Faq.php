<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Faq extends CI_Controller
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
            array('src'=>'web/backend/js/jgrid/js/i18n/grid.locale-es.js')
          );
        $data['tabla']    = 'faq';
        $data['busqueda'] = 'titulo';
        $data['tpl']      = 'backend/faq/index';    
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
                                'titulo' => $this->input->post('titulo'),
                                'descripcion'   => $this->input->post('descripcion')
                              );
                               $result= $this->egeneral_model->editar('faq', $data, $id);
                               $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                               $this->egeneral_model->timeline('fa-question-circle','Pregunta F. editada: '.$this->input->post('titulo'),time(), $this->ion_auth->get_user_id(),1);
                               redirect('/backend/Faq/index', 'refresh');
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
          $data['datos'] = $this->egeneral_model->mostrar('faq',$data_id);
          $data['tpl']   = 'backend/faq/editar';       
          $this->load->view('backend/layout/layout', $data);
    }

    public function agregar()
      {
      if (!$this->ion_auth->logged_in()):
          redirect('backend/login', 'refresh');
      endif;

        if($this->input->post('valido'))
                            {
                              $orden    = $this->egeneral_model->obtenerOrden('faq');
                              $nuevaorden = $orden->orden+1; 
                              $data = array(                              
                                  'titulo' => $this->input->post('titulo'),
                                  'descripcion'   => $this->input->post('descripcion'),
                                  'orden'       => $nuevaorden,
                                  'estado'      => 1
                                );
                                $result= $this->egeneral_model->agregar('faq', $data);
                                $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                                $this->egeneral_model->timeline('fa-question-circle','Pregunta F. agregada: '.$this->input->post('titulo'),time(), $this->ion_auth->get_user_id(),1);
                                redirect('/backend/Faq/index', 'refresh');
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
            $data['tpl'] = 'backend/faq/agregar'; 
            $data['ultimoid'] = $this->egeneral_model->ultimoId('faq');
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
                              'keywords' => $this->input->post('keywords')
                            );
                             $result= $this->egeneral_model->editar('datos_textos', $data, 6);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Faq/index', 'refresh');
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
        $data['datos'] = $this->egeneral_model->mostrar('datos_textos',6);
        $data['tpl'] = 'backend/faq/textos';       
        $this->load->view('backend/layout/layout', $data);
    }  
/*
*/      
}