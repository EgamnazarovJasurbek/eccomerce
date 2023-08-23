<section class="latest-product spad">
    <div class="container">
        <div class="row">
            {{-- Latest Products --}}
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1080px, 0px, 0px); transition: all 1.2s ease 0s; width: 2160px;">
                                <div class="owl-item cloned" style="width: 360px;">
                                    @foreach ($latestProducts as $item)
                                        <div class="latest-prdouct__slider__item">
                                            <a href="{{ route('shopDetails', $item->slug) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="Products/image/{{ explode('|', $item->multi_img)[0] }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item['title_' . \App::getLocale()] }}</h6>
                                                    <span>{{ $item->price }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Top Rated Products --}}
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1080px, 0px, 0px); transition: all 1.2s ease 0s; width: 2160px;">
                                <div class="owl-item cloned" style="width: 360px;">
                                    @foreach ($topProducts as $item)
                                        <div class="latest-prdouct__slider__item">
                                            <a href="{{ route('shopDetails', $item->slug) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="Products/image/{{ explode('|', $item->multi_img)[0] }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item['title_' . \App::getLocale()] }}</h6>
                                                    <span>{{ $item->price }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Review Products --}}
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1080px, 0px, 0px); transition: all 1.2s ease 0s; width: 2160px;">
                                <div class="owl-item cloned" style="width: 360px;">
                                    @foreach ($reviewProducts as $item)
                                        <div class="latest-prdouct__slider__item">
                                            <a href="{{ route('shopDetails', $item->slug) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="Products/image/{{ explode('|', $item->multi_img)[0] }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item['title_' . \App::getLocale()] }}</h6>
                                                    <span>{{ $item->price }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
