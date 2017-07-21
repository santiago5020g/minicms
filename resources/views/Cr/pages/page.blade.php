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


<style>
.column header {
			
		
		}

		.column {
			
			/* cursor: move; */
		}

        .column.sortable-moving {
            opacity: .4;
        }

		.column.sortable-over,
		#columns-dragOver .column.sortable-over,
		#columns-dragEnd .column.sortable-over,
		#columns-almostFinal .column.sortable-over {
			border: 2px dashed #000;
		}

</style>





@foreach ($page->sections as $i=> $section)
	<input type="hidden" name="section[]" value="{{ $section->id }}">
	
	<div name="editor[]" class="infor column"  contenteditable = "false" > 
		{!! $section->content !!}
	</div>
@endforeach





<input type="hidden" id="idPage" value="{{ $page->id }}">



@endsection