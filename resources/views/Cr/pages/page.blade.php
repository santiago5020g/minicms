@extends('templates.CorlateTemplate.index')

@section('content')


@section('footer_scripts')
<script src="{{ asset('js/ajax/page/page.js?v=7') }}"></script>
<script src="{{ asset('js/sortable.min.js') }}"></script>


<script>
$.getScript("{{ asset('js/jqueryContextMenu.js') }}", function(){
	$(function(){
		$.contextMenu({
			selector: '.column', 
			callback: function(key, options) {
				var section =  $(this);
				disableSection(section);
			},
			items: {
				"Deshabilitar seccion": {name: "Deshabilitar seccion", icon: "delete"},
			}
		});
	});

	

});

Sortable({
els: '.column'
});

</script>
@stop


<div id="sections">
	@foreach ($page->sections as $i=> $section)
	<div class="column" id="{{ $section->id }}">
		<input type="hidden" name="section[]" class="arra" value="{{ $section->id }}">
		<div name="editor[]" class="infor arra"  contenteditable = "false" > 
			{!! $section->content !!}
		</div>
	</div>
	@endforeach
</div>




<input type="hidden" id="idPage" value="{{ $page->id }}">

<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">



@endsection