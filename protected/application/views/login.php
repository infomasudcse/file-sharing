<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/cover.css" rel="stylesheet">    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body >

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Business</h3>
              
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Authenticaton</h1>
            
            <form class="form-horizontal" id= "myForm" action="<?=base_url()?>login/authenticate" >
              <div class="alert alert-danger">
				<?php $noti = $this->session->userdata('noti'); if($noti!='') echo $noti; ?>
			  </div>
			  <div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-6">
				  <input type="text" name="username"  class="form-control" id="user" placeholder="username">
				<span style="color:red" >
				<span>Username is required.</span>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-6">
				  <input type="password" name="password"  class="form-control" id="inputPassword3" placeholder="Password">
			   
				  <span style="color:red" >
				<span>Username is required.</span>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-6">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Remember me
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <input type="submit" class="btn btn-default"  value="Login">

				</div>
			  </div>
			</form>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Powered by <a href="https://infomasud.com">infomasud</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
  </body>
</html>
