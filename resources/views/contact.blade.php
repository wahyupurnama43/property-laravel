@extends('layouts.home')
@section('tittle') Detail | Property Bali @endsection
@push('add-css')  
    <style>
        /* contact us */
        .contact-us{
            margin-top:7rem;
        }
            .maps iframe{
                width: 100%;
                border-radius: 8px;
                box-shadow: 5px 4px 25px rgba(159, 159, 159, 0.25);
            }
            .text-about h1{
                font-weight: normal;
                font-size: 24px;
                line-height: 36px;
                color: #0C0D36;
                margin-bottom: 0;
            }
            .text-about p{
                color: #8d8a8d;
                margin-bottom: 30px;
            }
            .info-me{
                display: flex;
            }
            .info-me ul{
                list-style: none;
                margin: 0;
                padding:0;
                padding-right: 20px;
            }

            .info-me ul li.judul{
                color: #8B8BA5;
            }

            .info-me ul li.info{
                font-weight: normal;
    line-height: 36px;
    color: #0C0D36;
    margin-bottom: 0;
            }
            .send-message .judul{
                margin-top: 2rem;
               font-weight: normal;
                font-size: 18px;
                line-height: 36px;
                color: #0C0D36;
                margin-bottom: 0;
                margin-bottom: 20px;
            }


            .form-row .form-group {
                padding: 15px 15px 0;
                align-self: flex-end;
            }

            .form-group {
                position: relative;
                padding-top: 15px;
            }

            .form-control {
                border: 0;
                border-radius: 0;
                padding: 10px 10px;
                background-color: transparent;
                position: relative;
                z-index: 2;
                font-size: 0.9rem;
            }
            .form-control:not(textarea) {
                height: 44px;
            }
            .form-control + label {
                position: absolute;
                z-index: 1;
                top: 25px;
                margin: 0;
                transition: all 0.2s ease-in-out;
                pointer-events: none;
                left: 0px;
                right: 10px;
            }
            .form-control:focus {
                box-shadow: none;
                background-color: transparent;
            }
            .form-control:focus + label {
                color: #8B8BA5;
            }
            .form-control:focus + label, .form-control.has-value + label {
                font-size: 0.75rem;
                top: 0;
            }

            .no-js .form-control + label {
                font-size: 0.75rem;
                top: 0;
            }

            .form-row .form-control + label {
                left: 25px;
                right: 25px;
            }
            .form-row .line {
                left: 15px;
                right: 15px;
            }

            .line {
                position: absolute;
                display: block;
                bottom: 0;
                left: 0;
                right: 0;
                height: 2px;
                background-color: #ECECEC;
                width: 100%;
            }
            .line:after {
                content: "";
                height: 2px;
                position: absolute;
                display: block;
                background: #ECECEC;
                left: 0;
                right: 0;
                transform: scaleX(0);
                transition: transform 0.2s ease-in-out;
                transform-origin: 0 0;
            }

            .form-control:focus ~ .line:after {
                transform: scaleX(1);
            }

            select.form-control:not([size]):not([multiple]) {
                height: 44px;
            }
    </style>
@endpush
@section('content')
    <!-- page content -->
    <div class="container contact-us">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="maps "  data-aos="zoom-in" data-aos-delay="300">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.6700902955663!2d115.1855125294738!3d-8.627636154913459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd238cb71a1cc69%3A0x1d0acceaea3e3b0f!2sGg.%20Lempuyang%20No.5%2C%20Padangsambian%20Kaja%2C%20Kec.%20Denpasar%20Bar.%2C%20Kota%20Denpasar%2C%20Bali%2080117!5e0!3m2!1sid!2sid!4v1614058844620!5m2!1sid!2sid"
                            width="600"
                            height="450"
                            style="border: 0;"
                            allowfullscreen=""
                            loading="lazy"
                        ></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="text-about">
                        <h1  data-aos="zoom-in-down" data-aos-delay="300">
                            Contact us
                        </h1>
                        <p data-aos="zoom-in-down" data-aos-delay="400">
                            contact us if you want to work together
                        </p>

                        <div class="info-me">
                            <ul data-aos="zoom-in-down" data-aos-delay="500">
                                <li class="judul">Address</li>
                                <li class="info">Denpasar - bali</li>
                            </ul>
                            <ul data-aos="zoom-in-down" data-aos-delay="600">
                                <li class="judul">Email</li>
                                <li class="info">PrppertyBali@gmail.com</li>
                            </ul>
                            <ul data-aos="zoom-in-down" data-aos-delay="700">
                                <li class="judul">Phone</li>
                                <li class="info">+62 9086187262</li>
                            </ul>
                        </div>
                    </div>

                    <div class="send-message">
                        <div class="judul" data-aos="zoom-in-down" data-aos-delay="800">Send Message</div>
                        <form>
                            <div class="form-group" data-aos="zoom-in-down" data-aos-delay="900">
                                <input type="text" class="form-control" id="inputNama" />
                                <label for="inputNama">Nama</label>
                                <div class="line"></div>
                            </div>
                            <div class="form-group" data-aos="zoom-in-down" data-aos-delay="1000">
                                <input type="email" class="form-control" id="inputEmail4" />
                                <label for="inputEmail4">Email</label>
                                <div class="line"></div>
                            </div>
                            <div class="form-group" data-aos="zoom-in-down" data-aos-delay="1100">
                                <textarea class="form-control" rows="2"></textarea>
                                <label>Message</label>
                                <div class="line"></div>
                            </div>
                            <div class="tombol text-right" data-aos="zoom-in-down" data-aos-delay="1100">
                                <button class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
