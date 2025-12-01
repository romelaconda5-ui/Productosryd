@extends('frontend.layouts.master')

@section('title','Exquisitos RYD || Sobre Nosotros')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Inicio<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{route('about-us')}}">Sobre Nosotros</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp
                        <h3>Bienvenido a <span>Exquisitos RYD</span></h3>
                        <p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
                        <div class="button">
                            <a href="{{route('blog')}}" class="btn">Nuestro Blog</a>
                            <a href="{{route('contact')}}" class="btn primary">Contáctanos</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
    <div class="about-img overlay">
        <img src="{{ asset('storage/photos/1/empresa.png') }}" alt="empresa" class="img-fluid w-100">
    </div>
</div>

            </div>
        </div>
    </section>
    <!-- End About Us -->

    <!-- Start Shop Services Area -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Envío Gratis</h4>
                        <p>Pedidos superiores a $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Devolución Gratis</h4>
                        <p>Devoluciones dentro de 30 días</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Pago Seguro</h4>
                        <p>100% seguro</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Mejor Precio</h4>
                        <p>Precio garantizado</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    @include('frontend.layouts.newsletter')
@endsection
