<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Faster') }}</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- fonts style -->
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-warning">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- info section -->
        <section class="info_section bg-dark">
            <div class="container">
                <div><a href="" class="h2 text-white"> Faster </a></div>
                <div class="row">
                    <div class="w-25 mt-5">
                        <p>Téléchargez l’application Faster</p>

                        <div class="btn-box">
                            <a href="" class="col-md-12">
                                <img src="images/app_store.png" alt="">
                            </a>
                            <a href="" class="col-md-12">
                                <img src="images/google_play.png" alt="">
                            </a>
                        </div>
                    </div>
                    <nav class="w-75 navbar">
                        <div class="w-25">
                            <div class="text-white">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <h2 class="text-center">Navigation</h2>
                                    </li>
                                </ul>
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('apropos') }}">A propos </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('passagers.index') }}">Passagers </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('chauffeur.index') }}">Chauffeur</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('compte.passager') }}">Inscription</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-25">
                            <div class="text-white pb-5">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <h2 class="text-center">Faster</h2>
                                    </li>
                                </ul>
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('profile') }}">Mon compte </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Mes courses </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">CGV</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-25">
                            <div class="text-white pb-5">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <h2 class="text-center">Contact</h2>
                                    </li>
                                </ul>
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="mailto:contact@faster.com">Contact@faster.com</a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fa fa-facebook"
                                                aria-hidden="true"></i>&nbsp; facebook </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fa fa-instagram"
                                                aria-hidden="true"></i>&nbsp; instagram </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </section>
        <!-- end info_section -->


        <!-- footer section -->
        <footer class="footer_section bg-dark">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> Created By
                    <a target="_blank" href="https://github.com/Elmane091203">ELMANE DJAANFFAR HOUMADI</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->


        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </div>
</body>

</html>
