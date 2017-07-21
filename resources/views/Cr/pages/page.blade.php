@extends('templates.CorlateTemplate.index')

@section('content')


<div id="" contenteditable="false">
	@foreach ($page->sections as $i=> $section)
		<input type="hidden" name="section[]" value="{{ $section->id }}">
		<div name="editor[]" class="infor" contenteditable = "false">
			{!! $section->content !!}
		</div>
	@endforeach
</div>



<input type="hidden" id="idPage" value="{{ $page->id }}">


@section('footer_scripts')
<script src="{{ asset('js/ajax/page/page.js?v=4') }}"></script>
@stop


@endsection