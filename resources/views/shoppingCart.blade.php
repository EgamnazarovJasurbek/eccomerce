@php
    $selectedProducts = session()->get('selectedProducts', []);
@endphp


@extends('layouts.site')

<style>
    .qty-change {
        display: none;
    }

    .qtybtn {
        display: none !important;
    }
</style>

@section('title')
    Shopping Cart
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
                    @include('sections.search')
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
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectedProducts as $item)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="/Products/image/{{ explode('|', $item->img)[0] }}" alt="img"
                                                width="120px">
                                            <h5>{{ $item->product_name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $item->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="number" value="{{ $item->quantity ?? 1 }}" min="1"
                                                        data-price="{{ $item->price }}" data-quantity="1"
                                                        onchange="updatePrice(this)">
                                                </div>
                                            </div>
                                            <button class="qty-change plus" onclick="changeQuantity(this)">+</button>
                                            <button class="qty-change minus" onclick="changeQuantity(this)">-</button>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <span class="total-price">{{ $item->price * $item->quantity }}</span>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close" onclick="removeProduct('{{ $item['id'] }}')"></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($selectedProducts)
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Total <span>{{ $item->price * $item->quantity }}</span></li>
                            </ul>
                            <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


<script>
    function updatePrice(input) {
        var quantity = parseInt(input.value);
        var price = parseInt(input.getAttribute('data-price'));
        var totalElement = input.closest('tr').querySelector('.total-price');

        // Update the total price
        var total = price * quantity;
        totalElement.textContent = total;
    }


    // Miqdorni oshirish yoki kamaytirish uchun JavaScript funktsiyas
    function changeQuantity(button, action) {
        var inputField = button.parentNode.querySelector('input');
        var currentQuantity = parseInt(inputField.value);

        if (action === 'increment') {
            currentQuantity++;
        } else if (action === 'decrement' && currentQuantity > 1) {
            currentQuantity--;
        }

        inputField.value = currentQuantity;

        // Trigger the updatePrice function to recalculate the total
        updatePrice(inputField);
    }


    function removeProduct(productId) {
        var confirmation = confirm('Mahsulotni o\'chirishni tasdiqlaysizmi?');

        if (confirmation) {
            // AJAX so'rovni yuborish
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Sahifani yangilash
                    location.reload();
                }
            };
            xhr.open('GET', '?remove_product=' + productId, true);
            xhr.send();
        }
    }
</script>


@php
    // Sessiyadan mahsulotni o'chirish
if (isset($_GET['remove_product'])) {
    $productId = $_GET['remove_product'];
    // Mahsulotni o'chirish
        foreach ($selectedProducts as $key => $product) {
            if ($product['id'] == $productId) {
                unset($selectedProducts[$key]);
                // O'zgarishlarni sessiyada saqlash
            session()->put('selectedProducts', $selectedProducts);
                break;
            }
        }
    }
@endphp
