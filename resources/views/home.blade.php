@extends('layouts.home')

@section('content')
    <!-- page content -->
    <div class="page-content page-home">
        <section class="store-carousel">
        <div class="container">
            <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
                <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                    <li data-target="#storeCarousel" data-slide-to="1"></li>
                    <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="/images/banner.jpg" alt="" class="d-block w-100" style="height: 80vh;">
                    </div>
                    <div class="carousel-item ">
                    <img src="/images/banner-2.jpg" alt="" class="d-block w-100" style="height: 80vh;">
                    </div>
                    <div class="carousel-item ">
                    <img src="/images/banner-3.jpg" alt="" class="d-block w-100" style="height: 80vh;">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <div class="container my-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="search">Search</label>
                    <input type="text" id="search" class="form-control" name="search" value="Rumah Minimalis">
                    </div>
                </div> <!--  end col-md-6 -->
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="province">Kategori</label>
                    <select class="form-control" name="province" id="province">
                        <option value="">Pilih Kategori</option>
                        <option value="rumah">Rumah</option>
                        <option value="villa">Villa</option>
                        <option value="hotel">Hotel</option>
                    </select>
                    </div>
                </div> <!--  end col-md-4 -->
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="province">Harga</label>
                    <select class="form-control" name="province" id="province">
                        <option value="">Pilih Harga</option>
                        <option value="100.000.000"> > Rp 100.000.000</option>
                        <option value="300.000.000"> < Rp 300.000.000</option>
                        <option value="500.000.000"> < Rp 500.000.000</option>
                    </select>
                    </div>
                </div> <!--  end col-md-4 --> 
                <div class="col-md-2 mt-2">
                    <button class="btn btn-success mt-4 px-4 btn-block">Search</button>
                </div> <!--  end col-md-4 -->

            </div>
        </div>


        <section class="store-new-products">
        <div class="container">
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>New Products</h5>
            </div>
            </div>

            <div class="row">
                @foreach ($productNew as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="background-image: url('{{ ($product->gallery) ? Storage::url(optional($product->gallery->first())->photo) : 'kosong'}}');">
                            </div>
                        </div>
                        <div class="products-text">
                            {{ $product->name }}
                        </div>
                        <div class="products-price">
                            Rp. {{ $product->price }}
                        </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
        </section>
    </div>
@endsection
