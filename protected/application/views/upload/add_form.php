
<h1 class="page-header"><?php echo $title ; ?></h1>


<div class="panel panel-default">
  <div class="panel-heading">
      <div class="row">
          <div class="col-sm-10"><h3 class="panel-title">New <?php echo $title ; ?></h3></div>
          <div class="col-sm-2"><a href="<?php echo base_url();?>uploadfile/" class="btn btn-primary btn-sm">View all</a></div>
      </div>
         
  </div>
  <div class="panel-body">

    <div class="alert alert-danger"><strong> USE SMALL FILE NAME  </strong></div>
      <form class="form-horizontal" method="post" id="UploadForm"  enctype="multipart/form-data">
		 
		 <div class="form-group">
		    <label for="category" class="col-sm-2 control-label">Category </label>
		    <div class="col-sm-6">
                        <select name="category" id="category" class="form-control">
                            <?php 
                            if(!$categories){
                                echo "<option value='0'>No Category</option>";
                            }else{
                                
                                foreach($categories as $category){
                                    echo "<option value='".$category->id."'>".$category->category."</option>";
                                }
                                
                            }
                                
                                ?>
                            
                        </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="file" class="col-sm-2 control-label">Select File.</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control ask" id="file" name="file">
		    </div>
        <div class="col-sm-3">
          <p class='text-warning'> Maximum 5 GB </p>
        </div>
		  </div>
		   
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">                       
          <div class="progress-bar upload-progress" style="width: 0%;">0%</div>
		      <div class=''  id="upload-notification"></div>
		    </div>
		  </div>
		</form>
  </div>
</div>  
<script>
var base_url = '<?php echo base_url(); ?>';
</script>
 <script src="<?php echo base_url(); ?>assets/js/uploadfile.js"></script>



