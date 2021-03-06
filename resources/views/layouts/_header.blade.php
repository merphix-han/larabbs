<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <a href="{{url('/')}}" class="navbar-brand">LavaBBS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-taraget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav navbar-right">
                @guest
                <li class="navbar-item"><a href="{{route('login')}}" class="nav-link">登陆</a></li>
                <li class="navbar-item"><a href="{{route('register')}}" class="nav-link">注册</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('users.show',Auth::user()->id)}}">个人中心</a>
                            <a class="dropdown-item" href="{{route('users.edit',Auth::user()->id)}}">编辑资料</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="logout" href="#">
                                <form action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                                </form>
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>