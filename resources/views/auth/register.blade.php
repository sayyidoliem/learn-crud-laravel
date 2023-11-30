<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @include('bootstrap-cdn.css')

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center flex-column min-vh-100">
                <div class="box p-5">
                    <h2>Register</h2>
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
                   <form action="{{url('register-student')}}" class="mt-2" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="">
                        <span class="text-danger">
                            @error('nama')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="" class="form-control">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="">
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </div>
                   </form>
                </div>

            </div>
        </div>
    </div>

    @include('bootstrap-cdn.js')
</body>
<style>
    .box{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>
</html>
