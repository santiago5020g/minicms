@extends('templates.CorlateTemplate.index')

@section('content')


@section('footer_scripts')
<script src="{{ asset('js/ajax/page/page.js?v=4') }}"></script>

<script src="{{ asset('js/sortable.min.js') }}"></script>

<script>
	Sortable({
	els: '.column'
	});
</script>
@stop


@foreach ($page->sections as $i=> $section)
	<input type="hidden" name="section[]" value="{{ $section->id }}">
	
	<div name="editor[]" class="infor column"  contenteditable = "false" > 
		{!! $section->content !!}
	</div>
@endforeach





<input type="hidden" id="idPage" value="{{ $page->id }}">



@endsection