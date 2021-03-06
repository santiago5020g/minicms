<header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        @foreach ($page->pages as $pageMenu)
                            @if($page->id == $pageMenu->id)
                                <li id="{{ $pageMenu->id }}" class="active menuPage">
                                    <input type="hidden" name="menuPage[]" value="{{ $pageMenu->id }}">
                                    <a href="{{ url('page/'.$pageMenu->id) }}">{{ $pageMenu->menu->name }}</a>
                                </li>
                            @else
                                <li id="{{ $pageMenu->id }}" class="menuPage">
                                    <input type="hidden" name="menuPage[]"  value="{{ $pageMenu->id }}">
                                    <a href="{{ url('page/'.$pageMenu->id) }}">{{ $pageMenu->menu->name }}</a>
                                </li>
                            @endif
                        @endforeach                      
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->	
</header><!--/header-->