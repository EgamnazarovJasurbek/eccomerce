@extends('layouts.site')

@section('title', 'Category Products')

<style>
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #7fad39 !important;
        border-color: #7fad39 !important;
        color: #fff;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: black !important;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .product__item__pic__hover li a {
        padding: 10px;
    }
</style>

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('sections.category')

                </div>
                <div class="col-lg-9">
                    @include('sections.search')
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
                        <h2>category Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            {{-- Chegirmadagi Mahsulotlar --}}
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row mb-5">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($saleProducts as $sale)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="/Products/image/{{ explode('|', $sale->multi_img)[0] }}">
                                                <div class="product__discount__percent">-20%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="javascript:void(0);"
                                                            onclick="showImageOverlay('{{ asset('Products/image/' . explode('|', $sale->multi_img)[0]) }}')"><i
                                                                class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>Dried Fruit</span>
                                                <h5><a
                                                        href="{{ route('shopDetails', $sale->slug) }}">{{ $sale->title_uz }}</a>
                                                </h5>
                                                <div class="product__item__price">{{ $sale->price }} Uzs
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Categoryga oid productlar --}}
                    <div class="section-title product__discount__title mt-5">
                        <h2>Categoryga oid Productlar</h2>
                    </div>
                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="/Products/image/{{ explode('|', $product->multi_img)[0] }}">
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
                                        <h5>${{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <script>
        function showImageOverlay(imageSrc) {
            var overlay = document.createElement('div');
            overlay.id = 'imageOverlay';
            overlay.style.position = 'fixed';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            overlay.style.display = 'flex';
            overlay.style.justifyContent = 'center';
            overlay.style.alignItems = 'center';
            overlay.style.zIndex = '9999';

            var image = document.createElement('img');
            image.src = imageSrc;
            image.style.maxWidth = '90%';
            image.style.maxHeight = '90%';

            overlay.appendChild(image);
            document.body.appendChild(overlay);

            overlay.addEventListener('click', function() {
                document.body.removeChild(overlay);
            });
        }
    </script>

@endsection
