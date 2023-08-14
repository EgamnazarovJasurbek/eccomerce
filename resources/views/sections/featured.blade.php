 <section class="featured spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title">
                     <h2>@lang('words.products')</h2>
                 </div>
                 <div class="featured__controls">
                     <ul id="menu">
                         @if (count($menus) > 0)
                             <li data-filter="*">All</li>
                             @foreach ($menus as $menu)
                                 <li data-filter=".{{ $menu->slug }}">{{ $menu->name_uz }}</li>
                             @endforeach
                         @endif

                     </ul>
                 </div>
             </div>
         </div>
         <div class="row featured__filter">
             @if (count($products) > 0)
                 @foreach ($products as $product)
                     <?php
                     $cotigory = App\Models\Menu::find($product->menu_id);
                     ?>
                     <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $cotigory->slug }}">
                         <div class="featured__item">
                             <div class="featured__item__pic set-bg"
                                 data-setbg="Products/image/{{ explode('|', $product->multi_img)[0] }}">
                                 <ul class="featured__item__pic__hover">
                                     <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                     <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                     <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                 </ul>
                             </div>
                             <div class="featured__item__text">
                                 <h6><a href="#">{{ $product->title_uz }}</a></h6>
                                 <h5>{{ $product->price }}</h5>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif

         </div>
     </div>
 </section>
