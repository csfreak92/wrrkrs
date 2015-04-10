function ajaxGetEmployees(){
	$.ajax({
			url:'welcome/employees',
			type:'post',
			dataType:'json',
			data:'dept_id='+$('#sel_dept').val(),
			success:function(data){
				$('#sel_emp').empty();
				$('#sel_emp').append(data.result_display);
				$('.emp-div').removeClass('hidden');
			},
			error:function(data){
				alert('Error Occured, Please contact your administrator.');
			}
	});	
}

$(document).ready(function(){
	
	$('#sel_dept').change(function(e){
		e.preventDefault();
		ajaxGetEmployees();
	});
	
});
