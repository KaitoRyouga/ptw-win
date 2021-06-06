@extends('layouts.index')
@section('content')
@if (isset($post))
<div class="container">
    <main style="margin-bottom: 10px" class="page-content bg-light">
        <div class="row">

            <div class="col-md-8">
                <div class="post-image">
                    <img class="img-fluid" src="{{ BASE_URL . 'admin/img/' . $post[0]->imgSrc }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-text">
                    <p class="d-block ">
                    <h6 class="title">{{ $post[0]->title }}</h6>
                    </p>
                    <p class="price">{{ number_format($post[0]->price, 0, '', ',') }} VND</p>
                    <form action="/cart" method="post">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" name="quantity" value="1">
                        <input type="hidden" name="postId" value="{{ $post[0]->postId }}">
                        <button class="mt-4 mb-4 btn btn-danger">Thêm vào giỏ hàng</button>
                    </form>

                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="col-md-12 p-2  bg-white ">
                    <img class="img-fluid" style="border-radius: 50%" width="50" height="50" src="{{ BASE_URL . 'admin/img/' . $post[0]->imgAuthor }}">
                    <strong>{{ $post[0]->username }}</strong>
                    <br>
                    <button class="mt-2 d-inline-block btn btn-primary contact">liên hệ</button>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="col-md-12 p-2    bg-white ">
                    <h5>Mô tả sản phẩm</h5>
                    <p class="d-block">{!! $post[0]->body !!}</p>
                </div>
            </div>
        </div>
    </main>
</div>


@endif

@endsection