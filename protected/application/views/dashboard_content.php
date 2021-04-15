
          
            <h1 class="page-header">Welcome <?php echo ucfirst($this->session->userdata('username'));?></h1>
            <div class="well well-sm">
             
          </div>
          <div class="row placeholders">
            <?php 
                    if(isset($category)){
                        foreach($category as $type){
                            echo '<div class="col-sm-4"><div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                             <a href="'.base_url().'server/category/'.$type->id.'"><b class="cursor">'.$type->category.'</b> ('.$this->session->userdata("c".$type->id).')</a>
                                        </h4>
                                    </div>
                                </div></div>';

                        }

                    }else{

                        echo '<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div class="alert alert-warning"> No Movie Type Found !</div>
                                    </h4>
                                </div>
                            </div>';


                    } ?>

          </div>
		  
		  
		  <div class="row">
				<div class="co-sm-12">
				




        </div>
		  </div>
		  

         
        