<?php echo form_open("backend/login");?>

<div id="content"></div>
<div id="cl-wrapper" class="login-container">
  <div class="middle-login">
    <div class="block-flat">
      <div class="header"> <br>
        <h3 class="text-center"><img class="logo-img" height="50px" src="web/frontend/images/general/elite.svg"  alt="logo"/></h3>
      </div>
      <div>


<div class="content">
            <h4 class="title center">Ingreso al Sistema</h4>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Usuario" id="identity" name="identity" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" placeholder="Clave" id="password" name="password" class="form-control">
                  </div>
                </div>
              </div>             

              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                   
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Recordar
                  </div>
                </div>
              </div> 

 </div>
          <div class="foot">
            <div id="infoMessage"><?php echo $message;?></div>

          <!-- <a href="./backend/forgot_password" class="btn btn-default" data-dismiss="modal" type="button">Recuperar Clave</a> --> 
            <input type="submit" class="btn btn-primary" value="Entrar"/>
            <div class="text-center out-links"><a style="color:#000" href="http://webtilia.com">&copy; 2014 Webtilia.com</a><br><br></div>
          </div>


<?php echo form_close();?>