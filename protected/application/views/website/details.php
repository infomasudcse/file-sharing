<div class="row">
   <div class="col-sm-8 col-lg-8 col-md-8">
   		<div class="row">
	   		<div class="col-sm-9 col-sm-offset-1" align="center">
	   			<img src="<?php echo base_url(); ?>cover/<?php echo $file->file_cover; ?>" height="" width="100%" />
	   		</div>
	   		<div class="col-sm-8 col-sm-offset-2">
	   			<h3><?php echo (($file->display_name != '')? $file->display_name : $file->file_name); ?></h3>
	   			<p>Category : <?php echo $file->category; ?>
                                   <br/>Year : <?php echo $file->file_release; ?> 
                                   <br/>Size : <?php echo $file->file_size; ?> MB 
                                   <br/>added : <?php echo date('d-m-Y', strtotime($file->file_created)); ?>
                                   <br/>Total View : <?php echo $file->hits; ?>
                               </p>
                <p><?php echo $file->file_info; ?><br/><br/> </p>
                 <div class="col-sm-10" align="center">
                  <?php 
                    if($file->auto == 1){
                        $link = base_url().$file->file_path;
                    }else{
                      $link = base_url().$file->file_path.$file->file_name;
                    }

                  ?>
                  <div class="row">
                      <div class="col-sm-6" align="center">
                          <a href="<?php echo $link; ?>" target="_blank" class="btn btn-block btn-success btn-lg">Watch</a>
        
                      </div>
                      <div class="col-sm-6" align="center">
                          <a href="<?php echo $link; ?>" download="<?php echo $link; ?>" target="_blank" class="btn btn-block btn-primary btn-lg">Download</a>
            
                      </div>
                  </div>
	   				
           	</div>              
	   		</div>
	   	</div>	
   </div>
   <div class="col-sm-4 col-lg-4 col-md-4">
   		<!--<div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <b>New</b>
                        </h4>
                    </div>
					<div class = "panel-body">
                       
                       
                        
					</div>
                </div>-->
   </div>
</div>   