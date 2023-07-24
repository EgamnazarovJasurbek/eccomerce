@extends('layouts.site')
@section('title')
    Bosh sahifa
@endsection

@section('content')

    @include('sections.hero')

    <!-- Categories Section Begin -->
    @include('sections.categories')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @include('sections.featured')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/allStyle/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/allStyle/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    @include('sections.latestProduct')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    @include('sections.FromBlog')
    <!-- Blog Section End -->
    
@endsection