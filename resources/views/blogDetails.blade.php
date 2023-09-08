@extends('layouts.site')

@section('title')
    Blog Details
@endsection

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
    
        <!-- Blog Details Hero Begin -->
        <section class="blog-details-hero set-bg" data-setbg="/allStyle/img/blog/details/details-hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog__details__hero__text">
                            <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                            <ul>
                                <li>By Michael Scofield</li>
                                <li>January 14, 2019</li>
                                <li>8 Comments</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Hero End -->
    
        <!-- Blog Details Section Begin -->
        <section class="blog-details spad">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-12 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <img src="{{ asset('images/' . $blogproduct->image) }}" alt="" width="100%">
                            <p>{{ $blogproduct['body_' . \App::getLocale()] }}</p>
                        </div>
                        <div class="blog__details__content">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->
    
        <!-- Related Blog Section Begin -->
        <section class="related-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related-blog-title">
                            <h2>Post You May Like</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($otherproducts as $otherproduct)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('images/' . $otherproduct->image) }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ $otherproduct->created_at->format(' M.d.Y') }}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="{{ route('blogDetails',$otherproduct->slug) }}">{{ $otherproduct['name_' . \App::getLocale()] }}</a></h5>
                                <p>{!! \Str::limit($otherproduct['body_'.\App::getLocale()],100) !!} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="/allStyle/img/blog/blog-1.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="/allStyle/img/blog/blog-2.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="/allStyle/img/blog/blog-3.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#">Visit the clean farm in the US</a></h5>
                                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- Related Blog Section End -->

@endsection