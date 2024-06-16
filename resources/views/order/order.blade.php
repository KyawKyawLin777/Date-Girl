<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style>
    body {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>
<style>
    .description_photo img,
    .video-container video {
        height: 150px;
        width: 150px;
        border-radius: 20%;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .description_photo img:hover,
    .video-container video:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .medium-font {
        font-size: 16px;
        /* Adjust the font size to your preference */
        font-family: 'Arial', sans-serif;
        /* Choose a beautiful font */
    }
</style>
<div class="container emp-profile">
    <form method="post">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <a href="{{ asset('storage/' . $girls->profile_photo) }}" target="_blank">
                        <img src="{{ asset('storage/' . $girls->profile_photo) }}" class=""
                            style="height: 200px; width: 200px; border-radius: 50%;">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head medium-font">
                    <h5>
                        Name : {{ $girls->name }}
                    </h5>
                    <h6>
                        @foreach ($countrys as $country)
                            @if ($country->id == $girls->country)
                                Country : {{ $country->country }}
                            @endif
                        @endforeach
                    </h6>
                    @if ($girls->status == 'off')
                        <h4 style="color: red;">
                            {{-- Note : This girl is busy --}}
                            {{ __('messages.note : this girl is busy') }}
                        </h4>
                    @endif
                    {{-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Timeline</a>
                        </li> --}}
                    </ul>
                </div>
            </div>

            {{-- <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
            </div> --}}
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="profile-work medium-font">

                    <p style="font-size: 100%;">{{ __('messages.desc') }}</p>
                    <div class="">
                        <a href="" style="font-size: 100%;">{{ $girls->description }}</a><br />
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab medium-font" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('messages.age') }}</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $girls->age }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('messages.height') }}</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $girls->height }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('messages.type') }}</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $girls->type }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('messages.get service') }}</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $girls->get_service }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mx-auto mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 mb-3 description_photo">
                        <a href="{{ asset('storage/' . $girls->description_photo_one) }}" target="_blank">
                            <img src="{{ asset('storage/' . $girls->description_photo_one) }}" class="rounded-2">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 description_photo">
                        <a href="{{ asset('storage/' . $girls->description_photo_two) }}" target="_blank">
                            <img src="{{ asset('storage/' . $girls->description_photo_two) }}" class="rounded-2">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 description_photo">
                        <a href="{{ asset('storage/' . $girls->description_photo_three) }}" target="_blank">
                            <img src="{{ asset('storage/' . $girls->description_photo_three) }}" class="rounded-2">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 description_photo">
                        <a href="{{ asset('storage/' . $girls->description_photo_four) }}" target="_blank">
                            <img src="{{ asset('storage/' . $girls->description_photo_four) }}" class=" rounded-2">
                        </a>
                    </div>
                    <div class="col-md-4 video-container">
                        <video controls>
                            <source src="{{ asset('storage/' . $girls->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="row justify-content-center d-flex mt-3">
                    <div class="col-12 text-center" style="color: red;">
                        @foreach ($girls->time_prices as $time)
                            <div class="d-flex justify-content-between">
                                <h5 style="width: 50%;font-weight: bold;">{{ __('messages.time') }} -
                                    {{ $time->time }}</h5>
                                <h5 style="width: 50%;font-weight: bold;">{{ __('messages.price') }} -
                                    {{ $time->price }} THB</h5>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

        <div class="mt-5 d-flex justify-content-between">
            <a href="{{ url('/index') }}" class="btn btn-primary">{{ __('messages.back') }}</a>
            @if ($girls->status == 'on')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{ __('messages.click to order') }}
                </button>
            @endif

        </div>

    </form>


    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('messages.order form') }}
                    </h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <form action="{{ route('order#orderCreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="{{ $countries->country }}" name="country">
                        <input type="hidden" name="girl_id" value="{{ $girls->id }}">
                        <input type="hidden" name="girl_name" value="{{ $girls->name }}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="customer_name" class="">{{ __('messages.name') }}</label>
                                    <input type="text" class="form-control" id="customer_name"
                                        name="customer_name" placeholder="Enter Your Name" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="phone_number"
                                        class="">{{ __('messages.phone number') }}</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="Enter Your Phone Number" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for=""> {{ __('messages.please sselect duration time') }} </label>
                                @foreach ($times as $time)
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
                            </div>


                            <input type="hidden" id="hidden_first_value" name="time">
                            <input type="hidden" id="hidden_second_value" name="price">
                            <input type="hidden" name="girl_commission" value="{{ $girls->girl_commission }}">
                            {{-- <div class="col-12 mt-3">
                                <h6>
                                    {{ __('messages.please confirm you are human') }}
                                </h6>
                                <div class="form-group">
                                    <img src="{{ captcha_src() }}" alt="captcha" id="captcha_img">
                                    <button class="btn btn-info" type="button"
                                        onclick="refreshCaptcha()">Refresh</button>
                                    <input type="text" name="captcha" required>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
