<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Rent.it | @yield('title')</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper container">
                <a href="/" class="brand-logo left">Rent.it</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/cities/index">Cities</a></li>
                    <li><a href="/leases/index">Leases</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="users-dropdown">Account<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
            <ul id="users-dropdown" class="dropdown-content">
                <li><a href="/users/create">Join</a></li>
                <li><a href="/users/login">Log In</a></li>
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
                        This website is made as a student project, for my studies. It offers a complete management solution for rentals.
                        Don't hesitate to get in touch with me if this application interests you, don't hesitate to contact me, so we can do
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
    <script src="/js/all.js"></script>
    <script>
        $('.slider').slider();
    </script>
</body>
</html>