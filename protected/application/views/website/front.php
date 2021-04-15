
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title><?php echo (isset($title) ? $title : 'FTP SERVER'); ?></title>
   
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico"/>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/shop-homepage.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightslider.css"/>
    <script src="<?php echo base_url(); ?>assets/js/lightslider.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/front-style.css"/>    
    
	<style type="text/css">
		.list-group li{
			padding-top: 3px;
			padding-bottom: 3px;
		}
        .cursor{
            cursor: pointer;
        }
	</style>
    <script type="text/javascript">
        
        
        function expand($elem){
            var $ = jQuery;
            var angle = 0;
            var t = setInterval(function () {
                if(angle == 1440){
                    clearInterval(t);
                    return;
                }
                angle += 40;
                $('.link',$elem).stop().animate({rotate: '+=-40deg'}, 0);
            },10);
            $elem.stop().animate({width:'180px'}, 800)
            .find('.item_content').fadeIn(400,function(){
                $(this).find('p').stop(true,true).fadeIn(600);
            });
        }
        function collapse($elem){
            var $ = jQuery;
            var angle = 1440;
            var t = setInterval(function () {
                if(angle == 0){
                    clearInterval(t);
                    return;
                }
                angle -= 40;
                $('.link',$elem).stop().animate({rotate: '+=40deg'}, 0);
            },10);
            $elem.stop().animate({width:'52px'}, 800)
            .find('.item_content').stop(true,true).fadeOut().find('p').stop(true,true).fadeOut();
        }
                    
        (function($) {
            $(document).ready(function() {
               var akas=true;
                $("#content-slider").lightSlider({
                    loop:true,
    				item:6,
    				speed:500,
                    auto:true,
                    pager:false,
                    pauseOnHover:true,
                    keyPress:true
                });
                $('.item').hover(
                    function(){
                        var $this = $(this);
                        expand($this);
                    },
                    function(){
                        var $this = $(this);
                        collapse($this);
                    }
                );
            });                        
        })(jQuery);
    </script>
</head>
<body>
<div class="common">
  <div class="top">
    <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="100"  /></a></div>
    <div id="container">
        <div class="col-sm-6"></div>
        <div class="col-sm-6" align="right">
            <br/>
            <a href="http://facebook.com/" target="_blank"><img class="img-circle" src="<?php echo base_url(); ?>assets/images/facebook.png" width="40"  /></a>
            
            <a href="http://youtube.com" target="_blank"><img class="img-circle" src="<?php echo base_url(); ?>assets/images/youtube.png" width="40"  /></a>
			
        </div>
    </div>
  </div>
  </div>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <ul id="content-slider" class="content-slider">
                                                   
                            <?php if(!empty($last_shared)){ foreach($last_shared->result() as $shared){?>
                                  <li><a href="<?php echo base_url(); ?>server/details/<?php echo $shared->id; ?>"><img src="<?php echo base_url(); ?>cover/<?php echo $shared->file_cover; ?>" width="180" height="220"/> </a></li>
                                                  

                            <?php }}?>

                       </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-3 col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <b>Search</b>
                        </h4>
                    </div>
					<div class = "panel-body">
                       
                        <form name="fproductlistsrch" id="fproductlistsrch" class="form-inline ewForm" method="post" action="<?php echo base_url(); ?>server/search">
                            <div class="ewQuickSearch input-group" style="width: 100%;">
                                                	
							<input type="text" name="search" id="search" class="form-control"  placeholder="Search"/>
                        	<div class="input-group-btn">
                            <button class="btn btn-default ewButton" type="submit"><span class="glyphicon glyphicon-search ewIcon"></span></button>
                           </div>
                                                	
							</div>
                        </form>
                        
					</div>
                </div>
                
                           
            <div class="panel-group" id="accordion">
                
                <?php 
                    if(isset($category)){
                        foreach($category as $type){
                            echo '<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                             <a href="'.base_url().'server/category/'.$type->id.'"><b class="cursor">'.$type->category.'</b> ('.$this->session->userdata("c".$type->id).')</a>
                                        </h4>
                                    </div>
                                </div>';

                        }

                    }else{

                        echo '<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div class="alert alert-warning"> No Movie Type Found !</div>
                                    </h4>
                                </div>
                            </div>';


                    }

                ?>

                
                
            </div>
          
        </div>
        <script type="text/javascript">
            $("#panel0").addClass("in");
            $("#panel0").parent().addClass("panel-primary");
            $("#panel0").parent().children().children().children("#creset").removeClass("hidden");
        </script>
            <div class="col-md-9">                               
    
                <?php echo $content; ?>


            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <hr/>
                    <span >Copyright &copy; Refine IT <?php echo date('Y');?></span>
                    <a class="pull-right" href="<?php echo base_url(); ?>login/">Admin</a>
                    <p></p>
                </div>
            </div>
    </div>
    <!-- /.container -->



</body>

</html>

