<h1 class="page-header"><?php echo $title ; ?></h1>


<div class="panel panel-default">
  <div class="panel-heading">
      <div class="row">
          <div class="col-sm-8"><h3 class="panel-title"> <?php echo $title ; ?></h3></div>
          <div class="col-sm-2"><span class="badge"><?php echo $total;?></span></div>
          <div class="col-sm-2"><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>category/addCategory">Add Category</a></div>
      </div>
         
  </div>
    <div class="panel-body">
        <?php
            $message = $this->session->userdata('message');
            if($message!=''){
                echo $message;
                $this->session->unset_userdata('message');
            }
           ?>
        <table class="table table-bordered">
            <thead>
            <th>Created</th>
            <th style="width:200px;">Category Name</th>            
            <th style="width:63px;">Action</th>
            </thead>
            <tbody>
        
        <?php
        if($total != 0){
            foreach($categories as $category){
                echo "<tr>";
                echo "<td>".date('d-m-Y H:i',strtotime($category->created))."</td>";
                echo "<td>".$category->category."</td>";
                
                echo "<td><a class='glyphicon glyphicon-remove' href='".base_url()."category/delete/".$category->id."'></td>";
                echo "</tr>";
                }
        
    }else{
        echo "<tr><td colspan='7'><div class='alert alert-warning'>No Shared files found ! </div></td></tr>";
    }
?>
        
            </tbody>
        </table>
        
        <div class="well well-sm"><?php echo $links; ?></div>
    </div>
</div>



