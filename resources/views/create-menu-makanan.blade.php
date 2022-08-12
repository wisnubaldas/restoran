@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Toastr', true)

@section('content_header')


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Menu Makanan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ url('tambah_menu') }}">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Makanan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Makanan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>
                    <input type="text" class="form-control" id="category" name="kategori" placeholder="Category">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Discount</label>
                    <input type="text" class="form-control" id="discount" name="Discount" placeholder="%">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="gambar">
                            <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="Desdripsi Menu Makanan"></textarea>
                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



@endsection
