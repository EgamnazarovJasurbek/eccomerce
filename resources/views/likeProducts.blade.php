@extends('layouts.site')

@section('title', 'Like Products')

<style>
     .featured__item__pic__hover li a {
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
                        <h2>Product Likes</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="section-title product__discount__title">
                <h2>Likes Products</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="/allStyle/img/product/product-1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a>
                                </li>
                                <li><a href="javascript:void(0);"
                                        onclick="showImageOverlay()"><i
                                            class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Go'sht</a>
                            </h6>
                            <h5>50500</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection


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
