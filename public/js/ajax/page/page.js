$(document).ready(function(){


	$("#savePage").click(function(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		savePage();
	});

});


// funcion para habilitar y desabilitar admin
	var savePage = function(){
		var idpage = $("#idPage").val();
		var content = CKEDITOR.instances['editor1'].getData();
		$("#savePage").attr("disabled", true);
		insertContent(idpage, content);	
	}

var insertContent = function(idpage,content){
	datos = {"idpage":idpage , "content": content };	
		$.ajax({
			url: "page",
			method: 'POST',		
			data: datos
		})
		.done(function(result) {
			//console.log(result);
			result = JSON.parse(result);
			console.log(result);
			alert(result.message);
			$("#savePage").attr("disabled", false);

		});
}

