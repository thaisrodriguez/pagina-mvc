<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Contacto extends CI_Controller
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
        
        if($this->input->post('valido'))
                        {
                          $id   = $this->input->post('id');
                            $data = array(
                              'telefono'         => $this->input->post('telefono'),
                              'direccion'    => $this->input->post('direccion'),
                              'imagen'      => $this->input->post('vistafondo'),
                              'longitud' => $this->input->post('longitud'),
                              'latitud' => $this->input->post('latitud')
                            );
                             $result= $this->egeneral_model->editar('contacto_datos', $data, 1);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Contacto/index', 'refresh');
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
        $data['datos'] = $this->egeneral_model->mostrar('contacto_datos',1);
        $data['tpl'] = 'backend/contacto/index';       
        $this->load->view('backend/layout/layout', $data);
    }
}
 