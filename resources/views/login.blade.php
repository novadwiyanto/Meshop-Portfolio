<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <style>
        #dumy {
            position: fixed;
            top: 5%;
            left: 3%;
            /* transform: translate(-50%, -50%); */
            z-index: 100;
        }
    </style>
    <!-- Content Row -->
    <div id="dumy" class="p-1">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">admin@example.com - rahasia</li>
                <li class="list-group-item">user1@example.com - rahasia</li>
                <li class="list-group-item">user2@example.com - rahasia</li>
            </ul>
        </div>
    </div>
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="login card w-auto px-5">
            <div class="container text-center">
                <h4 class="fw-bold">Login</h4>
                <hr>
                <form method="POST" action="">
                    @csrf
                    <div class="did-floating-label-content">
                        <input type="text" name="email" class="did-floating-input" placeholder="" />
                        <label class="did-floating-label">Email</label>
                    </div>
                    <div class="did-floating-label-content">
                        <input type="password" name="password" class="did-floating-input" placeholder="" />
                        <label class="did-floating-label">password</label>
                    </div>
                    @error('*')
                        <small>
                            <p class="error text-danger">{{ $message }}</p>
                        </small>
                    @enderror
                    <button class="btn btn-outline-light btn-lg px-5">Login</button>
                </form>
            </div>
        </div>
    </div>



</body>
<style>
    html,
    body {
        height: 100%;
        background-image: url({{ asset('login-background.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
    }

    .login {
        background: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        border-style: solid;
        border-color: rgb(120, 120, 120);
    }

    .container {
        width: 300px;
        padding: 20px;
        margin: 0 auto;
        font-family: 'Inter', sans-serif;
    }

    .did-floating-label-content {
        position: relative;
        margin-bottom: 20px;
    }

    .did-floating-label {
        color: #ffffff;
        font-size: 13px;
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: 15px;
        top: 11px;
        padding: 0 5px;
        background: transparent;
        transition: 0.2s ease all;
        -moz-transition: 0.2s ease all;
        -webkit-transition: 0.2s ease all;
    }

    .did-floating-input,
    .did-floating-select {
        font-size: 15px;
        display: block;
        width: 100%;
        height: 36px;
        padding: 0 20px;
        background: transparent;
        color: #ffffff;
        /* border: 1px solid #000000; */
        border-radius: 4px;
        box-sizing: border-box;

        &:focus {
            outline: none;

            ~.did-floating-label {
                /* top: -8px; */
                font-size: 0px;
            }
        }
    }



    .did-floating-input:not(:placeholder-shown)~.did-floating-label {
        /* top: -8px; */
        font-size: 0px;
    }
</style>

</html>
