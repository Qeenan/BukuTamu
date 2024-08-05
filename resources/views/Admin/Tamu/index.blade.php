@extends('app')
@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="card">
    <div class="card-header">
      All Users 
      {{-- <a href="{{url('admin/form-tambah')}}" class="btn btn-success">Tambah Data</a> --}}
      <a href="{{url('export')}}" class="btn btn-success">Export To Excel</a>
    </div>
    <div class="card-body">
        <table class="table" id="myTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col" style="width: 3%">No</th>
                <th scope="col">Nama</th>
                <th scope="col" style="width: 5%">Telepon</th>
                <th scope="col">Keperluan</th>
                <th scope="col" style="width: 15%">Email</th>
                <th scope="col" style="width: 5%">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->tlp}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                          <div class="row">
                            <div class="col-4">
                              <a href="{{url('admin/form-edit', $item->id)}}" class="btn btn-warning">Edit</a>
                            </div>
                            {{-- <div class="col-4">
                              <form action="{{url('admin/hapus-data')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form>
                            </div> --}}
                          </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
  </div>
@endsection

@section('script')
<script>
let table = new DataTable('#myTable');
</script>
@endsection