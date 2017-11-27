<?php $settings['config'] = $this->egeneral_model->configuracion(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, inital-scale=1"/>
        <meta name="Author" content="Webtilia.com" />        
        <!--<title><?php //echo $settings['config']->titulo ?></title>-->
        <!--<meta name="description" content="<?php //echo $settings['config']->descripcion ?>" />-->
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="<?php echo $descripcion; ?>" />
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
        <div id="wrapper">            
            <?php $this->load->view('frontend/layout/header',$settings);?>                     
            <section id="content">
                <?php $this->load->view($tpl,$settings);?>
            </section>
            <div id="piepagina">
                <?php $this->load->view('frontend/layout/footer',$settings);?>
            </div>                
        </div>
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
    </body>
    
</html>