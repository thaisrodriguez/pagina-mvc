<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Home extends CI_Controller
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
      $data['tabla'] = 'home';
      $data['tpl'] = 'backend/home/index';    
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
                              'imagen'=> $this->input->post('vistaslider'),
                              'titulo'   => $this->input->post('titulo'),
                              'descripcion'   => $this->input->post('descripcion'),
                              'color_boton_fondo'   => '#'.$this->input->post('color_boton_fondo'),
                              'color_boton'   => '#'.$this->input->post('color_boton'),
                              'color_titulo'   => '#'.$this->input->post('color_titulo'),
                              'color_div'   => '#'.$this->input->post('color_div'),
                              'imagen2'   => $this->input->post('vistaslider2'),
                              'link'   => $this->input->post('link')
                            );
                             $result= $this->egeneral_model->editar('home', $data, $id);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Home/index', 'refresh');
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
        $data['datos'] = $this->egeneral_model->mostrar('home',$this->uri->segment(4));
        $data['tpl'] = 'backend/home/editar';       
        $this->load->view('backend/layout/layout', $data);
    }
    public function agregar()
    {
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;
        
        if($this->input->post('valido'))
                        {
                          $orden    = $this->egeneral_model->obtenerOrden('home');
                          $nuevaorden = $orden->orden+1; 
                            $data = array(
                              'imagen'=> $this->input->post('vistaslider'),
                              'titulo'   => $this->input->post('titulo'),
                              'descripcion'   => $this->input->post('descripcion'),
                              'color_boton_fondo'   => '#'.$this->input->post('color_boton_fondo'),
                              'color_boton'   => '#'.$this->input->post('color_boton'),
                              'color_titulo'   => '#'.$this->input->post('color_titulo'),
                              'color_div'   => '#'.$this->input->post('color_div'),
                              'imagen2'   => $this->input->post('vistaslider2'),                       
                              'orden'=> $nuevaorden,
                              'link'   => $this->input->post('link')
                            );
                             $result= $this->egeneral_model->agregar('home', $data);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Home/index', 'refresh');
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
        $data['datos'] = $this->egeneral_model->mostrar('home',$this->uri->segment(4));
        $data['tpl'] = 'backend/home/agregar';       
        $this->load->view('backend/layout/layout', $data);
    }
}