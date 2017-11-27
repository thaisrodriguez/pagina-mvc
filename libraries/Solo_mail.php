<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Solo_mail {
  function SwiftSend($pTitle, $pTo, $pCc, $pBody, $pAttach=array(), $_AccountFrom='', $_NameAccountFrom='')
    {    
        require_once APPPATH.'swiftmailer/lib/swift_required.php';
        $transport = Swift_MailTransport::newInstance();
        $mailer = Swift_Mailer::newInstance($transport);
        if($pCc == 'no'): // PARA RESPUESTAS.
          $message = Swift_Message::newInstance($pTitle)
          ->setFrom(array('contacto@elite.pe' => 'Elite'))
          ->setTo($pTo)
          ->setBody($pBody);
        else: 
          $message = Swift_Message::newInstance($pTitle)
          ->setFrom(array('contacto@elite.pe' => 'Elite'))
          ->setTo($pTo)
          ->setCc($pCc)
          ->setBody($pBody);
        endif;
        
        $message->setContentType("text/html");
    
        foreach($pAttach as $pVal):
            $message->attach(Swift_Attachment::fromPath($pVal));
        endforeach;
      
        return $numSent = $mailer->send($message);
    }   
    function enviarmail($asunto, $para, $copia, $mensaje){
      $urlweb    = 'http://elite.pe';
      $imagenweb = 'http://elite.pe/web/frontend/images/general/elite.svg';
      $parte     = "<span style='font-family:Arial, Verdana, Geneva, sans-serif; font-size:12px;'>";
      $parte     .= $mensaje;
      $parte     .= "</span>";
      $parte     .= "<br>";
      $parte .= "<table width='350' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td><a href='".$urlweb."' target='_blank'><img src='".$imagenweb."' align='left' style=' display:block;' alt='' /></a></td>
                            </tr>
                </table>";
      
      $this->SwiftSend($asunto, $para, $copia, $parte);
    }
}
?>