<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Profile Page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- CSS -->
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-kcihgCk65mGAaRa7mBToqOcflEhVqo7hp19r3Wl9nEid3sSvxmXR3o7Nuh3N+p3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css" />
</head>
<style>
    /*
 ⚡MAKE SURE TO SUBSCRIBE PROGRAMMER CLOUD⚡
*/

    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");

    body {
        width: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        min-height: 100vh;
        font-family: "Poppins", sans-serif;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    a {
        text-decoration: none;
    }

    .header__wrapper header {
        width: 100%;
        background: url('{{ asset('assets/img/avatars/pink.jpg') }}') no-repeat 50% 20% / cover;
        min-height: calc(100px + 10vw);
    }

    .header__wrapper .cols__container .left__col {
        padding: 25px 20px;
        text-align: center;
        max-width: 350px;
        position: relative;
        margin: 0 auto;
    }

    .header__wrapper .cols__container .left__col .img__container {
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translatex(-50%);
    }

    .header__wrapper .cols__container .left__col .img__container img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        box-shadow: 1px 3px 12px rgba(0, 0, 0, 0.18);
    }

    .header__wrapper .cols__container .left__col .img__container span {
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        bottom: 3px;
        right: 11px;
        border: 2px solid #fff;
    }

    .header__wrapper .cols__container .left__col h2 {
        margin-top: 60px;
        font-weight: 600;
        font-size: 22px;
        margin-bottom: 5px;
    }

    .header__wrapper .cols__container .left__col p {
        font-size: 0.9rem;
        color: #818181;
        margin: 0;
    }

    .header__wrapper .cols__container .left__col .about {
        justify-content: space-between;
        position: relative;
        margin: 35px 0;
    }

    .header__wrapper .cols__container .left__col .about li {
        display: flex;
        flex-direction: column;
        color: #818181;
        font-size: 0.9rem;
    }

    .header__wrapper .cols__container .left__col .about li span {
        color: #1d1d1d;
        font-weight: 600;
    }

    .header__wrapper .cols__container .left__col .about:after {
        position: absolute;
        content: "";
        bottom: -16px;
        display: block;
        background: #cccccc;
        height: 1px;
        width: 100%;
    }

    .header__wrapper .cols__container .content p {
        font-size: 1rem;
        color: #1d1d1d;
        line-height: 1.8em;
    }

    .header__wrapper .cols__container .content ul {
        gap: 30px;
        justify-content: center;
        align-items: center;
        margin-top: 25px;
    }

    .header__wrapper .cols__container .content ul li {
        display: flex;
    }

    .header__wrapper .cols__container .content ul i {
        font-size: 1.3rem;
    }

    .header__wrapper .cols__container .right__col nav {
        display: flex;
        align-items: center;
        padding: 30px 0;
        justify-content: space-between;
        flex-direction: column;
    }

    .header__wrapper .cols__container .right__col nav ul {
        display: flex;
        gap: 20px;
        flex-direction: column;
    }

    .header__wrapper .cols__container .right__col nav ul li a {
        text-transform: uppercase;
        color: #818181;
    }

    .header__wrapper .cols__container .right__col nav ul li:nth-child(1) a {
        color: #1d1d1d;
        font-weight: 600;
    }

    .header__wrapper .cols__container .right__col nav button {
        background: #0091ff;
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
    }

    .header__wrapper .cols__container .right__col nav button:hover {
        opacity: 0.8;
    }

    .header__wrapper .cols__container .right__col .photos {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
        gap: 20px;
    }

    .header__wrapper .cols__container .right__col .photos img {
        max-width: 100%;
        display: block;
        height: 100%;
        object-fit: cover;
    }

    /* Responsiveness */
    @media (min-width: 320px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 5px;
            /* Adjust this value as needed */

        }


        .header__wrapper .cols__container .right__col .photos img {
            max-width: 140px;
            display: block;
            height: 250px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 250px !important;
            width: 305px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 330px) {


        .photos video {
            max-height: 250px !important;
            width: 315px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 340px) {


        .photos video {
            max-height: 250px !important;
            width: 320px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 350px) {


        .photos video {
            max-height: 250px !important;
            width: 325px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 360px) {


        .photos video {
            max-height: 250px !important;
            width: 330px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 375px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 10px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 150px;
            display: block;
            height: 250px !important;
            object-fit: cover;
        }

        .photos video {
            min-height: 330px !important;
            width: 350px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 400px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 16px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 150px;
            display: block;
            height: 250px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 330px !important;
            width: 360px !important;
            object-fit: cover;
        }


        .photos a img:hover,
        .photos video:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

    }

    @media (min-width: 410px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 22px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 150px;
            display: block;
            height: 250px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 330px !important;
            width: 370px !important;
            object-fit: cover;
        }


        .photos a img:hover,
        .photos video:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

    }

    @media (min-width: 425px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 15px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 170px;
            display: block;
            height: 270px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 330px !important;
            width: 390px !important;
            object-fit: cover;
        }


        .photos a img:hover,
        .photos video:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

    }

    @media (min-width: 430px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 15px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 170px;
            display: block;
            height: 270px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 330px !important;
            width: 400px !important;
            object-fit: cover;
        }


        .photos a img:hover,
        .photos video:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

    }

    @media (min-width: 450px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 15px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 170px;
            display: block;
            height: 270px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 330px !important;
            width: 405px !important;
            object-fit: cover;
        }


        .photos a img:hover,
        .photos video:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

    }

    @media (min-width: 460px) {

        .photos video {
            max-height: 330px !important;
            width: 415px !important;
            object-fit: cover;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 20px;
            /* Adjust this value as needed */

        }


    }

    @media (min-width: 480px) {

        .photos video {
            max-height: 330px !important;
            width: 420px !important;
            object-fit: cover;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 25px;
            /* Adjust this value as needed */

        }


    }

    @media (min-width: 490px) {

        .photos video {
            max-height: 330px !important;
            width: 430px !important;
            object-fit: cover;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 30px;
            /* Adjust this value as needed */

        }


    }

    @media (min-width: 500px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 28px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 170px;
            display: block;
            height: 270px !important;
            object-fit: cover;
        }

        .photos video {
            max-height: 400px !important;
            width: 430px !important;
            object-fit: cover;
        }


        .photos a img:hover,
        .photos video:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

    }

    @media (min-width: 520px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 100%;
            display: block;
            height: 100%;
            object-fit: cover;
        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 200px;
            display: block;
            height: 300px !important;
            object-fit: cover;
        }

        .photos video {
            min-height: 350px !important;
            width: 470px !important;
            object-fit: cover;
        }

    }

    @media (min-width: 540px) and (max-width: 609px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 100%;
            display: block;
            height: 100%;
            object-fit: cover;
        }

        .header__wrapper .cols__container .right__col .photos img,
        .header__wrapper .cols__container .right__col .photos video {
            padding: 38px;
            /* Adjust this value as needed */

        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 200px;
            display: block;
            height: 300px !important;
            object-fit: cover;
        }

        .photos video {
            min-height: 390px !important;
            width: 500px !important;
            object-fit: cover;
        }
    }

    @media (min-width: 610px) {
        .header__wrapper .cols__container .right__col .photos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 20px;
        }

        .header__wrapper .cols__container .right__col .photos img {
            max-width: 100%;
            display: block;
            height: 100%;
            object-fit: cover;
        }

        .photos video {
            min-height: 300px !important;

        }

    }

    @media (min-width: 868px) {
        .header__wrapper .cols__container {
            max-width: 1200px;
            margin: 0 auto;
            width: 90%;
            justify-content: space-between;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 50px;
        }

        .header__wrapper .cols__container .left__col {
            padding: 25px 0px;
        }

        .header__wrapper .cols__container .right__col nav ul {
            flex-direction: row;
            gap: 30px;
        }

        .header__wrapper .cols__container .right__col .photos {
            height: 365px;
            overflow: auto;
            padding: 0 0 30px;
        }
    }

    @media (min-width: 1017px) {
        .header__wrapper .cols__container .left__col {
            margin: 0;
            margin-right: auto;
        }

        .header__wrapper .cols__container .right__col nav {
            flex-direction: row;
        }

        .header__wrapper .cols__container .right__col nav button {
            margin-top: 0;
        }
    }

    .photos img,
    .photos video {
        width: 200px;
        height: 250px !important;
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        /* Adjust as needed */
    }

    .photos video {
        height: 300px;
        object-fit: cover;
    }

    .photos a img:hover,
    .photos video:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        border-radius: 15px;
    }

    /* Add this CSS to your existing stylesheet or inside a <style> tag in the head */
    .order-button {
        background-color: #ff7f50;
        /* Custom background color */
        border: none;
        /* Remove default border */
        padding: 10px 20px;
        /* Add padding for size */
        border-radius: 25px;
        /* Round the corners */
        color: #fff;
        /* Text color */
        font-size: 16px;
        /* Font size */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .order-button:hover {
        background-color: #ff6347;
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .custom-flex-container {
        display: flex;
        justify-content: space-between;
    }


    .custom-flex-container a,
    .custom-flex-container button {
        margin: 0 5px;

    }

    .back-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 30px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .back-button:hover {
        background-color: #007bff;
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .modal {
        /* margin-top: -10%; */
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Style the form container */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
    }

    /* Style the input fields */
    input[type=text],
    input[type=email],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    /* Style the submit button */
    button[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    /* Add a hover effect to the submit button */
    button[type=submit]:hover {
        background-color: #45a049;
    }

    /* Add a red border color to invalid input fields */
    input:invalid {
        border-color: red;
    }


    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

    .alert-success strong {
        font-weight: bold;
    }

    .alert-success .btn-close {
        color: #155724;
        background-color: transparent;
        border: none;
        float: right;
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1;
        opacity: .5;
        margin-left: 10px;
    }

    .alert-success .btn-close:hover {
        color: #155724;
        opacity: 1;
    }

    .alert-success.fade.show {
        opacity: 1;
        transition: opacity 0.15s linear;
    }
</style>

<body>
    <div class="header__wrapper">
        <header></header>
        <div class="cols__container">
            <div class="left__col">
                <div class="img__container">
                    <a href="{{ asset('storage/' . $girls->profile_photo) }}" target="_blank">
                        <img src="{{ asset('storage/' . $girls->profile_photo) }}" class=""
                            style="border-radius: 50%;">
                    </a>
                    @if ($girls->status == 'on')
                        <span style="background: #2afa6a;"></span>
                    @else
                        <span style="background: #ff0000;"></span>
                    @endif
                </div>

                <h2>{{ $girls->name }}</h2>
                <p style="font-weight: bold;color: black;margin-top: 3%;">
                    @foreach ($countrys as $country)
                        @if ($country->id == $girls->country)
                            {{ $country->country }}
                        @endif
                    @endforeach
                </p>
                <p style="color: black;margin-top: 3%;">{{ $girls->age }}</p>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <ul class="about">
                    <li style="margin: 10px;"><span>{{ __('messages.type') }}</span>{{ $girls->type }}</li>
                    <li style="margin: 10px;"><span>{{ __('messages.height') }}</span>{{ $girls->height }}</li>
                    <li style="margin: 10px;"><span>{{ __('messages.get service') }}</span>{{ $girls->get_service }}
                    </li>
                </ul>

                <div class="content">
                    <p>
                        {{ $girls->description }}
                    </p>

                    <ul>
                        <li><i class="fa-solid fa-ghost"></i></li>
                        <i class="fa-solid fa-ghost"></i>
                        <i class="fa-solid fa-ghost"></i>
                        <i class="fa-solid fa-ghost"></i>
                    </ul>
                </div>
            </div>
            <div class="right__col">
                <nav>
                    <ul>
                        @foreach ($girls->time_prices as $time)
                            <li>{{ __('messages.time') }} : {{ $time->time }} -
                                {{ __('messages.price') }} : {{ $time->price }} THB</li>
                        @endforeach
                    </ul>
                    {{-- <button>Follow</button> --}}
                </nav>

                <div class="photos">
                    <a href="{{ asset('storage/' . $girls->description_photo_one) }}" target="_blank">
                        <img src="{{ asset('storage/' . $girls->description_photo_one) }}" class="rounded-2">
                    </a>
                    <a href="{{ asset('storage/' . $girls->description_photo_two) }}" target="_blank">
                        <img src="{{ asset('storage/' . $girls->description_photo_two) }}" class="rounded-2">
                    </a>
                    <a href="{{ asset('storage/' . $girls->description_photo_three) }}" target="_blank">
                        <img src="{{ asset('storage/' . $girls->description_photo_three) }}" class="rounded-2">
                    </a>
                    <a href="{{ asset('storage/' . $girls->description_photo_four) }}" target="_blank">
                        <img src="{{ asset('storage/' . $girls->description_photo_four) }}" class=" rounded-2">
                    </a>
                    <video controls>
                        <source src="{{ asset('storage/' . $girls->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>


            </div>

            <div class="mt-5 custom-flex-container" style="margin-top: 10%;margin-bottom: 10%;">
                <a href="{{ url('/index') }}" class="btn btn-primary back-button">
                    <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
                </a>
                @if ($girls->status == 'on')
                    <button type="button" class="btn btn-primary order-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" id="openModal">
                        {{ __('messages.click to order') }}
                    </button>
                @endif
            </div>


            <div id="modal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <h2>Order Form</h2>
                    <form id="orderForm" action="{{ route('order#orderCreate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $countries->country }}" name="country">
                        <input type="hidden" name="girl_id" value="{{ $girls->id }}">
                        <input type="hidden" name="girl_name" value="{{ $girls->name }}">

                        <label for="name">{{ __('messages.name') }}:</label>
                        <input type="text" id="customer_name" name="customer_name" placeholder="Enter Your Name"
                            required><br><br>
                        <label for="email">{{ __('messages.phone number') }}</label>
                        <input type="text" id="phone_number" name="phone_number"
                            placeholder="Enter Your Phone Number" required><br><br>
                        <label for=""> {{ __('messages.please sselect duration time') }} </label>

                        @foreach ($times as $time)
                            <br>
                            <div>

                                @php
                                    $displayTime = $time->time === 'night' ? 'night' : $time->time;
                                    $saveTime = $time->time === 'night' ? '8:00' : $time->time;
                                @endphp
                                <input type="radio" name="option"
                                    value="{{ $saveTime }}_{{ $time->price }}"
                                    data-values='{"first": "{{ $saveTime }}", "second": "{{ $time->price }}"}'>
                                {{ $displayTime }} - {{ $time->price }} THB

                            </div>
                        @endforeach
                        <input type="hidden" id="hidden_first_value" name="time">
                        <input type="hidden" id="hidden_second_value" name="price">
                        <input type="hidden" name="girl_commission" value="{{ $girls->girl_commission }}">
                        <button style="margin-top: 5%;" type="submit">Submit</button>
                    </form>
                    {{-- <button id="closeModal">Close Modal</button> --}}
                </div>
            </div>
        </div>





    </div>
</body>

</html>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Bootstrap JS dependencies (jQuery and Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- <script>
    function refreshCaptcha() {
        var captcha = document.getElementById('captcha_img');
        captcha.src = '{{ captcha_src() }}' + Math.random();
    }
</script> --}}
<script>
    document.querySelectorAll('input[type=radio][name=option]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            let selectedValues = JSON.parse(this.getAttribute('data-values'));
            document.getElementById('hidden_first_value').value = selectedValues.first;
            document.getElementById('hidden_second_value').value = selectedValues.second;
        });
    });
</script>
<script>
    // Get the modal and the button that opens it
    var modal = document.getElementById("modal");
    var openModalBtn = document.getElementById("openModal");
    var closeModalBtn = document.getElementById("closeModal");

    // When the user clicks the button, open the modal
    openModalBtn.addEventListener("click", function() {
        modal.style.display = "block";
    });

    // When the user clicks on the close button or outside the modal, close it
    closeModalBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
</script>
