@extends('templates.CorlateTemplate.index')

@section('content')


<div id="editor1" contenteditable="false">
	{!! $page->content !!}
</div>


<input type="hidden" id="idPage" value="{{ $page->id }}">


@section('footer_scripts')
<script src="{{ asset('js/ajax/page/page.js?v=1') }}"></script>
@stop


@endsection