<?php $data['user'] = $user = $this->ion_auth->user()->row(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="./web/images/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" type="image/x-icon" href="./web/images/apple-touch-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="./web/images/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="./web/images/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="./web/images/apple-touch-icon-144x144-precomposed.png" />
	<title>Panel</title>
	<base href="<?php echo base_url();?>">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
	<link href="//app.webtilia.com/cdn/jq-ui/jquery-ui.theme.css" rel="stylesheet">
	<script src="web/backend/js/jquery.js"></script>
	<link href="./web/backend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="web/backend/js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" href="./web/backend/fonts/font-awesome-4/css/font-awesome.min.css">
	<link rel="stylesheet" href="//lauren.github.io/pick-a-color/build/css/pick-a-color.min.css">
	<script src="//lauren.github.io/pick-a-color/dependencies/js/tinycolor-0.9.15.min.js"></script>
    <script src="//lauren.github.io/pick-a-color/build/js/pick-a-color.min.js"></script>
<?php 
if(isset($web_css))
  {
    foreach($web_css as $css)
    {?>
<link  rel="<?php echo isset($css['rel']) ? $css['rel'] : 'stylesheet'?>" type="text/css" href="<?php echo $css['href']?>"  title="<?php echo isset($css['title']) ? $css['title']:''?>"  media="<?php echo isset($css['media']) ? $css['media'] : 'screen'?>" /> 
<?php echo "\n"; }} ?>
 
 <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
 <script src="web/backend/js/jquery.select2/select2.min.js" type="text/javascript"></script>
 <script src="web/backend/js/jquery.parsley/parsley.js" type="text/javascript"></script>
 <script src="web/backend/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
 <script src="web/backend/js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
 <script type="text/javascript" src="web/backend/js/jquery.nestable/jquery.nestable.js"></script>
 <script type="text/javascript" src="web/backend/js/behaviour/general.js"></script>
 <script src="web/backend/js/jquery.ui/jquery-ui.js" type="text/javascript"></script> 
 <script src="web/backend/js/skycons/skycons.js" type="text/javascript"></script>
 <script type="text/javascript" src="web/backend/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
 <script type="text/javascript" src="./web/backend/js/jquery.gritter/js/jquery.gritter.js"></script>
 <script type="text/javascript" src="web/backend/js/jquery.niftymodals/js/jquery.modalEffects.js"></script> 
 <script type="text/javascript" src="web/backend/js/utiles.js"></script> 
 <script type="text/javascript" src="web/backend/js/jquery.icheck/icheck.min.js"></script>
 <script type="text/javascript" src="web/backend/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
<?php if(isset($web_js)){foreach($web_js as $js){?><script type="text/javascript"<?php if(isset($js['src'])) echo ' src="'.$js['src'].'"' ?>><?php if(isset($js['text'])) echo $js['text'] ?></script> <?php echo "\n"; }} ?>
<script type="text/javascript" src="web/backend/js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<!-- Custom styles for this template -->
	<link href="./web/backend/css/style.css" rel="stylesheet" />	
</head>
<body class="<?php if(isset($fondo)){ echo $fondo;}?>">
<?php if(!isset($cabeza)): $this->load->view('backend/layout/header',$data); endif;?>
<?php  $this->load->view($tpl,$data); ?>
<script>
var controladoractual = '<?php echo $this->uri->segment(2);?>';
var funcionactual = '<?php echo $this->uri->segment(3);?>';
</script>
<?php $this->load->view('backend/layout/footer'); ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./web/backend/js/behaviour/voice-commands.js"></script>
<script src="./web/backend/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./web/backend/js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="./web/backend/js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="./web/backend/js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="./web/backend/js/jquery.flot/jquery.flot.labels.js"></script>
<script type="text/javascript" src="./web/backend/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="./web/backend/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="./web/backend/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>
<script src="./web/backend/js/ckeditor/ckeditor.js"></script>
<script src="./web/backend/js/ckeditor/adapters/jquery.js"></script>
</body>
</html>