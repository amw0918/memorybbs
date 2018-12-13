<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="/">MemoryBBS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                {{--<li class="nav-item active">--}}
                {{--<a class="nav-link" href="#">Home</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Home</a>--}}
                {{--</li>--}}
                <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">话题</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">分享</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">教程</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">问答</a></li>
                <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">公告</a></li>
            </ul>

            @guest

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }}</a>
                    </li>
                </ul>

            @else

                <ul class="navbar-nav">
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                               @if(Auth::user()->avatar)
                                   <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px"
                                        height="30px">
                               @endif
                            </span>
                            {{ Auth::user()->nickname }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show',Auth::id()) }}">个人中心</a>
                            <a class="dropdown-item" href="{{ route('topics.create') }}">发布话题</a>
                            <a class="dropdown-item" href="{{ route('users.edit',Auth::id()) }}">编辑资料</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout_form').submit()">{{ __('Logout') }}</a>
                            <form method="post" id="logout_form" action="{{ route('logout') }}"
                                  style="display:none">@csrf</form>
                        </div>
                    </li>
                </ul>

            @endguest


        </div>
    </div>
</nav>