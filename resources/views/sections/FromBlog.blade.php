<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogproducts as $blogproduct)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{ asset('images/' . $blogproduct->image) }}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{ $blogproduct->created_at->format(' M.d.Y') }}</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="{{ route('blogDetails',$blogproduct->slug) }}">{{ $blogproduct['name_' . \App::getLocale()] }}</a></h5>
                        <p  width="30px">{!! \Str::limit($blogproduct['body_'.\App::getLocale()],100) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
           
           
        </div>
    </div>
</section>
