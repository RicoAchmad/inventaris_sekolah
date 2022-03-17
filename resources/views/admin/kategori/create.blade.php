@extends('adminlte::page')

@section('title','Kategori')

@section('content_header')

<br>

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Input Kategori</div>
                <div class="card-body">
                    <form action="{{route('kategori.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                            <label for="">Alamat</label>
                            <textarea id="catatan" name="alamat" class="form-control" rows="1.5" cols="150"></textarea>
                            <label for="">No Telp</label>
                            <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror">
                            @error('nama_Kategori')

                            <span class="invalid-feedbaack" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group right">
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
