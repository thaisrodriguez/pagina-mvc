<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class Productos extends CI_Controller
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
                              'titulo'         => $this->input->post('titulo'),
                              'descripcion'    => $this->input->post('descripcion'),
                              'keywords' => $this->input->post('keywords')
                            );
                             $result= $this->egeneral_model->editar('datos_textos', $data, 2);
                             $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                             redirect('/backend/Portafolio/index', 'refresh');
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
        $data['datos'] = $this->egeneral_model->mostrar('datos_textos',2);
        $data['tpl'] = 'backend/quienessomos/textos';       
        $this->load->view('backend/layout/layout', $data);
    }


  public function categorias()
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
      $data['tabla'] = 'categoria_productos';
      $data['busqueda'] = 'titulo';
      if($this->uri->segment(4)):
      $data['categoria_'] = $this->uri->segment(4);
      else:
        $data['categoria_']  = 1;
      endif;
      $data['tpl']   = 'backend/portafolio/categorias';    
      $this->load->view('backend/layout/layout', $data);
    
  }

  public function editar_categoria()
  {    
  $id__ = $this->uri->segment(4);
  if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
  endif;
      
      if($this->input->post('valido'))
                      {
                          $id   = $this->input->post('id');
                          $seoo = url_title($this->input->post('titulo'), '-', TRUE);
                          $data = array(
                            'titulo'=> $this->input->post('titulo'),
                            /*'descripcion'=> $this->input->post('descripcion'),*/
                            'imagen'=> $this->input->post('vistaimagen'),
                            'fondo'=> $this->input->post('vistafondo'),
                            'nombreseo' => $seoo
                          );
                           $result= $this->egeneral_model->editar('categoria_productos', $data, $id);
                           $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                           redirect('/backend/Productos/categorias', 'refresh');
                           exit;
                      }
      $data['web_js']  = array(
                  //array('src'=>'http://maps.google.com/maps/api/js?sensor=false'),
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
      $data['datos'] = $this->egeneral_model->mostrar('categoria_productos',$id__);
      $data['tpl'] = 'backend/portafolio/editar_categoria';       
      $this->load->view('backend/layout/layout', $data);
  }

  public function agregar_categoria()
    {
    if (!$this->ion_auth->logged_in()):
        redirect('backend/login', 'refresh');
    endif;

      if($this->input->post('valido'))
                          {
                            $orden    = $this->egeneral_model->obtenerOrden('categoria_productos');
                            $nuevaorden = $orden->orden+1; 
                            $seoo = url_title($this->input->post('titulo'), '-', TRUE);
                            if($this->input->post('p_nuevo')):
                              $proo_nuevo = 1;
                            else:
                              $proo_nuevo = 0;
                            endif;
                            $data = array(                              
                                'titulo'        => $this->input->post('titulo'),
                                /*'descripcion' => $this->input->post('descripcion'),*/
                                'imagen'        => $this->input->post('vistaimagen'),
                                'fondo'         => $this->input->post('vistafondo'),
                                'nombreseo'           => $seoo,
                                'orden'         => $nuevaorden,
                                'p_nuevo'       => $proo_nuevo,
                                'estado'        => 1
                              );
                              $result= $this->egeneral_model->agregar('categoria_productos', $data);
                              $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                              redirect('/backend/Productos/categorias', 'refresh');
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
          $data['tpl'] = 'backend/portafolio/agregar_categoria'; 
          $data['ultimoid'] = $this->egeneral_model->ultimoId('categoria_productos');
      $this->load->view('backend/layout/layout', $data);
    }


  public function productos()
  {
    if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
    endif;
    if($this->uri->segment(4)):
      $id_cat = $this->uri->segment(4);
    else:
      $id_cat = 1;
    endif;


      $data['web_css']  = array(
          array('href'=>'web/backend/js/jgrid/css/ui.jqgrid.css'),
          array('href'=>'web/backend/js/jquery.gritter/css/jquery.gritter.css') 
        );
      $data['web_js']   = array(
          array('src'=>'web/backend/js/jgrid/js/jquery.jqGrid.min.js'),
          array('src'=>'web/backend/js/jgrid/js/i18n/grid.locale-en.js')
        );
      $data['tabla'] = 'productos';
      $data['busqueda'] = 'titulo';
      $data['id_categoria'] = $id_cat;
      $data['datos_categoria'] = $this->egeneral_model->mostrar('categoria_productos',$id_cat);
      $data['lista_categoria'] = $this->egeneral_model->listar('categoria_productos',3);
      $data['tpl']   = 'backend/portafolio/portafolio';    
      $this->load->view('backend/layout/layout', $data);
  }

  public function editar_portafolio()
  {    
  $id__ = $this->uri->segment(4);
  if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
  endif;
      
      if($this->input->post('valido'))
                      {
                          $id   = $this->input->post('id');
                          $seo_actual   = $this->input->post('seo_actual');
                          $seoo   = url_title($this->input->post('titulo'),'-', TRUE);
                          if($this->input->post('p_nuevo')):
                              $proo_nuevo = 1;
                            else:
                              $proo_nuevo = 0;
                            endif;
                          $data = array(
                            'titulo'      => $this->input->post('titulo'),
                            'imagen'      => $this->input->post('vistaimagen'),
                            'categoria'   => $this->input->post('categoria'),
                            'descripcion' => $this->input->post('descripcion'),
                            'p_nuevo'     => $proo_nuevo,
                            'nombreseo'   => $seoo
                          );
                           $result= $this->egeneral_model->editar('productos', $data, $id);
                           $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');                         
                           redirect('/backend/Productos/productos/'.$this->input->post('categoria'), 'refresh');
                           exit;
                      } 
      $data['web_js']  = array(
                  //array('src'=>'http://maps.google.com/maps/api/js?sensor=false'),
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

      $data['datos'] = $this->egeneral_model->mostrar('productos',$id__);
      $data['tpl'] = 'backend/portafolio/editar_portafolio'; 
      $data['lista_categoria'] = $this->egeneral_model->listar('categoria_productos',3);      
      $this->load->view('backend/layout/layout', $data);
  }


  public function agregar_portafolio()
  {
  if (!$this->ion_auth->logged_in()):
      redirect('backend/login', 'refresh');
  endif;

    if($this->input->post('valido'))
                        {
                          $orden    = $this->egeneral_model->obtenerOrden('productos');
                          $nuevaorden = $orden->orden+1; 
                          $id   = $this->input->post('id');
                          $seoo   = url_title($this->input->post('titulo'),'-', TRUE);
                          //$seoo = $this->egeneral_model->slug_url($titulo_seo,'portafolio');
                          
                          $data = array(
                          'titulo'      => $this->input->post('titulo'),
                          'imagen'      => $this->input->post('vistaimagen'),
                          'categoria'        => $this->input->post('categoria'),
                          'descripcion' => $this->input->post('descripcion'),
                          'nombreseo'         => $seoo,
                          'orden'       => $nuevaorden,
                          'estado'      => 1
                           );
                            $result= $this->egeneral_model->agregar('productos', $data);
                            $this->session->set_flashdata('aceptado', 'Cambios realizados correctamente.');
                            redirect('/backend/Productos/productos/'.$this->input->post('categoria'), 'refresh');
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
        $id__ = $this->uri->segment(4);
        $data['categoria'] = $id__;
        $data['tpl'] = 'backend/portafolio/agregar_portafolio'; 
        $data['ultimoid'] = $this->egeneral_model->ultimoId('productos');
        $data['lista_categoria'] = $this->egeneral_model->listar('categoria_productos',3);  
        $data['datos_categoria'] = $this->egeneral_model->mostrar('categoria_productos',$id__);
        $this->load->view('backend/layout/layout', $data);
  }

     
    public function obtenerimagen()
    {
       $id = $this->input->get('id');
       $data['imagenes'] = $this->egeneral_model->imagenes($id, 'productos_imagenes');
       $this->load->view('backend/layout/obtenerimagen_renombrar', $data);
    }

    public function ordenar()
    {
       $valor   = $this->input->post('item');
       $tabla   = 'productos_imagenes';
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
       $tabla  = 'productos_imagenes';
       $this->egeneral_model->borrar($tabla,$id);
       $this->output->set_output('1');
    }

    public function renombrar()
    {
       $id     = $this->input->post('id');
       $nuevo_nombre     = $this->input->post('nuevo');
       $tabla  = 'productos_imagenes';
       $this->egeneral_model->renombrar($tabla,$nuevo_nombre,$id);
       $this->output->set_output('1');
    }
}