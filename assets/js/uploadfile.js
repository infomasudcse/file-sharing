
//uploading profile pic
$('body').on('change', '#file', function(){
    var gfile = this.files[0];
    var fd = new FormData();
    var category = $('#category').val();
    fd.append ('category', category);
    fd.append('file', gfile);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', base_url + 'uploadfile/upload_file', true);
    //xhr.setRequestHeader("Content-Type","multipart/form-data");
    xhr.upload.addEventListener('progress', function(e){
        if (e.lengthComputable) {
            var percent = Math.round(e.loaded / e.total * 100) + '%';
            $('.upload-progress').width(percent);
            $('.upload-progress').html(percent);
        }
    });
    xhr.addEventListener('readystatechange', function(){
       
	  // alert(this.responseText);
	   if(this.readyState === 4){
            if(this.status === 200){
                var response = jQuery.parseJSON(this.response);
				
				if(response.type ==='success'){
					window.location.href = base_url+"uploadfile/";
				}else{
					var notification =  '<div class="alert alert-danger"> '+response+' or Check the  Image Type/Size ! </div>';
                      $('#upload-notification').html(response);
					
				}             
			 
            }
       
		}
    });

   xhr.send(fd);
});
