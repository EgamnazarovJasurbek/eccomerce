<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($moreViews as $moreView)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="Products/image/{{ explode('|', $moreView->multi_img)[0] }}">
                            <h5><a href="{{ route('shopDetails') }}">{{ $moreView['title_' . \App::getLocale()] }}</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
