<?php
class Uploadify extends CI_Controller {
    function __construct()
    {
        // Llamar al constructor de CI_Model
        parent::__construct();
        $this->load->database();
    }

    function subir($id) {
        //Global
        $redimencionar = $this->input->post('redimencionar');
        $anchor        = $this->input->post('anchor');
        $altor         = $this->input->post('altor');
        $folder        = $this->input->post('folder');
        $tabla        = $this->input->post('tabla');

        if (!empty($_FILES)) {
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $carpeta = $this->input->post('carpeta');
                $Tipo      = array("png","JPG", "GIF", "JPEG", "PNG", "PDF", "DOC", "DOCX", "TXT", "RTF", "DWG", "DWT", "DWF", "SVG"); 
                $ext = pathinfo($_FILES['Filedata']['name']);
                if(!in_array(strtoupper($ext['extension']), $Tipo)):
                    exit;
                endif;
                $nombre = $this->milibreria->slugify($_FILES['Filedata']['name'].'_'.time());
                $targetFile = str_replace('//', '/', $carpeta) . strtolower(str_replace(" ", "", $nombre.'.'.$ext['extension']));
 
                        if (!@copy($tempFile, $targetFile)) :
                                if (!@move_uploaded_file($tempFile, $targetFile)):
                                    echo "error";
                                else:
                                    //echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $targetFile);
                                endif;
                        else:
                $file_name = $nombre;

                //Redimencionar
                
                if($redimencionar == 'Si'):
                    $imagenpeque = "imagenes/".$folder."/".$anchor."-".$altor."-".$nombre.".".$ext['extension']; 
                    $this->redimencionar($targetFile, $imagenpeque, $anchor, $altor, 1); 
                endif;

                // Agregar a la base de datos
                if($this->input->post('catalogos')):
                $orden      = $this->egeneral_model->obtenerOrdenDos($tabla,'id_padre',$id);
             
                else:
                $orden      = $this->egeneral_model->obtenerOrden($tabla);
              
                endif;
                $nuevaorden = $orden->orden + 1;
               
                $data = array(
                                'imagen'    => $targetFile,
                                'id_padre'=> $id,
                                'orden'     => $nuevaorden,
                                'estado'    => 1
                            );
                $this->egeneral_model->agregar($tabla,$data);

                endif;
        }
    }
 
    function redimencionar($original,$nueva,$max_ancho,$max_alto,$corte) 
    {
            list($img_anchorig,$img_altorig, $tipo) = getimagesize($original);
            switch ($tipo) {
             case 1:
                 $img_orig = imagecreatefromgif($original);
                 break;
             case 2:
                 $img_orig = imagecreatefromjpeg($original);
                 break;
             case 3:
                 $img_orig = imagecreatefrompng($original);
                 break;
             case 15:
                 $img_orig = imagecreatefromwbmp($original);
                 break;
             default:
                 die("Formato de imagen no soportado");
              } 
             $black = @imagecolorallocate ($img_orig, 0, 0, 0);
             $white = @imagecolorallocate ($img_orig, 255, 255, 255);
             $font = 4;
            if ($corte>0)
            {
              if (($img_anchorig/$img_altorig)>($max_ancho/$max_alto)) 
                   { $img_alto=$max_alto; 
                     $img_ancho=($img_anchorig/$img_altorig)*$max_alto; 
                     $escala=$img_alto/$img_altorig;
                     $posx=($img_anchorig-($max_ancho/$escala))/2; 
                     $posy=0;} 
              else { $img_ancho=$max_ancho;  
                     $img_alto=($img_altorig/$img_anchorig)*$max_ancho; 
                     $escala=$img_alto/$img_altorig;
                     $posx=0; 
                     $posy=($img_altorig-($max_alto/$escala))/2;}
              $img_nueva=imagecreatetruecolor($max_ancho,$max_alto);
              $nuevax = "foto-".$img_nueva;
              imagecopyresampled($img_nueva,$img_orig,0,0,$posx,$posy,$max_ancho,$max_alto,$max_ancho/$escala,$max_alto/$escala);
            }
            else
            {
              $img_ancho=($img_anchorig/$img_altorig)*$max_alto;
              $img_alto=$max_alto;
              if ($img_ancho>$max_ancho)
                 { $img_ancho=$max_ancho; $img_alto=($img_altorig/$img_anchorig)*$max_ancho; } 
              $img_nueva=imagecreatetruecolor($img_ancho,$img_alto);
              imagecopyresampled("asdasdfasdf_".$img_nueva,$img_orig,0,0,0,0,$img_ancho,$img_alto,$img_anchorig,$img_altorig);
            }

              imagejpeg($img_nueva, $nueva , 90);
              
              imagedestroy ($img_nueva);
    }
 
    private function is_image($imagetype) {
        $ext = array(
            '.jpg',
            '.gif',
            '.png',
            '.bmp',
            '.jpeg',
            '.JPG',
            '.JEPG',
            '.JPEG'
        );
        if (in_array($imagetype, $ext))
            return true;
        else
            return false;
    }
    
}