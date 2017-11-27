<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller']      = "index";
$route['404_override']            = '';
$route['translate_uri_dashes']    = FALSE;

//

$route['^backend$']             = "backend/Home";
$route['^productos$']           = "frontend/productos";
$route['^productos/(.*)/(.*)$'] = "frontend/productos/producto/$2";
$route['^productos/(.*)$']      = "frontend/productos/categoria/$1";
$route['^novedades$']           = "frontend/novedades";
$route['^novedades/(.*)$']      = "frontend/novedades/interior/$1";
$route['^nosotros$']            = "frontend/nosotros";
$route['^tips$']                = "frontend/tips";
$route['^tips/(.*)/(.*)$']      = "frontend/tips/tip/$2";
$route['^tips/(.*)$']           = "frontend/tips/categoria/$1";
$route['tv$']                   = "frontend/tv";
$route['tv/(:num)$']            = "frontend/tv";
$route['tv/(.*)']               = 'frontend/tv/interior/$1';
$route['^contactenos$']         = "frontend/contactenos";
$route['^contactenos/enviar$']  = "frontend/contactenos/enviar";
$route['^testimonios$']         = "frontend/testimonios";
$route['^atencion-al-cliente$'] = "frontend/atencion";
$route['^atencion/enviar$']     = "frontend/atencion/enviar";
$route['^prueba$']     			= "frontend/prueba";/*ruta para la prueba del video*/

$route['^backend$']               = "backend/Backend";
$route['^backend/salir$']         = "backend/Backend/logout";
$route['^backend/MiCuenta$']      = "backend/Backend/edit_user";
$route['^backend/MiCuenta/pass$'] = "backend/Backend/change_password";
$route['^backend/login$']         = "backend/Backend/login";

/* End of file routes.php */

/* Location: ./application/config/routes.php */