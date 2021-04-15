<style>.cursor{ cursor: pointer;}</style>
<h1 class="page-header"><?php echo $title ; ?></h1>


<div class="panel panel-default">
  <div class="panel-heading">
      <div class="row">
          <div class="col-sm-10"><h3 class="panel-title"> <?php echo $title ; ?></h3></div>
          <div class="col-sm-2"><a href="<?php echo base_url(); ?>uploadfile/uploadForm"><span class="badge"> New Upload</span></a></div>
      </div>
         
  </div>
    <div class="panel-body">
        <?php
            $message = $this->session->userdata('message');
            if($message!=''){
                echo "<div class='alert alert-info'>".$message."</div>";
                $this->session->unset_userdata('message');
            }
           ?>
        <table class="table table-bordered">
            <thead>
            <th style='width:110px;'>Date</th>
            <th>File Name</th>
            
            <th style='width:100px;'>Size</th>
            <th style="width:120px;">Action</th>
            </thead>
            <tbody>
        <?php 
            if(!(empty($uploads))){
              foreach($uploads as $file){
                    echo "<tr>";
                    echo "<td>".$file->upload_time."</td>";
                     echo "<td>".substr($file->file_name, 0, 50)."...</td>";
                     
                       echo "<td >".$file->file_size." MB</td>";
                        echo "<td>";
                        if($file->shared != 1){
                          echo "<span class='cursor' onClick=' return loadModalWithData(".$file->id.");' > Share </span> || <a href='".base_url()."uploadfile/delete/".$file->id."'> Delete </a>";
                        }else{
                          echo "  <a href='".base_url()."uploadfile/delete/".$file->id."'> Delete </a> ";
                        }


                        echo " </td>";

                    echo "</tr>";
              }
            }else{
              echo "<tr><td colspan='5'>No data found ! </td></tr>";
            }



        ?>
       
        
            </tbody>
        </table>
        <div class="well well-sm"><p><?php echo $links; ?></p></div>
       
    </div>
</div>



<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Share Info</h4>
      </div>
      <div class="modal-body" id="shareModalBody">
          <form class="form-horizontal" method="post" id="shareForm" action="<?php echo base_url();?>uploadfile/shareUploadedFile" enctype="multipart/form-data">
      
      
        <div class="form-group">
        <label for="lname" class="col-sm-4 control-label">Display Name <span class="glyphicon glyphicon-star text-danger"></span></label>
        <div class="col-sm-8">
          <input type="text" class="form-control " id="fname" name="display_name" placeholder="file name">
        </div>
      </div>
    
      
      
     <div class="form-group">
       <label for="mobile" class="col-sm-4 control-label">Release Year <span class="glyphicon glyphicon-star text-danger"></span></label>
        <div class="col-sm-6">
            <input type="text" class="form-control ask" value="<?php echo date('Y');?>" id="year" name="year" placeholder="2000">
        </div>
      </div>
      
      <div class="form-group">
        <label for="file" class="col-sm-4 control-label">Cover Pic.</label>
        <div class="col-sm-6">
          <input type="file" class="form-control ask" id="file" name="cover">
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-sm-4 control-label">Information <span class="glyphicon glyphicon-star text-danger"></span></label>
        <div class="col-sm-8">
          <textarea class="form-control" id="info" name="info" placeholder="info ... "></textarea>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary btn-lg">Share</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>

  function loadModalWithData(id){
        if(id !=''){
         /* $.ajax({
            url:"<?php echo base_url(); ?>uploadfile/loadAjaxModalForm",
            type:"POST",
            data:{id : id},
            success:function(data){
              $("#shareModalBody").html(data);
              $("#shareModal").modal();
            }

          });
        */
        var str = "<input type='hidden' name='id' value='"+id+"' />";
        $("#shareForm").append(str);
        $("#shareModal").modal();



        }
        return false;
}

</script>



