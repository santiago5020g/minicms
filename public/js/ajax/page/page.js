$(document).ready(function(){

	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
});


	$("#savePage").click(function(){
		savePage();
	});

	$("#addSection").click(function(){
		addSection();
	});


// funcion para habilitar y desabilitar adminn
	var savePage = function(){
		var idpage = $("#idPage").val();
		var content = [];
		var section = [];

		for(name in CKEDITOR.instances)
            {
				content.push(CKEDITOR.instances[name].getData() );
				
			}

		$('input[name="section[]"]').each(function(index) {
    	 	section.push($(this).val()); 
		});
		
		$("#savePage").attr("disabled", true);
		insertContent(idpage, content, section);	
	}

var insertContent = function(idpage,content, section){
	var _token = $("input[name='_token']").val();
	datos = {"idpage":idpage , "content": content, "section": section, _token: _token };	
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


function addSection()
{	
	$(' <div class="column"> <input type="hidden" name="section[]" value=""> <div name="editor[]" class="infor" contenteditable="false"> </div>').prependTo('#sections');	
	Sortable({
	els: '.column'
	});

}

