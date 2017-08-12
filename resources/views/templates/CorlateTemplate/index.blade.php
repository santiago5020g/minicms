<html>
    <head>
        <title>App Name</title>
        @include('templates.CorlateTemplate.header')
    </head>
    <body>
    	@yield('content')
        <div class="row">
            <button class="btn  btn-success left" id="edit">Habilitar edicion</button>
            <button class="btn  btn-success left3" id="addSection">Agregar seccion</button>
            <button class="btn  btn-success left2" style="display: none;" id="savePage">Guardar</button>
            <button class="btn  btn-success left4" data-toggle="modal" data-target="#myModal" id="enableSection">Secciones deshabilitadas</button>
            <button class="btn  btn-success left5" data-toggle="modal" data-target="#modalAddPage" id="addPage">Agregar pagina</button>
            <button class="btn  btn-success left6" data-toggle="modal" data-target="#modalDisabledPages" id="disabledPages">Paginas deshabilitadas</button>  
        </div>
        @include('templates.CorlateTemplate.footer')
    </body>
</html>
