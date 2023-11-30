<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('bootstrap-cdn.css')
</head>
<body>
   
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    @if (Session::has('success'))
                                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                        {{Session::get('success')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif


                                    @if (Session::has('fail'))
                                    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                        {{Session::get('fail')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif
                                    <form class="user" action="{{url('login-student')}}" method="GET">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                name="email"
                                                placeholder="Enter Email Address..." value="{{old('email')}}">
                                                <span class="text-danger">
                                                    @error('email')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="mt-2 form-control form-control-user"
                                            name="password"
                                                id="exampleInputPassword" placeholder="Password" value="{{old('password')}}">
                                                <span class="text-danger">
                                                    @error('password')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                        </div>
                                        <div class="check d-flex mt-5 justify-content-between">
                                            <button type="submit" class="btn btn-primary ">Login</button>
                                            <div class="form-group mt-1">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{url('reg')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @include('bootstrap-cdn.js')
</body>
</html>
