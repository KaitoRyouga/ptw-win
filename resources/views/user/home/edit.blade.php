@extends('layouts.index')
@section('content')
<div class="container">
    <main class="page-content">
        <div class="container">
    
            <div class="row">
                <div class="col align-self-center">
                    <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">edit Job</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col align-self-center">
                <form action="/update-post/{{ $post[0]->postId }}" method="POST" id="formPost" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $post[0]->title }}" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $post[0]->price }}" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $post[0]->quantity }}" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="editor">
                            {!! $post[0]->body !!}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </main>
</div>

@endsection