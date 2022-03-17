@extends('adminlte::page')

@section('title','Data Kategori')

@section('content_header')


@endsection



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts._flash')
                   <b>Data Kategori</b>
                    <a href="{{route('kategori.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Kategori</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                        <thead>
                            <tr>
                                <th><i>Id</i></th>
                                <th><i>Kategori</i></th>
                                <th><i>Nama Barang</i></th>
                                <th><i>Alamat</i></th>
                                <th><i>No Telp</i></th>
                                <th><i>Aksi</i></th>
                            </tr>
                        </thead>
                            @php $no=1; @endphp
                            @foreach ($kategori as $data)
                            <tbody>
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->kategori}}</td>
                                 <td>{{$data->nama_barang}}</td>
                                 <td>{{$data->alamat}}</td>
                                 <td>{{$data->no_wa}}</td>



                                 <td>
                                     <form action="{{route('kategori.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('kategori.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <button type="submit" class="btn btn-outline-danger delete-confirm" >HAPUS</button>
                                        </form>
                                 </td>
                             </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
@endsection

@section('js')
 <script src="{{asset('DataTables/datatables.min.js')}}"></>
 <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
@endsection
