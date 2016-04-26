<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Date.it | @yield('title')</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper container">
                <a href="/" class="brand-logo left">Date.it</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/cities">Cities</a></li>
                    @if(Auth::check())
                        <li><a href="/users/discover">Show me some people!</a></li>
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="logged-dropdown">
                                <i class="material-icons left">person_pin</i>
                                {{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>

                    @else
                        <li><a class="dropdown-button" href="#!" data-activates="users-dropdown">Account<i class="material-icons right">arrow_drop_down</i></a></li>
                    @endif
                </ul>
            </div>
            <ul id="users-dropdown" class="dropdown-content">
                <li><a href="/users/create">Join</a></li>
                <li><a href="/users/login">Log In</a></li>
            </ul>
            <ul id="logged-dropdown" class="dropdown-content">
                <li><a href="/users/home">Home</a></li>
                <li><a href="/users/logout">Log Out</a></li>
                @if(Auth::check())
                    @if(Auth::user()->admin)
                        <hr>
                        <li><a href="/admin/home">Administration</a></li>
                    @endif
                @endif
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Made By Lucien LE FOLL</h5>
                    <p class="grey-text text-lighten-4">
                        This website is made as a student project, for my studies.
                        Don't hesitate to get in touch with me if this application interests you, so we can do
                        business together.
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Get In Touch!</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="//blog.lucienlefoll.fr">My Blog</a></li>
                        <li><a class="grey-text text-lighten-3" href="//twitter.com/lulu_fool">My Twitter</a></li>
                        <li><a class="grey-text text-lighten-3" href="//github.com/lucien-le-foll">My GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © {{ date('Y') }} Lucien LE FOLL
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?libraries=places&key=AIzaSyC0sG784JzY4pKHLAxdvCS-yweQBGUwOeU'></script>
    <script src="/js/all.js"></script>
    <script>
        $(document).ready(function(){
            $('.parallax').parallax();
            $('.slider').slider();
            $('select').material_select();
            $('.modal-trigger').leanModal();
        });
        @yield('script')
    </script>
</body>
</html>