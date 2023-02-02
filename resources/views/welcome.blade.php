<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <title>Login</title>

    <!-- <style>
        body {
            background-image: url("{{ asset('img/dost_welcome.png') }}");
            background-repeat: no-repeat;
            background-size: auto;
        }
    </style> -->
</head>

<body>
    <div class="row">
        <!-- {{-- <img src="{{ asset('/img/dostlogo.png') }}" style="width:30%" alt=""> --}} -->
        <br/><br />
        <div class="col-md-5 img">
            <div class="logo">
                 <img src="{{ asset('/img/dostlogo.png') }}">

                 
                    <h1>DOST</h1>
                    <h3>Region X</h3>
                
            </div>
    
        </div>
        <div class="col-md-7 login-field">
            

            <div class="user-input">
                <div class="line">
                    <p><b>User</b> Login</p>
                </div>
               <div class="alert-stay">
                   
               
                @if ($errors->any())
                    <div class="alert alert-danger border-left-danger" role="alert">
                        <ul class="pl-4 my-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger border-left-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
</div>
                <form method="POST" action="{{ route('login_process') }}" class="user">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="">Email</label>
                    <div class="input-group mb-1">
                        <input id="email" type="email"
                            class="form-control rounded-0 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus aria-label="Username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2" style="background-color:transparent;"><i
                                    class="bi bi-person-check-fill"></i></span>
                        </div>
                    </div>

                    <label>Password</label>

                    <div class="input-group mb-3">
                        <input id="password" type="password" required
                            class="form-control rounded-0 @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">
                        <div class="input-group-append">
                            <span class="input-group-text" style="background-color: transparent"
                                onclick="password_show_hide();">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary rounded-0 btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
</body>

</html>