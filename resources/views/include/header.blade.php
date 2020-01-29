
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="/">@lang('home.home_menu')</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/services">@lang('home.services_menu')</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="/about">@lang('home.about_menu')</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/posts">@lang('home.posts_menu')</a>
            </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('home.login_menu')</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">@lang('home.rigister_menu')</a>
                        </li>
                    @endif
                @else

                <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>

                {{-- <li class="nav-item dropdown">


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach (auth()->user()->unreadNotifications as $notification) 
                        <a class="dropdown-item unread" href="posts/{{$notification->data['post_id']}}">{{$notification->data['data']}}
                        <span><a  href="posts/{{$notification->data['post_id']}}">View</a> </span> 
                        </a>
                        
                        @endforeach

                        @foreach (auth()->user()->readNotifications as $notification) 
                        <a class="dropdown-item" href="#">{{$notification->data['data']}}
                        </a>    
                        @endforeach
                    </div>
                </li> --}}


                {{-- <li class="nav-item dropdown">
                    
                    <a id="navbarDropdown" href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                        <span><i class="fas fa-bell"></i><span class="badge badge-light">{{count($notifications)}}</span></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach ($notifications as $notification) 
                        <a class="dropdown-item unread" href="{{route('marasred', $notification->id)}}">{{$notification->data['data']}}</a>    
                        @endforeach
                    </div>
                </li> --}}

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span><img  class="user_avatar"src="/storage/user_images/{{auth()->user()->user_image}}" alt="" srcset=""></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="/Profile/{{auth()->user()->name}}">Profile</a>

                        <a class="dropdown-item" href="/dashboard/{{auth()->user()->name}}/assighment">Assighment</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span>lan</span>
                    </a>
                
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/locale/en">En</a>
                        <a class="dropdown-item" href="/locale/chi">Chi</a>
                        <a class="dropdown-item" href="/locale/fr">Fr</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>