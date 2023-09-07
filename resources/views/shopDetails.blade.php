@extends('layouts.site')

@section('title', 'Product Detail')


<style>
    .right__title {
        padding-top: 120px;
    }

    .product_categoryName {
        font-size: 18px;
        font-weight: 900;
        color: black;
    }

    .product_categoryName span {
        font-size: 20px;
        font-weight: 500;
        padding-left: 8px;
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
                    @include('sections.searchs')
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/allStyle/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset('Products/image/' . explode('|', $product->multi_img)[0]) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 right__title">
                    <div class="product__details__text">
                        <h3>{{ $product->title_uz }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <form method="GET" action="{{ route('customerOrder', $product->id) }}">
                            @csrf <!-- Add the CSRF token for security -->

                            <div class="product__details__price">${{ $product->price }}</div>
                            <p class="product_categoryName">Category: <span>{{ $product->category->name_uz }}</span></p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="1">
                                        <!-- Add a name attribute for the quantity input -->
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="" class="primary-btn">ADD TO CARD</a> --}}
                            <button type="submit" class="primary-btn border-0 addBasket">ADD TO CART</button>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Description Infomation</h6>
                                    <p>{{ $product->desc_uz }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($otherProducts as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('Products/image/' . explode('|', $item->multi_img)[1]) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="javascript:void(0);"
                                            onclick="showImageOverlay('{{ asset('Products/image/' . explode('|', $item->multi_img)[1]) }}')"><i
                                                class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('shopDetails', $item->slug) }}">{{ $item->title_uz }}</a></h6>
                                <h5>{{ $item->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

        $(document).ready(function() {
            $('.addBasket').on('click', function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Savatga Qo'shildi",
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        });
    </script>
@endsection
