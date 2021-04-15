<div class="row">
    <?php if($files->num_rows()> 0){ 

        foreach($files->result() as $file){
            
        ?>

        <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img class="" src="<?php echo base_url(); ?>cover/<?php echo $file->file_cover; ?>" />
                            <div class="caption">
                                <h5><?php echo (($file->display_name != '')? $file->display_name : $file->file_name); ?></h5>
                                <p><?php echo $file->category; ?>
                                   <br/>Year : <?php echo $file->file_release; ?> 
                                   <br/>Size : <?php echo $file->file_size; ?> MB 
                                   <br/>added : <?php echo date('d-m-Y', strtotime($file->file_created)); ?>
                               </p>
                            </div>
                            <div class="ratings">
                                <p class="btn btn-default pull-right disabled"><?php echo $file->hits; ?> Hits</p>
                                <p><a href="<?php echo base_url(); ?>server/details/<?php echo $file->id; ?>" class="btn btn-primary">Detail...</a></p>
                            </div>
                        </div>
                    </div>
    <?php } }else{ echo "<div class='alert alert-danger'> Oops !! No file Found ! </div>"; } ?>                


</div>