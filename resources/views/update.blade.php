d<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=#, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>#</title>
    @include('bootstrap-cdn.css')
</head>
<body>
    <div class="container p-5">
        <h2 class="text-center">Form Edit</h2>
        <form action="{{url("updateAction/".$data -> id )}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{$data -> name}}">
            </div>
            <div class="mb-3">
                <label for="age">Umur</label>
                <input type="number" name="age" class="form-control" value="{{$data -> age}}">
            </div>
            <div class="mb-3">
                <label for="address">Alamat</label>
                <input type="text" name="address" class="form-control" value="{{$data -> alamat}}">
            </div>
            <div class="mb-3">
                <label for="nama">Nomor telepon</label>
                <input type="text" name="phone" class="form-control" value="{{$data -> phone_number}}">
            </div>
            <a href="{{url("/")}}" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</body>
</html>
