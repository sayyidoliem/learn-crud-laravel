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

    <header>
        {{-- <span>Welcome, {{$user -> name}}</span> --}}
        <a href="{{url('logout')}}">LogOut</a>
    </header>
    <div class="container">

        <h2 class="text-center mt-5">Data Orang Lain</h2>

        @if (Session::has('success'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (Session::has('deleted'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('deleted')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i>  Tambah Data
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

            <form action="{{url ('input')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Umur</label>
                        <input type="number" class="form-control" name="umur" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">No telp</label>
                        <input type="tel" name="telp" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>



      </div>
    </div>
  </div>

        <table class="table my-4">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php
                $no = 1
            @endphp
            <tbody>
                @foreach ($data as $d)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>{{$d -> name}}</td>
                        <td>{{$d -> age}}</td>
                        <td>{{$d -> alamat}}</td>
                        <td>{{$d -> phone_number}}</td>
                        <td>
                            <a href="{{url('update/'.$d -> id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('delete/'.$d -> id)}}" class="btn btn-danger" onclick = "return btndelete()">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
         function btndelete() {
        return confirm("Apakah Anda ingin menghapus data?")
      }
    </script>
    @include('bootstrap-cdn.js')
</body>
</html>
