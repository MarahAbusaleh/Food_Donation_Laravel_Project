<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kind Heart Charity - Free Bootstrap 5.2.2 CSS Template</title>

    <link href="css/style.css" rel="stylesheet" />
    <!-- CSS FILES -->
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.3/getting-started/download/">
    <link href="{{ asset('messages-style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/templatemo-kind-heart-charity.css') }}" rel="stylesheet">

    <link href="{{ asset('css/partners.css') }}" rel="stylesheet">


    <link href="css/responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://fontawesome.com/icons/link?f=classic&s=solid">
</head>

<body id="section_1">


    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" class="logo img-fluid" alt="Kind Heart Charity">
                <span>
                    FoodSHare
                    <small>Non-profit Organization</small>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ url('/#ourStory') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ url('/#becomeVol') }}">Volunteer</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ url('contact-us') }}">Contact</a>
                    </li>
                    @if (auth()->check())
                        {{-- <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn"
                                href="{{ route('logout') }}">Logout</a>
                        </li> --}}
                        {{-- <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="../assets/images/profile/MyProfailPicture.jpeg" alt=""
                                            width="35" height="35" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop2">
                                        <div class="message-body">
                                            <a href="profail.html"
                                                class="d-flex align-items-center gap-2 dropdown-item">
                                                <i class="ti ti-user fs-6"></i>
                                                <p class="mb-0 fs-3">My Profile</p>
                                            </a>
                                            <a href="./authentication-login.html"
                                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="margin-top: 10px">
                                {{-- <img  src="{{asset('images/profile-uesr.png')}}" alt="" style="width: 100px;"> --}}
                                <svg viewBox="-1.6 -1.6 19.20 19.20" xmlns="http://www.w3.org/2000/svg" fill="#000000" style="width:30px">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="m 8 1 c -1.65625 0 -3 1.34375 -3 3 s 1.34375 3 3 3 s 3 -1.34375 3 -3 s -1.34375 -3 -3 -3 z m -1.5 7 c -2.492188 0 -4.5 2.007812 -4.5 4.5 v 0.5 c 0 1.109375 0.890625 2 2 2 h 8 c 1.109375 0 2 -0.890625 2 -2 v -0.5 c 0 -2.492188 -2.007812 -4.5 -4.5 -4.5 z m 0 0"
                                            fill="#5bc1ac"></path>
                                    </g>
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Your donations</a></li>
                                <li><a class="dropdown-item" href="#">Chat</a></li>
                                <li><a class="dropdown-item nav-link custom-btn custom-border-btn btn" style="height: 40px; width:120px; margin:0 15px 15px 15px" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="{{ url('login') }}">Login</a>
                        </li>
                    @endif



                </ul>
            </div>
        </div>
    </nav>
