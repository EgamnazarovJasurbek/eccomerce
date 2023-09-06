    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                  @include('sections.category')
                </div>
                <div class="col-lg-9">
                   @include('sections.search')
                    @foreach ($banners as $banner)
                    <div class="hero__item set-bg" data-setbg="{{ asset('site/images/' . $banner->image) }}">
                        <div class="hero__text">
                            <span>@lang('words.fruitFresh')</span>
                            <h2>{{ $banner['name_' . \App::getLocale()] }} <br />100% Organic</h2>
                            <p>{{ $banner['body_' . \App::getLocale()] }}</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->