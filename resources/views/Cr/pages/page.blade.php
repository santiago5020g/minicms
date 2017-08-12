@extends('templates.CorlateTemplate.index')

@section('content')



@include('templates.CorlateTemplate.menu')

@include('Cr.pages.modal')

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


@endsection