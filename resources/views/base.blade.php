<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
      
            
                <nav class="navbar navbar-expand-sm navbar-light bg-light">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index')}}">user</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.index')}}">post</a>
                            </li>
                            @if(Auth::check())
                            <li class="nav-item">
                                <p>{{Auth::user()->name}}</p>
                              
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.logout')}}">logout</a>
                            </li>
                            @else 
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.login')}}">login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.create')}}">resigter</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>

                @yield('main')
            
      
    </div>
    <script src="{{ mix('js/app.js')}}" defer></script>
</body>
</html>