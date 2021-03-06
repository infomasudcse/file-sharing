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

    <title><?php echo (isset($title))?$title:'Dashboard'; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"><\/script>')</script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">File Share</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
            <li><a href="#"><?php echo ucfirst($this->session->userdata('username'));?></a></li>
            <li><a href="<?php echo base_url();?>dashboard/logout">LogOut</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url(); ?>dashboard"> <span class="glyphicon glyphicon-user"></span> Dashboard </a></li>            
          </ul>
          <ul class="nav nav-sidebar">
           <li><a href="<?php echo base_url();?>uploadfile"> <span class="glyphicon glyphicon-calendar"></span> Upload File</a></li>          
          </ul>
          
           <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>sharefiles/"> <span class="glyphicon glyphicon-duplicate"></span> Share File</a></li>
          </ul>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url(); ?>category/"> <span class="glyphicon glyphicon-option-horizontal"></span> Category <span class="glyphicon glyphicon-option-horizontal"></span></a></li>
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href="#"> <span class="glyphicon glyphicon-cog"></span> Settings</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php echo $content; ?>
        </div> 
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
    
  </body>
</html>
