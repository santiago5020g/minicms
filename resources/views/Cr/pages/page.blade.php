@extends('templates.CorlateTemplate.index')

@section('content')


@section('footer_scripts')

<script src="{{ asset('js/ajax/page/page.js?v=5') }}"></script>

<script src="{{ asset('js/sortable.min.js') }}"></script>

<script>
	Sortable({
	els: '.column'
	});
</script>
@stop


<div id="sections">
	@foreach ($page->sections as $i=> $section)
	<div class="column">
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