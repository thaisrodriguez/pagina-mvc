<?php $settings['config'] = $this->egeneral_model->configuracion(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, inital-scale=1"/>
        <meta name="Author" content="Webtilia.com" />
        <title><?php echo $settings['config']->titulo ?></title>
        <meta name="google-site-verification" content="t2MV7ZgdaKET3kBSBjGR8deIb7lQT-PIwQsutJK3U_E" />
       
        <meta name="description" content="<?php echo $settings['config']->descripcion ?>" />
        <base href="<?php echo base_url();?>">
        <!--<link type="image/x-icon" href="img/favicon.ico" rel="shortcut icon"/>-->
        <link href="web/frontend/css/reset.css" rel="stylesheet" type="text/css">
        <link href="web/frontend/css/general.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="web/frontend/js/jquery-1.8.2.min.js"></script>
        <link href="web/frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <?php 
        if(isset($web_css))
          {
            foreach($web_css as $css)
            {?>
        <link  rel="<?php echo isset($css['rel']) ? $css['rel'] : 'stylesheet'?>" type="text/css" href="<?php echo $css['href']?>"  title="<?php echo isset($css['title']) ? $css['title']:''?>"  media="<?php echo isset($css['media']) ? $css['media'] : 'screen'?>" /> 
        <?php echo "\n"; }} ?>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>  
        <?php $this->load->view('frontend/layout/header',$settings);?>   
        <?php $this->load->view($tpl,$settings);?>       
        <?php $this->load->view('frontend/layout/footer',$settings);?>
        <script type="text/javascript" src="web/frontend/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="web/frontend/js/scrollReveal.js"></script>
        <script type="text/javascript" src="web/frontend/js/global.js"></script>
        <!--<script type="text/javascript" src="js/respond.src.js"></script>-->
        <?php if(isset($web_js)){foreach($web_js as $js){?><script type="text/javascript"<?php if(isset($js['src'])) echo ' src="'.$js['src'].'"' ?>><?php if(isset($js['text'])) echo $js['text'] ?></script> <?php echo "\n"; }} ?>      
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-64634322-1', 'auto');
      ga('send', 'pageview');

    </script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '520388464753031');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=520388464753031&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</body>
</html>