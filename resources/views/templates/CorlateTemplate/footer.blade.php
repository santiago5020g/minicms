
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>


<script>
// Turn off automatic editor creation first.
CKEDITOR.config.contentsCss = [ 
'{{ asset("css/font-awesome.min.css") }}',
'{{ asset("css/bootstrap.min.css") }}',
'{{ asset("css/animate.min.css") }}',
'{{ asset("css/prettyPhoto.css") }}',
'{{ asset("css/main.css") }}',
'{{ asset("css/responsive.css") }}',
'{{ asset("images/ico/favicon.ico") }}',
'{{ asset("images/ico/apple-touch-icon-144-precomposed.png") }}',
'{{ asset("images/ico/apple-touch-icon-114-precomposed.png") }}',
'{{ asset("images/ico/apple-touch-icon-72-precomposed.png") }}',
'{{ asset("images/ico/apple-touch-icon-57-precomposed.png") }}'
];

CKEDITOR.scriptLoader.load( '{{ asset("js/jquery.js") }}' );
CKEDITOR.scriptLoader.load( '{{ asset("js/bootstrap.min.js") }}' );
CKEDITOR.scriptLoader.load( '{{ asset("js/jquery.prettyPhoto.js") }}' );
CKEDITOR.scriptLoader.load( '{{ asset("js/jquery.isotope.min.js") }}' );
CKEDITOR.scriptLoader.load( '{{ asset("js/main.js") }}' );
CKEDITOR.scriptLoader.load( '{{ asset("js/wow.min.js") }}' );

CKEDITOR.config.allowedContent = true;
CKEDITOR.dtd.$removeEmpty['span'] = false;
CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.config.extraPlugins = 'sourcedialog';


</script>

<script type="text/javascript">
    $("#edit").click(function(){

        var action = $(".infor").attr("contenteditable");
        if(action == "true")
        {
            for(name in CKEDITOR.instances)
            {
                CKEDITOR.instances[name].destroy(true);
            }

            $(".infor").attr("contenteditable", false);
            $("#savePage").hide();
            $("#edit").text("Habilitar edicion");
            return;
        }

        else if(action == "false")
        {
            $(".infor").each(function(){
            var editor = CKEDITOR.inline( this );
            CKFinder.setupCKEditor( editor );
            });
            $(".infor").attr("contenteditable", true);
 
            $("#savePage").show();
            $("#edit").text("Deshabilitar edicion");

            return
        }
        
    });
</script>

@yield('footer_scripts')