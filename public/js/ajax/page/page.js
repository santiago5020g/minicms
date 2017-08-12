$(document).ready(function(){

	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});
		
			var s  = Sortable({
			els: '.column, .menuPage'
			});

	});

	

	$("#edit").click(function(){
		edit();
	});

	$("#savePage").click(function(){
		savePage();
	});

	$("#addSection").click(function(){
		addSection();
	});

	$("#enableSections").click(function(){
		enableSections();
	});
	
	$("#btnAddPage").click(function(){
		addPage();
	});

	$("#enablePages").click(function(){
		enablePages();
	});
	
	


	var savePage = function(){
		var idpage = $("#idPage").val();
		var content = [];
		var section = [];
		var menuPage = [];

		for(name in CKEDITOR.instances)
            {
				content.push(CKEDITOR.instances[name].getData() );
				
			}

		$('input[name="section[]"]').each(function(index) {
    	 	section.push($(this).val()); 
		});

		$('input[name="menuPage[]"]').each(function(index) {
    	 	menuPage.push($(this).val()); 
		});
		
		$("#savePage").attr("disabled", true);
		insertContent(idpage, content, section, menuPage);	
	}

var insertContent = function(idpage,content, section, menuPage){
	var _token = $("input[name='_token']").val();
	datos = {"idpage":idpage , "content": content, "section": section, _token: _token, "menuPage": menuPage };	
		$.ajax({
			url: URL+"/savePage",
			method: 'POST',		
			data: datos
		})
		.done(function(result) {
			//console.log(result);
			result = JSON.parse(result);
			console.log(result);
			alert(result.message);
			$("#savePage").attr("disabled", false);
			window.location.reload();

		});
}


function addSection()
{	
	$(' <div class="column"> <input type="hidden" name="section[]" value=""> <div name="editor[]" class="infor" contenteditable="false"> </div>').prependTo('#sections');	
	Sortable({
	els: '.column'
	});

}



var disableSection = function(section){
	var _token = $("input[name='_token']").val();
	if(confirm('¿Estas seguro de deshabilitar la seccion ?'))
		{
			var idsection = $(section).attr("id");
			$(section).remove();
			if(!idsection)
			{
				return;
			}
			datos = {"section": idsection, _token: _token };	
				$.ajax({
					url: URL+"/disableSection",
					method: 'POST',		
					data: datos
				})
				.done(function(result) {
					//console.log(result);
					result = JSON.parse(result);
					console.log(result);
					//alert(result.message);
				});
		}
}


var enableSections = function(){
			$.ajax({
				url: URL+"/enableSections",
				method: 'POST',		
				data: $("#sectionDisabled").serialize(),	
			})
			.done(function(result) {
				//console.log(result);
				result = JSON.parse(result);
				console.log(result);
				if(result.status == true)
				{
					window.location.reload();
				}
				
			});
	}


var addPage = function(){
			$.ajax({
				url: URL+"/addPage",
				method: 'POST',		
				data: $("#frmAddPage").serialize(),	
			})
			.done(function(result) {
				//console.log(result);
				result = JSON.parse(result);
				console.log(result);
				alert(result.message);
				if(result.status == true)
				{
					
					window.location.reload();
				}
				
			});
	}



var disablePage = function(page){
	var _token = $("input[name='_token']").val();
	if(confirm('¿Estas seguro de deshabilitar la pagina ?'))
		{
			var idpage = $(page).attr("id");
			$(idpage).remove();
			if(!idpage)
			{
				return;
			}
			datos = {"page": idpage, _token: _token };	
				$.ajax({
					url: URL+"/disablePage",
					method: 'POST',		
					data: datos
				})
				.done(function(result) {
					//console.log(result);
					result = JSON.parse(result);
					console.log(result);
					alert(result.message);
					if(result.status == true)
					{
						
						window.location.reload();
					}
				});
		}
}


var enablePages = function(){
			$.ajax({
				url: URL+"/enablePages",
				method: 'POST',		
				data: $("#frmPageDisabled").serialize(),	
			})
			.done(function(result) {
				//console.log(result);
				result = JSON.parse(result);
				console.log(result);
				if(result.status == true)
				{
					window.location.reload();
				}
				
			});
	}




var edit = function(){
	var action = $(".infor").attr("contenteditable");
	if(action == "true")
	{
		for(name in CKEDITOR.instances)
		{
			CKEDITOR.instances[name].destroy(true);
		}

		$(".infor").attr("contenteditable", false);
		$("#savePage").hide();
		$("#edit").text("Habilitar edicion");
		var s  = Sortable({
		els: '.column, .menuPage'
		});
		return;
	}

	else if(action == "false")
	{
		$(".infor").each(function(){
		var editor = CKEDITOR.inline( this );
		});
		$(".infor").attr("contenteditable", true);
		$("#savePage").show();
		$("#edit").text("Deshabilitar edicion");
		return;
	}
}