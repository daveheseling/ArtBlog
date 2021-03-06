<nav class="navbar navbar-default navbar-fixed-top" style="margin-top: 0px; opacity: 1; background-color: rgba(59, 59, 59, 0.7); border-color: rgb(68, 68, 68);">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('/img/logo-small.png')}}" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav">--}}

            {{--</ul>--}}
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{Request::is('/') ? "active" : ""}}"><a href="{{route('index')}}">Home</a></li>
                <li class="{{Request::is('postlist') ? "active" : ""}}"><a href="{{route('postList')}}">All Posts</a></li>
                <li class="{{Request::is('categorylist') ? "active" : ""}}"><a href="{{route('categoryList')}}">Categories</a></li>
                <li class="{{Request::is('artistlist') ? "active" : ""}}"><a href="{{route('artistList')}}">Artists</a></li>
                {{--<li class="{{Request::is('about') ? "active" : ""}}"><a href="{{route('about')}}">About <span class="sr-only">(current)</span></a></li>--}}
                <li class="{{Request::is('contact') ? "active" : ""}}"><a href="{{route('contactPage')}}">Contact</a></li>

                @if(Auth::check())
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('postCreate')}}">Create New Post</a></li>
                        <li><a href="{{route('userShow', auth()->id())}}">My Posts</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>

                @elseif(Auth::guard('admin')->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('postCreate')}}">Create New Post</a></li>
                            <li><a href="#">My Posts</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('adminLogout')}}">Logout</a></li>
                        </ul>
                    </li>


                @else

                    <a href="{{route('login')}}" class="btn btn-default" style="margin-top: 8px; margin-left: 30px; margin-right:1vw">Login</a>

                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>