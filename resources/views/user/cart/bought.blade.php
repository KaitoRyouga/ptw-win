@extends('layouts.index')
@section('content')
    <div class="container">
        <main class="page-content">
            <div class="container p-3">
                @if (isset($carts))
                    @foreach ($carts as $cartRaw)
                        <div class="small-container cart-page">
                            <table>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>

                                @foreach (unserialize($cartRaw->product) as $key => $cart)
                                    <tr>
                                        <td>
                                            <div class="cart-info">

                                                @foreach ($post as $key => $p)
                                                    @if ($p->postId == $cart['postId'])
                                                        <img src="{{ BASE_URL . '/admin/img/' . $p->imgSrc }}" alt="" />
                                                    @endif
                                                @endforeach
                                                <div>
                                                    <p>
                                                        @php
                                                            foreach ($post as $key => $p) {
                                                                if ($p->postId == $cart['postId']) {
                                                                    echo $p->title;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                    </p>
                                                    <small>Price
                                                        @php
                                                            foreach ($post as $key => $p) {
                                                                if ($p->postId == $cart['postId']) {
                                                                    echo number_format($p->price, 0, '', ',') . ' VND';
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                    </small>
                                                    <br />
                                                    <a href="#">Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input disabled type="number" class="quantityNumber-{{ $cart['postId'] }}"
                                                id="quantityNumber" data-id="{{ $cart['postId'] }}"
                                                value="{{ $cart['quantity'] }}" /></td>
                                        <td class="subtotal-{{ $cart['postId'] }}">
                                            @php
                                                foreach ($post as $key => $p) {
                                                    if ($p->postId == $cart['postId']) {
                                                        echo number_format((int) $p->price * (int) $cart['quantity'], 0, '', ',') . ' VND';
                                                        break;
                                                    }
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="total-price">
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="subtotal">
                                        @php
                                            $sum = 0;
                                            foreach (unserialize($cartRaw->product) as $key => $cartTotal) {
                                                foreach ($post as $key => $p) {
                                                    if ($p->postId == $cartTotal['postId']) {
                                                        $sum = $sum + $p->price * $cartTotal['quantity'];
                                                        break;
                                                    }
                                                }
                                            }
                                            
                                            echo number_format($sum, 0, '', ',') . ' VND';
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>15,000</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td id="total">
                                        @php
                                            $sum = 0;
                                            foreach (unserialize($cartRaw->product) as $key => $cartTotal) {
                                                foreach ($post as $key => $p) {
                                                    if ($p->postId == $cartTotal['postId']) {
                                                        $sum = $sum + $p->price * $cartTotal['quantity'];
                                                        break;
                                                    }
                                                }
                                            }
                                            
                                            echo number_format($sum + 15000, 0, '', ',') . ' VND';
                                            
                                        @endphp

                                    </td>

                                </tr>
                            </table>
                        </div>
                    @endforeach
                @endif


                <script>
                    var MenuItems = document.getElementById('MenuItems');
                    // MenuItems.style.maxHeight = '0px';

                    function menutoggle() {
                        if (MenuItems.style.maxHeight == '0px') {
                            MenuItems.style.maxHeight = '200px';
                        } else {
                            MenuItems.style.maxHeight = '0px';
                        }
                    }

                </script>
            </div>
        </main>
    </div>
@endsection
