<?php if ( ! defined('BASEPATH')) exit('Sin Accesos');
class serverUpload extends CI_Controller {
  function __construct()
  {
    parent::__construct();
  }
  public function index()
    {
            $carpeta = $_GET['carpeta'];
            if($carpeta == 'cv'):              
              $targetDir = 'cvs';
            else:
              $targetDir = 'imagenes/'.$carpeta;
            endif;
            $Tipo    = array ("JPG", "GIF", "JPEG", "PNG", "PDF", "DOC", "DOCX", "TXT", "RTF", "DWG", "DWT", "DWF", "SVG"); 
            $filePartsx = pathinfo($_REQUEST['name']);

            if (!in_array(strtoupper($filePartsx['extension']),$Tipo)) {
              exit;
            }
            // 5 minutes execution time
            @set_time_limit(5 * 60);
            // Get parameters
            $chunk = isset($_REQUEST["chunk"]) ? $_REQUEST["chunk"] : 0;
            $chunks = isset($_REQUEST["chunks"]) ? $_REQUEST["chunks"] : 0;
            $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

            // Clean the fileName for security reasons
            $fileName = preg_replace('/[^\w\._]+/', '-', $fileName);
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);
            // Make sure the fileName is unique but only if chunking is disabled
            if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
              $final_nombre = $fileName_b;
              $count = 1;
              while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;
              $fileName = $fileName_a . '_' . $count . $fileName_b;
            }
            // Create target dir
            if (!file_exists($targetDir))
              @mkdir($targetDir);
            // Look for the content type header
            if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
              $contentType = $_SERVER["HTTP_CONTENT_TYPE"];
            if (isset($_SERVER["CONTENT_TYPE"]))
              $contentType = $_SERVER["CONTENT_TYPE"];
            // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
            if (strpos($contentType, "multipart") !== false) {
              if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
                if ($out) {
                  // Read binary input stream and append it to temp file
                  $in = fopen($_FILES['file']['tmp_name'], "rb");
                  if ($in) {
                      $buff = fread($in, 4096);
                    while ($buff){
                      fwrite($out, $buff);
                      $buff = fread($in, 4096);
                    }
                  } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                  fclose($in);
                  fclose($out);
                  @unlink($_FILES['file']['tmp_name']);
                } else
                  die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
              } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            } else {
              // Open temp file
              $out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
              if ($out) {
                // Read binary input stream and append it to temp file
                $in = fopen("php://input", "rb");
                if ($in) {
                  $buff = fread($in, 4096);
                  while ($buff){
                    fwrite($out, $buff);
                    $buff = fread($in, 4096);
                  }
                } else
                  die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                fclose($in);
                fclose($out);
              } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            // Return JSON-RPC response
            if($fileName_b == '.jpeg'):
              $image = imagecreatefromjpeg($targetDir . DIRECTORY_SEPARATOR . $fileName);
              imagejpeg($image, $targetDir . DIRECTORY_SEPARATOR . $fileName, 80);
            endif;
            die('{"jsonrpc" : "2.0", "result" : "'.$fileName.'", "id" : "id"}');
    }
}