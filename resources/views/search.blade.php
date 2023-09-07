@extends('layouts.site')





@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('sections.category')
                </div>
                <div class="col-lg-9">
                    @include('sections.searchs')
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('allStyle/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Search</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            {{-- CHEGIRMADAGI MAHSULOTLAR --}}
            <div class="row">
                <div class="col-lg-12 col-md-7">
                   
                    {{-- BARCHA MAHSULOTLAR --}}
                    <div class="section-title product__discount__title mt-5">
                        <h2>Qidiruv natijalari</h2><br><br>
                        @if(count($products) > 0)
                        <h2 class="news__title"><span>{{ $key }}</span> so'zi bo'yicha qidiruv natijalar:  <b>{{ count($products) }}</b></h2>
                        @else
                        {{-- <img class="error_img" src="/img/404-error.jpg" alt="404" width="20px">  --}}
                        <h1 class="error">Kechirasiz, xatolik yuz berdi,  <span>{{ $key }}</span>  Sahifasi <br> topilmadi</h1>
                        {{-- <button type="button" class="btn load-more-btn"><a href="{{ route('index') }}" class="error_btn">@lang('words.home')</a></button> --}}
                        @endif
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ asset('Products/image/' . explode('|', $product->multi_img)[0]) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="javascript:void(0);"
                                                    onclick="showImageOverlay('{{ asset('Products/image/' . explode('|', $product->multi_img)[0]) }}')"><i
                                                        class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a
                                                href="{{ route('shopDetails', $product->slug) }}">{{ $product->title_uz }}</a>
                                        </h6>
                                        <h5>{{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    


@endsection
