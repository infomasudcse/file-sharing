<h1 class="page-header"><?php echo $title ; ?></h1>


<div class="panel panel-default">
  <div class="panel-heading">
      <div class="row">
          <div class="col-sm-10"><h3 class="panel-title"> <?php echo $title ; ?></h3></div>
          <div class="col-sm-2"><span class="badge"><?php echo $total;?></span></div>
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
            <th>Upload Date</th>
            <th style="width:200px;">File Name</th>
            <th>Display Name</th>
            <th>Cover</th>
            <th>Size</th>
            <th>Type</th>
            <th>Hits</th>
            <th style="width:63px;">Action</th>
            </thead>
            <tbody>
        
        <?php
        if($total != 0){
            foreach($files as $file){
                echo "<tr>";
                echo "<td>".date('d-m-Y H:i',strtotime($file->file_created) )."</td>";
                echo "<td>".substr($file->file_name,0,20)." ...</td>";
                echo "<td>".$file->display_name."</td>";
                echo "<td><img src='".base_url()."cover/".$file->file_cover."' width='100'></td>";
                echo "<td>".$file->file_size."</td>";
                echo "<td>".$file->category."</td>";
                echo "<td>".$file->hits."</td>";
                echo "<td><a class='glyphicon glyphicon-remove' href='".base_url()."sharefiles/delete/".$file->id."'></td>";
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



