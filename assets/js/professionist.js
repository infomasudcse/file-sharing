$(document).ready(function(){
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(function () {
  $('.hiddenclass').css('display','none');
})


$(".ask").blur(function(){
	var id = $(this).attr("id");
	var value = $("#"+id).val();
	if(value === ''){
		$("#"+id).css('border','1px solid #ff9999');
	} 
});

$("#saveClientInfo").click(function(){
	var proceed = true;
	var msg = '';
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mobile = $("#mobile").val();
	var address = $("#address").val();
	
	if(fname === ''){
		proceed = false;
		msg += ' First Name is Invalid ! <br/>';
	}
	if(lname === ''){
		proceed = false;
		msg += ' Last Name is Invalid ! <br/>';
	}
	if(mobile === '' || mobile.length !== 11 ){
		proceed = false;
		msg += ' Mobile Number is Invalid ! <br/>';
	}
	if(address === ''){
		proceed = false;
		msg += ' Address is Invalid ! <br/>';
	}
	if(proceed){
		$("#action").removeClass("alert-danger");
		$("#action").addClass("alert-info");
		$("#action").html("<b>Processing . . . </b>");
		var formData = $("#addClientForm").serialize();
		var action = $("#addClientForm").attr("action");
		$.ajax({
			url: action,
			type:"POST",
			data: formData,
			success: function(data){
				
				if(data){
					$("#action").removeClass("alert-info");
					$("#action").addClass("alert-success");
					$("#action").html(data);
					$(".form-control").val('');
				}
			}
		});


	}else{
		$("#action").addClass("alert-danger");
		$("#action").html(msg);
	}
	
});




});


function loadmodal(classname){
	
	var data = $(".hdesc"+classname).text();	
	$("#modalBodyData").html(data);
	$("#myModal").modal();
}



function ask(){
	var sts = confirm("Do You want to execute This Command ? ");
	if(sts){
		return true;
	}else{
		return false;
	}
}
