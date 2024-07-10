@extends('app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 40%">
            <div class="card-header">
              Form Tambah Buku Tamu
            </div>
            <div class="card-body">
                <form action="{{url('admin/simpan-data')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" name="telepon" id="telepon" aria-describedby="telepon">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>                        
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
                      </div>
            
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
            </div>
          </div>
    </div>
@endsection