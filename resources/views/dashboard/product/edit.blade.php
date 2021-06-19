@extends('layouts.admin')
@section('title') Tambah Product | Property Bali @endsection
@push('add-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css">
@endpush
@section('content')
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit Product</h2>
            <p class="dashboard-subtitle">Edit your own product</p>
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

                <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group" >
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group" >
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group" >
                            <label>Kategori</label>
                            <select class="select2 form-control" name="categoris_id">
                                <option value="" selected disabled>~ Pilih Kategori ~</option>
                                @foreach ($categori as $ct)
                                    <option value="{{ $ct->id }}" {{ ( $ct->id == $product->categoris_id) ? 'selected' : '' }}> {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group" >
                            <label>Description</label>
                            <textarea id="editor" name="deskripsi" rows="8" cols="80">
                                {!! $product->deskripsi !!}
                            </textarea>
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
                    <div class="row mx-2">
                        @foreach ($product->galleries as $gambar)
                            <div class="col-lg-12 my-2 d-flex justify-content-between content-center align-center">
                                <img src="{{ Storage::url($gambar->photo) }}" alt="" style="width: 200px; height:auto;" class="shadow">
                                <div class="my-auto ">
                                    <a href="{{ route('product_gallery.delete', $gambar->id) }}" class="btn btn-danger w-20 " id="hapus_gambar" data-id="{{ $gambar->id }}"  onclick="return confirm('Apakah Kamu Yakin?')">Hapus</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-success w-100 ">
                                Save
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

        $('#hapus_gambar').addEventListener('click', function(e){
            if(!confirm("Do you really want to do this?")) {
                return false;
            }

            e.preventDefault();
            var id = $(this).data("id");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;

            $.ajax(
                {
                url: url.href, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {
                    _token: token,
                        id: id
                },
                success: function (response){

                    $("#success").html(response.message)

                    Swal.fire(
                    'Remind!',
                    'Company deleted successfully!',
                    'success'
                    )
                }
            });
            return false;
        });
            
        
    </script>
@endsection