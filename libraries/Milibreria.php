<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Milibreria{
	public function slugify($text)
	 {   
	  //ADDED: Deal with accents vvvvvvvvvvvv
	  $text = preg_replace('/á|Á/', 'a', $text);
	  $text = preg_replace('/é|É/', 'e', $text);
	  $text = preg_replace('/í|Í/', 'i', $text);
	  $text = preg_replace('/ó|Ó/', 'o', $text);
	  $text = preg_replace('/ú|Ú/', 'u', $text);
	  
	  $text = preg_replace('/Ñ|ñ/', 'nn', $text);
	  // End of Deal  with accents 
	  
	  // replace all non letters or digits by -
	  $text = preg_replace('/\W+/', '-', $text);
	  
	  // trim and lowercase
	  $text = strtolower(trim($text, '-'));
	  
	  // replace all non letters or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	  // trim
	  $text = trim($text, '-');
	  // transliterate
	  if(function_exists('iconv')):
	   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  endif;
	  // lowercase
	  $text = strtolower($text);
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);
	  if(empty($text)):
	   return 'n-a';
	  endif;
	  return $text;
	 }

	public function recortar_palabras($cadena, $limite, $corte=" ", $pad="...") {
		    if(strlen($cadena) <= $limite)
		    return $cadena;
		    if(false !== ($breakpoint = strpos($cadena, $corte, $limite))) {
		    if($breakpoint < strlen($cadena) - 1) {
		    $cadena = substr($cadena, 0, $breakpoint) . $pad;
		    }
		    }
		    return $cadena;
	}

	public function agregar_li($in) {
     $in = str_replace("\r\n", "\n", $in);
     $lines = explode("\n", $in);
     $out = "";
     $ul = false;
     foreach($lines as $line) {
        $line = "<div class='item_lxd'>" . $line . "</div>";
        $out .= $line . "\n";
     }
     return $out;
  }

	 
}
?>