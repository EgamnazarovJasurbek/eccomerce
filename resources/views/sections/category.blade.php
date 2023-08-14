<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>@lang('words.allDepartments')</span>
    </div>
    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('categoryShop', $category->slug) }}">{{ $category['name_' . \App::getLocale()] }}</a>
            </li>
        @endforeach
    </ul>
</div>