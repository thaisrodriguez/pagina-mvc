<?php if(!defined('BASEPATH')) exit('Sin Accesos');
class Novedades extends CI_Controller
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
        $data['tabla'] = 'novedades';
        $data['tpl'] = 'backend/novedades/index';       
        $this->load->view('backend/layout/layout', $data);
    }
    public function agregar()
    {
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;
        
        if($this->input->post('valido'))
                        {
                          //pasos 
                          if($this->input->post('pasos')):
                            $nuevos = array();
                            foreach($this->input->post('pasos') as $descripciones):
                                if($descripciones):
                                  $nuevos[] = array('paso' => $descripciones);
                                endif;
                            endforeach;
                            $pasos_agregar = json_encode($nuevos);
                          else: 
                            $pasos_agregar = '';
                            endif;
                            //lugares
                            //
                          if($this->input->post('pasos')):
                            $nuevos_dos = array();
                            $i = 0;
                            foreach($this->input->post('canje') as $lugar):
                                if($lugar):
                                  $descripcion = $_POST['canje_descripcion'][$i];
                                  $nuevos_dos[] = array('lugar' => $lugar,'descripcion' => $descripcion);
                                  $i++;
                                endif;
                            endforeach;
                            $lugares_agregar =  json_encode($nuevos_dos);
                          else:
                            $lugares_agregar =  '';
                          endif;
                            //fin
                          $orden    = $this->egeneral_model->obtenerOrden('novedades');
                          $seoo = url_title($this->input->post('titulo'),'-',true);
                          $nuevaorden = $orden->orden+1; 
                            $data = array(
                              'titulo'=>$this->input->post('titulo'),
                              'descripcion'=> $this->input->post('descripcion'),
                              'titulo_opcional'=>$this->input->post('titulo_opcional'),
                              'descripcion_opcional'=> $this->input->post('descripcion_opcional'),
                              'lugares'=> $lugares_agregar,
                              'pasos'=> $pasos_agregar,
                              'imagen'=> $this->input->post('vistaimagen'),
                              'imagen_ipad'=> $this->input->post('vistaimagen2'),
                              'imagen_promo'=> $this->input->post('vistapromo'),
                              'imagen_video'=> $this->input->post('vistavideo'),
                              'video'=> $this->input->post('video'),
                              'nombreseo' => $seoo,
                              'orden'=> $nuevaorden
                            );
                             $result= $this->egeneral_model->agregar('novedades', $data);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Novedades/index', 'refresh');
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
        $data['tpl'] = 'backend/novedades/agregar';   
        $data['ultimoid'] = $this->egeneral_model->ultimoId('novedades');
        $this->load->view('backend/layout/layout', $data);
    }
    public function editar()
    {    
      
      if (!$this->ion_auth->logged_in()):
          redirect('backend/login', 'refresh');
      endif;          
          if($this->input->post('valido'))
                          {
                            //pasos 
                            $nuevos = array();
                            foreach($this->input->post('pasos') as $descripciones):
                                if($descripciones):
                                  $nuevos[] = array('paso' => $descripciones);
                                endif;
                            endforeach;
                            $pasos_agregar = json_encode($nuevos);
                            //lugares
                            $nuevos_dos = array();
                            $i = 0;
                            foreach($this->input->post('canje') as $lugar):
                                if($lugar):
                                  $descripcion = $_POST['canje_descripcion'][$i];
                                  $nuevos_dos[] = array('lugar' => $lugar,'descripcion' => $descripcion);
                                  $i++;
                                endif;
                            endforeach;
                            $lugares_agregar =  json_encode($nuevos_dos);
                            //fin
                            $id   = $this->input->post('id');
                            $seoo = url_title(strip_tags($this->input->post('titulo')),'-',true);
                              $data = array(
                              'titulo'=>$this->input->post('titulo'),
                              'descripcion'=> $this->input->post('descripcion'),
                              'titulo_opcional'=>$this->input->post('titulo_opcional'),
                              'descripcion_opcional'=> $this->input->post('descripcion_opcional'),
                              'lugares'=> $lugares_agregar,
                              'pasos'=> $pasos_agregar,
                              'imagen'=> $this->input->post('vistaimagen'),
                              'imagen_ipad'=> $this->input->post('vistaimagen2'),
                              'imagen_promo'=> $this->input->post('vistapromo'),
                              'imagen_video'=> $this->input->post('vistavideo'),
                              'video'=> $this->input->post('video'),
                              'nombreseo' => $seoo
                              );
                               $result= $this->egeneral_model->editar('novedades', $data, $id);
                               $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                               redirect('/backend/Novedades/index', 'refresh');
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
          $data['datos'] = $this->egeneral_model->mostrar('novedades',$data_id);
          $data['tpl'] = 'backend/novedades/editar';       
          $this->load->view('backend/layout/layout', $data);
      
    }
    public function obtenerimagen()
    {
       $id = $this->input->get('id');
       $data['imagenes'] = $this->egeneral_model->imagenes($id, 'novedades_imagenes');
       $this->load->view('backend/layout/obtenerimagen', $data);
    }
    public function ordenar()
    {
       $valor   = $this->input->post('item');
       $tabla   = 'novedades_imagenes';
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
       $tabla  = 'novedades_imagenes';
       $this->egeneral_model->borrar($tabla,$id);
       $this->output->set_output('1');
    }
  
}
 