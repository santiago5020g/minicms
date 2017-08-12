<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Home | Corlate</title>

<!-- core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->       
<link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
<link rel="stylesheet" href="{{ asset('css/jqueryContextMenu.css') }}">


<style type="text/css">

    .left, .left2, .left3, .left4, .left5, .left6
    {
        float: right;
        right: 0 !important;
        height: auto;
        position: fixed;
        top: 70px;
        z-index: 99999;
    }

    .left 
    {
        margin-top: 100px;
    }

    .left2 
    {
       
        margin-top: 150px;
    }

    .left3 
    {
       
        margin-top: 200px;
    }

    .left4 
    {
       
        margin-top: 250px;
    }

    .left5 
    {
       
        margin-top: 300px;
    }

    .left6 
    {
        margin-top: 350px;
    }

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