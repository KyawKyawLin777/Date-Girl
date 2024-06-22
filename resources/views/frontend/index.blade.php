<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon/favicon.ico') }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Date Girl</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/gaia.css') }}" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- simplePagination.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- simplePagination.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/simplePagination.css">
</head>
<style>
    /* General styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    /* Search input and button styling */
    .search-container {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .search-container input {
        width: 300px;
        padding: 10px;
        border-radius: 5px 0 0 5px;
        border: 1px solid #ddd;
        outline: none;
        transition: all 0.3s;
    }

    .search-container input:focus {
        border-color: #007bff;
    }

    .search-container button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: all 0.3s;
        height: 43px;
    }

    .search-container button:hover {
        background-color: #0056b3;
    }

    /* Team member card styling */
    .team {
        margin-top: 5%;
    }

    .girl-image {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 5%;
    }

    .girl-image:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        border: 3px solid #ff4081;
    }

    .member {
        /* background-color: #fff; */
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
        transition: all 0.3s;
    }

    .member:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .member .content {
        padding: 20px;
        text-align: center;
    }

    .member .avatar {
        margin-bottom: 15px;
    }

    .member .avatar img {
        border-radius: 50%;
        width: 80px;
        height: 80px;
    }

    .member .title {
        font-size: 18px;
        font-weight: bold;
        margin: 10px 0;
    }

    .member .small-text {
        font-size: 14px;
        color: #777;
        margin-bottom: 15px;
    }

    .member .description {
        font-size: 14px;
        color: #555;
    }

    .d-flex {
        display: flex;
        flex-wrap: wrap;

    }

    @media screen and (max-width: 300px) {

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 50%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }

        #searchInput {

            width: 100%;
        }

        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 45%;
            /* Four items per row on medium screens */
            padding: 0 16px;
            /* Adjust as needed */
        }

        .girl-image {
            width: 100px !important;
            height: 100px !important;
            margin-top: 10px;

        }

        .member {
            width: 110%;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }
    }

    @media screen and (min-width: 301px) {
        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 50%;
            /* Four items per row on medium screens */
            padding: 0 10px;
            /* Adjust as needed */
        }

        .girl-image {
            width: 120px !important;
            height: 120px !important;
            margin-top: 10px;

        }

        .title {
            width: 80px;
        }

        #searchInput {

            width: 65%;
        }

        .member {
            width: 120px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }


        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 50%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }
    }

    @media screen and (min-width: 321px) {
        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 50%;
            /* Four items per row on medium screens */
            padding: 0 15px;
            /* Adjust as needed */
        }

        .girl-image {
            width: 130px !important;
            height: 130px !important;
            margin-top: 10px;

        }


        .title {
            width: 80px;
        }

        #searchInput {

            width: 65%;
        }

        .member {
            width: 120px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 50%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }
    }

    @media screen and (min-width: 375px) {
        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 50%;
            /* Four items per row on medium screens */
            padding: 0 25px;
            /* Adjust as needed */
        }

        .title {
            width: 80px;
        }

        #searchInput {

            width: 65%;
        }

        .member {
            width: 140px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 50%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }
    }

    @media screen and (min-width: 400px) {
        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 50%;
            /* Four items per row on medium screens */
            padding: 0 33px;
            /* Adjust as needed */
        }

        .girl-image {
            width: 150px !important;
            height: 150px !important;
            margin-top: 15px;

        }

        .title {
            width: 80px;
        }

        #searchInput {

            width: 75%;
        }

        .member {
            width: 140px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 50%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }

        form {
            width: 100%;
        }
    }

    @media screen and (min-width: 450px) {
        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 40%;
            /* Four items per row on medium screens */
            padding: 0 40px;
            /* Adjust as needed */
        }

        .title {
            width: 80px;
        }

        .girl-image {
            width: 150px !important;
            height: 150px !important;
            margin-top: 15px;

        }

        .member {
            width: 140px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 30%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }

        form {
            width: 90%;
            margin: 0 auto;
        }
    }

    @media screen and (min-width: 500px) {
        .girl-list {
            flex: 0 0 20%;
            /* Four items per row on medium screens */
            width: 30%;
            /* Four items per row on medium screens */
            padding: 0 15px;
            /* Adjust as needed */
        }

        .girl-image {
            width: 130px !important;
            height: 130px !important;
            margin-top: 15px;

        }

        #searchInput {

            width: 80%;
        }


        .title {
            width: 80px;
        }

        .member {
            width: 120px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 30%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }

        form {
            width: 450px;
            margin: 0 auto;
        }
    }

    @media screen and (min-width: 600px) {
        .girl-list {
            flex: 0 0 25%;
            /* Four items per row on medium screens */
            width: 40%;
            /* Four items per row on medium screens */
            padding: 0 5px;
            /* Adjust as needed */
        }

        #searchInput {

            width: 80%;
        }


        .title {
            width: 80px;

        }

        .member {
            width: 130px;
            margin-bottom: 15px;
            height: 200px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 30%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }

        form {
            width: 450px;
            margin: 0 auto;
        }
    }



    @media screen and (min-width: 800px) {
        .girl-list {
            flex: 0 0 20%;
            /* Four items per row on medium screens */
            width: 30%;
            /* Four items per row on medium screens */
            padding: 0 5px;
            /* Adjust as needed */
        }

        #searchInput {

            width: 30%;
        }


        .title {
            text-align: center;
            font-size: smaller;
            width: fit-content;
            max-width: 150px;
            /* Adjust the max-width as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .member {
            width: 130px;
            margin-bottom: 15px;
            height: 180px;
            /* Adjust as needed */
        }

        .container-fluid .row {
            display: flex;
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
        }

        .container-fluid .col-md-4 {
            flex: 1 0 30%;
            /* Equal width for four items per row on medium screens */
            padding: 0 7px;
        }

        /* Optional: Adjust margin-bottom for specific styling needs */
        .container-fluid .mb-3 {
            margin-bottom: 1rem;
        }

        form {
            width: 600px;
            margin: 0 auto;
        }
    }

    @media screen and (min-width: 1000px) {
        .girl-list {
            flex: 0 0 20%;
            /* Four items per row on medium screens */
            width: 30%;
            /* Four items per row on medium screens */
            padding: 0 5px;
            /* Adjust as needed */
        }

        #searchInput {

            width: 30%;
        }


        .title {
            text-align: center;
            font-size: smaller;
            width: fit-content;
            max-width: 150px;
            /* Adjust the max-width as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .member {
            width: 150px;
            margin-bottom: 15px;
            height: 180px;
            /* Adjust as needed */
        }
    }

    @media screen and (min-width: 1200px) {
        .girl-list {
            flex: 0 0 20%;
            /* Four items per row on medium screens */
            width: 30%;
            /* Four items per row on medium screens */
            padding: 0 5px;
            /* Adjust as needed */
        }

        #searchInput {

            width: 50%;
        }


        .title {
            text-align: center;
            font-size: smaller;
            width: fit-content;
            max-width: 150px;
            /* Adjust the max-width as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .member {
            width: 180px;
            margin-bottom: 15px;
            height: 180px;
            /* Adjust as needed */
        }
    }
</style>
<style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .filter-form {
        margin-top: 50px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .filter-form label {
        font-weight: bold;
    }

    .filter-form input[type="text"],
    .filter-form select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .filter-form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .filter-form button:hover {
        background-color: #0056b3;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination button {
        padding: 10px 15px;
        margin: 0 5px;
        border: 1px solid #ddd;
        background-color: #f8f9fa;
        color: #007bff;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .pagination button.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination button:hover {
        background-color: #0056b3;
        color: white;
        transform: scale(1.1);
    }

    .pagination button:disabled {
        background-color: #e9ecef;
        color: #6c757d;
        cursor: not-allowed;
    }

    .pagination button:disabled:hover {
        background-color: #e9ecef;
        color: #6c757d;
        transform: none;
    }

    @media (max-width: 767px) {
        #filterContainer {
            display: none;
        }

        #laptop {
            display: none;
        }

        #girl-language1 {
            display: none;
        }
    }

    @media (min-width: 768px) {

        #price,
        #country1,
        #popular {
            display: none;
        }

        #girl-language {
            display: none;
        }

        #phone {
            display: none;
        }
    }



    * {
        padding: 0;
        margin: 0;
    }

    body {
        background-color: #000;
    }

    .center {
        position: absolute;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .center h1 {
        color: rgba(255, 0, 0, 0.1);
        font-size: 50px;
        text-transform: uppercase;
        font-weight: 700;
        background-size: cover;
        background-image: url(https://img.freepik.com/free-photo/vivid-blurred-colorful-wallpaper-background_58702-2430.jpg);
        -webkit-background-clip: text;
        animation: background-text-animation 15s linear infinite;
    }

    @keyframes background-text-animation {
        0% {
            background-position: left 0px top 50%;
        }

        50% {
            background-position: left 1500px top 50%;
        }

        100% {
            background-position: left 0px top 50%;
        }
    }




    .on {
        border: 5px solid green;
    }

    .off {
        border: 5px solid grey;
    }

    /* CSS for the off-message */
    .off-message {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        color: red;
        font-size: 18px;
        /* display: none; */
        display: block;
        /* Initially hide the off-message */
    }

    /* CSS for the girl-list item */
    .girl-list {
        position: relative;
    }



    /* CSS to show the off-message on hover */
    /* .girl-list:hover .off-message {
        display: block;
    } */
</style>


<body>

    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">

            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">


                    <li class="dropdown" id="girl-language1">
                        <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa-solid fa-language"></i> {{ __('language') }}
                        </a>

                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="{{ route('changeLanguage', 'en') }}">
                                    <i class="fa-solid fa-flag-usa"></i>
                                    English
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('changeLanguage', 'th') }}">
                                    <i class="fa-solid fa-flag"></i>
                                    Thiland
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('changeLanguage', 'ch') }}">
                                    <i class="fa-solid fa-flag"></i>
                                    China
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt"></i> {{ __('messages.share') }}
                        </a>

                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                    target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a>
                            </li>
                            <li>
                                <a href="https://twitter.com/share?url={{ urlencode(Request::url()) }}&text=Check%20this%20out!"
                                    target="_blank"><i class="fa-brands fa-twitter"></i> Twitter</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/share?url={{ urlencode(Request::url()) }}"
                                    target="_blank"><i class="fa-brands fa-instagram"></i> Instagram</a>
                            </li>


                        </ul>
                    </li>



                    <li id="price">
                        <div class="mb-3 col-12" style="margin-top: 10%;">
                            <div class="form-group">
                                {{-- <label for="category">{{ __('messages.price') }}:</label> --}}
                                <select class="form-control" id="category" name="category">
                                    <option value="">{{ __('messages.select price') }}</option>
                                    <option id="minimum" value="Minimum To Maximum">
                                        {{ __('messages.minimum to maximum') }}</option>
                                    <option id="maximum" value="Maximum To Minimum">
                                        {{ __('messages.maximum to minimum') }}</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li id="country1">

                        <div class="mb-3 col-12" style="margin-top: 10%;">
                            <div class="form-group">
                                {{-- <label for="country">{{ __('messages.country') }}:</label> --}}
                                <select class="form-control" id="country" name="country">
                                    <option value="">{{ __('messages.select country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->country }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>
                    <li id="popular">
                        <div class="mb-3 col-12" style="margin-top: 10%;">
                            <div class="form-group">
                                {{-- <label for="price">{{ __('messages.popular') }}:</label> --}}
                                <select class="form-control" id="popular_title" name="popular">
                                    <option value="">{{ __('messages.select popular') }}</option>
                                    <option value="Popular">{{ __('messages.popular') }}</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="center" style="width: 40% !important">

                    <marquee>
                        <h1 style="color: rgba(242, 71, 185, 0.647);">Welcome From Pink Website</h1>
                    </marquee>
                </div>

            </div>
            <div id="phone" class="center" style="width: 70% !important">
                <marquee>
                    <h1 style="color: rgba(242, 71, 185, 0.647);">Welcome From Pink Website</h1>
                </marquee>
            </div>

            <!-- /.navbar-collapse -->
        </div>

    </nav>


    <div class="section section-header">
        <div class="parallax filter filter-color-red" style="height: 600px">
            <div class="image"
                style="background-image: url('https://i.ebayimg.com/images/g/9-QAAOSwOLdksDxb/s-l1200.webp'); ">
            </div>

            <div class="container">
                <div style="margin-top: 100px;" id="girl-language">
                    <div class="dropdown" style="color: white;">
                        <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown"
                            style="color: white;font-size: 17px;">
                            <i class="fa-solid fa-language"></i> {{ __('language') }}
                        </a>

                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="{{ route('changeLanguage', 'en') }}">
                                    <i class="fa-solid fa-flag-usa"></i>
                                    English
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('changeLanguage', 'th') }}">
                                    <i class="fa-solid fa-flag"></i>
                                    Thiland
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('changeLanguage', 'ch') }}">
                                    <i class="fa-solid fa-flag"></i>
                                    China
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="content">
                    <div class="title-area">
                        {{-- <p>Free Demo</p> --}}
                        @foreach ($texts as $tex)
                            <h2 style="color: blue;">{{ $tex->text }}</h2>
                        @endforeach
                        <div class="separator line-separator">♦</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="section section-our-team-freebie" style="background-color: pink">
        <div class="parallax">
            <div class="image" style="background-image:url('assets/img/header-2.jpeg')">
            </div>
            <div class="container">

                <div class="container" style="margin-top: -80px;">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="search-container d-flex">

                        </div>
                    </form>
                    <div class="container-fluid" id="filterContainer">
                        <div class="row justify-content-center d-flex">

                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label for="price">{{ __('messages.popular') }}:</label>
                                    <select class="form-control" id="popular_title" name="popular">
                                        <option value="">{{ __('messages.select popular') }}</option>
                                        <option value="Popular">{{ __('messages.popular') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label for="category">{{ __('messages.price') }}:</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="">{{ __('messages.select price') }}</option>
                                        <option id="minimum" value="Minimum To Maximum">
                                            {{ __('messages.minimum to maximum') }}</option>
                                        <option id="maximum" value="Maximum To Minimum">
                                            {{ __('messages.maximum to minimum') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label for="country">{{ __('messages.country') }}:</label>
                                    <select class="form-control" id="country" name="country">
                                        <option value="">{{ __('messages.select country') }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>




                </div>

                <div class="d-flex align-items-center justify-content-around flex-wrap" id="girls-container"
                    style="margin-top: 6%">
                    @foreach ($girls as $girl)
                        <div class="girl-list ">
                            <div>
                                <a href="{{ url('orderPage', $girl->id) }}">
                                    <div class="content position-relative">
                                        <div class="">
                                            <img alt="..."
                                                class="girl-image {{ $girl->status == 'on' ? 'on' : 'off' }}"
                                                style="width: 150px; height: 150px; border-radius: 5%;"
                                                src="{{ asset('storage/' . $girl->profile_photo) }}" />
                                            @if ($girl->status == 'off')
                                                <div class="off-message">
                                                    OFF
                                                </div>
                                            @endif
                                        </div>
                                        <div class="description" style="display: none;">
                                            @foreach ($girl->time_prices as $timePrice)
                                                <p class="price">Price: {{ $timePrice->price }}</p>
                                            @endforeach

                                            @foreach ($girl->accepted_orders as $order)
                                                @if ($girl->id == $order->girl_id)
                                                    <p class="order">{{ $order->girl_id }}</p>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div>
                                            <div id="girl-country" class="girl-country">
                                                @foreach ($countries as $country)
                                                    @if ($country->id == $girl->country)
                                                        {{ $country->country }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div style="font-size: smaller; color: black; font-weight:bold;">
                                            {{ $girl->name }} <br>
                                        </div>
                                        <div
                                            style="font-size: smaller; color: black; font-weight:bold; margin-bottom: 20%;">
                                            {{ $girl->type }} <br>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>



                <div id="pagination-controls"></div>



            </div>
        </div>
    </div>
    </div>

    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">

            <div class="copyright">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script> Creative Romantic, made with love
            </div>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--   core js files    -->
<script src="{{ asset('frontend/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.js') }}" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{ asset('frontend/assets/js/modernizr.js') }}"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{ asset('frontend/assets/js/gaia.js') }}"></script>
{{-- <script>
    $(document).ready(function() {
        $('#searchButton').on('keyup', function() {
            var query = $(this).val();

            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $('#results').empty();
                    $.each(data, function(index, girl) {
                        $('#results').append('<p>' + girl.name + '</p>');
                    });
                }
            });
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            let girls = $('.girl-list');
            let sortOrder = $(this).val();

            girls.sort(function(a, b) {
                let priceA = parseFloat($(a).find('.price').text().replace('Price: ', ''));
                let priceB = parseFloat($(b).find('.price').text().replace('Price: ', ''));

                if (sortOrder === 'Minimum To Maximum') {
                    return priceA - priceB;
                } else if (sortOrder === 'Maximum To Minimum') {
                    return priceB - priceA;
                } else {
                    return 0;
                }
            });

            $('#girls-container').html(girls);
        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
        $("#toggleButton").click(function() {
            $("#filterContainer").toggle();
        });
    });
</script> --}}

<script>
    document.getElementById('country').addEventListener('change', function() {
        var selectedCountry = this.value;
        var girlsList = document.querySelectorAll('.girl-list');

        girlsList.forEach(function(girl) {
            var girlCountry = girl.querySelector('.girl-country').textContent.trim();
            if (selectedCountry === "" || girlCountry === selectedCountry) {
                girl.style.display = 'block';
            } else {
                girl.style.display = 'none';

            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const girlsContainer = document.getElementById('girls-container');
        const originalOrder = Array.from(girlsContainer.getElementsByClassName('girl-list'));

        document.getElementById('popular_title').addEventListener('change', function() {
            if (this.value === 'Popular') {
                sortGirlsByPopularity();
            } else if (this.value === '') {
                revertToOriginalOrder();
            }
        });

        function sortGirlsByPopularity() {
            const girls = Array.from(girlsContainer.getElementsByClassName('girl-list'));

            girls.sort((a, b) => {
                const aOrderCount = a.querySelectorAll('.order').length;
                const bOrderCount = b.querySelectorAll('.order').length;
                return bOrderCount - aOrderCount;
            });

            girls.forEach(girl => girlsContainer.appendChild(girl));
        }

        function revertToOriginalOrder() {
            originalOrder.forEach(girl => girlsContainer.appendChild(girl));
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.girl-list');
        const itemsPerPage = 30;
        const numPages = Math.ceil(items.length / itemsPerPage);
        const paginationControls = document.getElementById('pagination-controls');

        function showPage(page) {
            items.forEach((item, index) => {
                item.style.display = (index >= (page - 1) * itemsPerPage && index < page *
                    itemsPerPage) ? 'block' : 'none';
            });

            document.querySelectorAll('.pagination button').forEach(button => {
                button.classList.remove('active');
            });
            document.querySelector(`.pagination button[data-page="${page}"]`).classList.add('active');
        }

        function createPaginationControls() {
            const paginationContainer = document.createElement('div');
            paginationContainer.classList.add('pagination');

            for (let i = 1; i <= numPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.dataset.page = i;
                button.addEventListener('click', () => showPage(i));
                paginationContainer.appendChild(button);
            }

            paginationControls.appendChild(paginationContainer);
        }

        if (items.length > 0) {
            createPaginationControls();
            showPage(1);
        }
    });
</script>


</html>
