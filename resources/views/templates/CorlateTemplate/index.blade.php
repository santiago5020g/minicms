<html>
    <head>
        <title>App Name</title>
        @include('templates.CorlateTemplate.header')
    </head>
    <body>
        @include('templates.CorlateTemplate.menu')
    		@yield('content')
        <div class="row">
            <button class="btn btn-lg btn-success left" id="edit">Habilitar edicion</button>
            <button class="btn btn-lg btn-success left3" id="addSection">Agregar seccion</button>
            <button class="btn btn-lg btn-success left2" style="display: none;" id="savePage">Guardar</button> 
        </div>
        @include('templates.CorlateTemplate.footer')
    </body>
</html>
