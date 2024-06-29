<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Date Girl</title>
    @laravelPWA
    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/avatars/pink_logo.png') }}">
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet">
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('welcome/css/styles.css') }}" rel="stylesheet" />
</head>
<style>
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
        width: 80%;
    }

    .center h1 {
        color: rgba(255, 0, 0, 0.1);
        font-size: 50px;
        text-transform: uppercase;
        font-weight: 500;
        background-size: cover;
        background-image: url(https://img.freepik.com/free-photo/vivid-blurred-colorful-wallpaper-background_58702-2430.jpg);
        -webkit-background-clip: text;
        animation: background-text-animation 30s linear infinite, text-color-animation 10s linear infinite;
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

    .navbar {
        height: 15%;
    }

    .masthead {
        height: 100vh;
        min-height: 600px;
        /* background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.7) 75%, rgba(0, 0, 0, 0.7) 100%), url('path/to/your/image.jpg'); */
        background-position: center;
        background-size: cover;
    }

    .masthead .container {
        height: 100%;
    }

    .masthead h1 {
        font-size: 2.5rem;
    }

    .masthead .btn {
        margin-top: 20px;
    }

    footer {
        background: #f8f9fa;
    }

    @media (min-width: 768px) {
        .masthead h1 {
            font-size: 3.5rem;
        }
    }

    @media (min-width: 1200px) {
        .masthead h1 {
            font-size: 4.5rem;
        }
    }
</style>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="height: 15%;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"></a>
            <div class="center" style="width: 80%;">
                <marquee>
                    <h1 style="color: rgba(242, 71, 185, 0.647); font-family: 'Signika Negative', sans-serif;">Welcome
                        From
                        Pink Website!</h1>
                </marquee>
            </div>
            {{-- <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> --}}
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about"></a></li>
                    <li class="nav-item"><a class="nav-link" href="#services"></a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio"></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact"></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold"
                        style="font-family: 'Signika Negative', sans-serif; text-shadow: 2px 2px 0 rgb(216, 96, 116), 4px 4px 0 #777;">
                        Welcome Date Girl Website!</h1>

                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <!-- <p class="text-white-75 mb-5">Welcome Date Girl Website!</p> -->
                    <a class="btn btn-primary btn-xl" href="{{ url('index') }}">Join Now</a>
                </div>
            </div>
        </div>
    </header>

    <footer class="py-5 text-white" style="background-color: pink">
        <div class="container px-4 px-lg-5">
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-info text-white" id="installBtn">Download App</button>
            </div>
            <div class="small text-center text-muted mt-3">Copyright &copy; PINK WEBSITE</div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('welcome/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script>
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent the mini-infobar from appearing on mobile
            e.preventDefault();
            // Stash the event so it can be triggered later.
            deferredPrompt = e;
            // Update UI to notify the user they can install the PWA
            document.getElementById('installBtn').style.display = 'block';
        });

        document.getElementById('installBtn').addEventListener('click', async () => {
            // Show the install prompt
            if (deferredPrompt) {
                deferredPrompt.prompt();
                // Wait for the user to respond to the prompt
                const {
                    outcome
                } = await deferredPrompt.userChoice;
                console.log(`User response to the install prompt: ${outcome}`);
                // We've used the prompt, and can't use it again, throw it away
                deferredPrompt = null;
                // Hide the button after the prompt
                document.getElementById('installBtn').style.display = 'none';
            }
        });
    </script>
</body>

</html>
