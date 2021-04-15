<?php 

if(!empty($error)){
    echo "<div class='alert alert-danger'>".$error['error']."</div>";
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
          <div class="col-sm-2"><a href="<?php echo base_url();?>category/index" class="btn btn-primary btn-sm">View all</a></div>
      </div>
         
  </div>
  <div class="panel-body">
      <form class="form-horizontal" method="post" id="addClientForm" action="<?php echo base_url();?>category/addCategory" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Category Name <span class="glyphicon glyphicon-star text-danger"></span></label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control ask" id="name" name="name" placeholder="Name">		      
		    </div>
		  </div>
		  
		
		
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
                        <p><input type="submit" id="saveClientInfo" class="btn btn-primary" value="Create"></p>
		      <div class='alert'  id="action"></div>
		    </div>
		  </div>
		</form>
  </div>
</div>  