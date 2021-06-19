@extends('layouts.admin')
@section('title') Tambah Product | Property Bali @endsection
@push('add-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css">
@endpush
@section('content')
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Product</h2>
            <p class="dashboard-subtitle">Create your own product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group" >
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group" >
                            <label>Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group" >
                            <label>Kategori</label>
                            <select class="select2 form-control" name="categoris_id">
                                <option value="" selected disabled>~ Pilih Kategori ~</option>
                                @foreach ($categori as $ct)
                                    <option value="{{ $ct->id }}"> {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group" >
                            <label>Description</label>
                            <textarea id="editor" name="deskripsi" rows="8" cols="80"></textarea>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group" >
                            <label>Thumbnails</label>
                            <input type="file" class="form-control" name="photo[]" multiple>
                            <p class="text-muted">Bisa Menambahkan Gambar Lebih Dari 1</p>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <button type="submit" class="btn btn-success w-100" id="submit">
                            Save Now
                        </button>
                        </div>

                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
@endsection
@section('add-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script>
        CKEDITOR.replace('editor');
        $(document).ready(function() {
            $('.select2').select2();
        });

        
    </script>
@endsection