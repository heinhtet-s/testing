<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
         <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
       .hein a {
           text-decoration: none;

          transition-duration: 0.3s;
     
           
       } 
       .hein a:hover{
         font-size: 20px;
       }
    </style>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="{{route('homes')}}">blog</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                <a class="nav-link" href="{{route('homes')}}">Home </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{('admin_page')}}">Admin control</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('user_profile')}}">User-profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('Home_contact')}}">Contant</a>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">
               
                <li class="nav-item ">
                <a class="nav-link" href="{{route('logout')}}">log out</a>
                </li>
              </ul>
              
            </div>
          </nav>
     
        <div class="row">
            <div class="list-group hein col-md-3">

              <a href="{{route('admin_profile')}}" class="list-group-item list-group-item-action">admin Profile</a>
            <a href="{{route('user_account')}}" class="list-group-item list-group-item-action">user-account</a>
            <a href="{{route('premium')}}" class="list-group-item list-group-item-action">Manage preminum user</a>
            <a href="{{route('Admin_contact')}}" class="list-group-item list-group-item-action">Contact-list</a>
              </div>
@yield('content')
</div>

    </body>