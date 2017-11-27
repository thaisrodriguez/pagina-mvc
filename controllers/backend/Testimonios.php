<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Testimonios extends CI_Controller
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
        $data['tabla'] = 'testimonios';
        $data['tpl'] = 'backend/testimonios/index';       
        $this->load->view('backend/layout/layout', $data);
    }
    public function agregar()
    {
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;
        
        if($this->input->post('valido'))
                        {
                          $orden    = $this->egeneral_model->obtenerOrden('testimonios');
                          $nuevaorden = $orden->orden+1; 
                            $data = array(
                              'titulo'=>$this->input->post('titulo'),
                              'descripcion'=> $this->input->post('descripcion'),
                              'cargo'=> $this->input->post('cargo'),
                              'imagen'=> $this->input->post('vistaimagen'),
                              'orden'=> $nuevaorden
                            );
                             $result= $this->egeneral_model->agregar('testimonios', $data);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Testimonios/index', 'refresh');
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
        $data['tpl'] = 'backend/testimonios/agregar';   
        $data['ultimoid'] = $this->egeneral_model->ultimoId('testimonios');
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
                            $seoo = url_title($this->input->post('titulo'),'-',true);
                              $data = array(
                              'titulo'=>$this->input->post('titulo'),
                              'descripcion'=> $this->input->post('descripcion'),
                              'cargo'=> $this->input->post('cargo'),
                              'imagen'=> $this->input->post('vistaimagen')
                              );
                               $result= $this->egeneral_model->editar('testimonios', $data, $id);
                               $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');                               
                               redirect('/backend/Testimonios/index', 'refresh');
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
          $data['datos'] = $this->egeneral_model->mostrar('testimonios',$data_id);
          $data['tpl'] = 'backend/testimonios/editar';       
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
                              'titulo_web' => $this->input->post('titulo_web')
                            );
                             $result= $this->egeneral_model->editar('datos_textos', $data, 5);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Oficinas/textos', 'refresh');
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
        $data['datos'] = $this->egeneral_model->mostrar('datos_textos',5);
        $data['tpl'] = 'backend/oficinas/textos';       
        $this->load->view('backend/layout/layout', $data);
    }  

      /**/
    public function obtenerimagen()
    {
       $id = $this->input->get('id');
       $data['imagenes'] = $this->egeneral_model->imagenes($id, 'oficinas_imagenes');
       $this->load->view('backend/layout/obtenerimagen', $data);
    }

    public function ordenar()
    {
       $valor   = $this->input->post('item');
       $tabla   = 'oficinas_imagenes';
       $i = 1;
       $orden   = $this->input->post('order');
       foreach ($valor as $value) {
          $this->egeneral_model->orden($tabla,$value,$i++);
       }
       $this->output->set_output('1');
    }

    public function borrar()
    {
       $id     = $this->input->post('id');
       $tabla  = 'oficinas_imagenes';
       $this->egeneral_model->borrar($tabla,$id);
       $this->output->set_output('1');
    }
      
}
 