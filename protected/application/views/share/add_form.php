<?php 

if(!empty($error)){
    echo "<div class='alert alert-danger'>".$error."</div>";
}

if(!empty($message)){
    echo "<div class='alert alert-success'>".$message."</div>";
}


?>
<h1 class="page-header"><?php echo $title ; ?></h1>


<div class="panel panel-default">
  <div class="panel-heading">
      <div class="row">
          <div class="col-sm-10"><h3 class="panel-title">New <?php echo $title ; ?></h3></div>
          <div class="col-sm-2"><a href="<?php echo base_url();?>sharefiles/showAll" class="btn btn-primary btn-sm">View all</a></div>
      </div>
         
  </div>
  <div class="panel-body">
      <form class="form-horizontal" method="post" id="addClientForm" action="<?php echo base_url();?>sharefiles/index" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="fname" class="col-sm-2 control-label">File Path <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control ask" id="path" value="upload/" name="path" placeholder="upload/folder">		      
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="lname" class="col-sm-2 control-label">File Name <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control ask" value="" id="fname" name="file_name" placeholder="filename.mp4">
		    </div>
		    <div class="col-sm-2"><p class="text-warning">With extnsion</p></div>
		  </div>
                <div class="form-group">
		    <label for="lname" class="col-sm-2 control-label">Display Name <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control " id="fname" name="display_name" placeholder="file name">
		    </div>
		  </div>
		
		  <div class="form-group">
		    <label for="size" class="col-sm-2 control-label">File Size <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control ask" id="size" name="size" value="" placeholder="100Mb">
		    </div>
		    <div class="col-sm-3"><p class='text-warning'>file size in MB</p></div>
		  </div>
		  
		 <div class="form-group">
		   <label for="mobile" class="col-sm-2 control-label">Release Year <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-6">
                        <input type="text" class="form-control ask" id="year" name="year" placeholder="2000">
		    </div>
		  </div>
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
		    <label for="file" class="col-sm-2 control-label">Cover Pic.</label>
		    <div class="col-sm-6">
		      <input type="file" class="form-control ask" id="file" name="cover">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="address" class="col-sm-2 control-label">Information <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-10">
		      <textarea class="form-control" id="info" name="info" placeholder="info ... "></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
                        <p><input type="submit" id="saveClientInfo" class="btn btn-primary" value="Share Information"></p>
		      <div class='alert'  id="action"></div>
		    </div>
		  </div>
		</form>
  </div>
</div>  