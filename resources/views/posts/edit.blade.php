@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">Post</div>
    <div class="card-body ">
        <form class="col-md-12" action="/admin/update-post/{{$post[0]->postId}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $post[0]->title }}" class="form-control" placeholder="">
            </div>
            <div class="form-group ">
                <img style="height: 10em; width: 10em" src="{{ 'https://ptw.devf.tech/admin/img/' . $post[0]->imgSrc }}" />
                <br />
                <br />
                <label class="formLabel" for="productAvatar">Chosse
                </label>
                <input type="file" id="productAvatar" name="imgupload">
            </div>
            <textarea name="content" id="editor">
            @php echo $post[0]->body @endphp
            </textarea>
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
</div>
@endsection