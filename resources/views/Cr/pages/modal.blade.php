@section('footer_scripts')
<script src="{{ asset('js/sortable.min.js') }}"></script>
<script src="{{ asset('js/ajax/page/page.js?v=10') }}"></script>



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
    

    $(function(){
		$.contextMenu({
			selector: '.menuPage', 
			callback: function(key, options) {
				var page =  $(this);
				disablePage(page);
			},
			items: {
				"Deshabilitar Pagina": {name: "Deshabilitar pagina", icon: "delete"},
			}
		});
	});

});


</script>
@stop


<!-- Modal of disabled sections -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Secciones deshabilitadas</h4>
      </div>
      <div class="modal-body">
        <div class="container">
			<form id="sectionDisabled">
				@foreach ($page->sectionsDisabled as $i=> $section)
				<div>
					<input type="checkbox" name="sectionDisabled[]" value="{{ $section->id }}"> {{ $section->name }}
				</div>
				@endforeach
				<input type="hidden" name="idPage" id="idPage" value="{{ $page->id }}">
			    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="enableSections">Habilitar secciones</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal of add pages -->
<div class="modal fade" id="modalAddPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar pagina</h4>
      </div>
      <div class="modal-body">
        <div class="container">
			<form id="frmAddPage" class="form-horizontal">
				<div class="form-group">
                    <div class="col-md-4">
                        <label for="">Nombre de la pagina</label>
					    <input class="form-control" type="textbox" name="txtPageName" id="txtPageName" style="border-color: #333;border-style: solid;">
                    </div>
				</div>
			    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnAddPage">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal of disabled sections -->
<div class="modal fade" id="modalDisabledPages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Paginas deshabilitadas</h4>
      </div>
      <div class="modal-body">
        <div class="container">
			<form id="frmPageDisabled">
				@foreach ($page->pagesDisabled as $i=> $pagesDisabledsection)
				<div>
					<input type="checkbox" name="chkPagesDisabled[]" value="{{ $pagesDisabledsection->id }}"> {{ $pagesDisabledsection->name }}
				</div>
				@endforeach
			    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="enablePages">Habilitar paginas</button>
      </div>
    </div>
  </div>
</div>