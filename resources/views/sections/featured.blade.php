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
                             <li data-filter="*" class="active">All</li>
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
                     $category = App\Models\Menu::find($product->menu_id);
                     ?>
                     <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $category->slug }}">
                         <div class="featured__item">
                             <div class="featured__item__pic set-bg"
                                 data-setbg="Products/image/{{ explode('|', $product->multi_img)[0] }}">
                                 <ul class="featured__item__pic__hover">
                                     <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                     <li><a href="javascript:void(0);"
                                             onclick="showImageOverlay('{{ asset('Products/image/' . explode('|', $product->multi_img)[0]) }}')"><i
                                                 class="fa fa-retweet"></i></a></li>
                                     <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                 </ul>
                             </div>
                             <div class="featured__item__text">
                                 <h6><a href="{{ route('shopDetails', $product->slug) }}">{{ $product->title_uz }}</a>
                                 </h6>
                                 <h5>{{ $product->price }}</h5>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endif

         </div>
     </div>
 </section>


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
