@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">Event</div>
    <div class="card-body ">
        <form class="col-md-12" action="/admin/save-event" method="post" enctype="multipart/form-data">
            <div class="form-group ">
                <label class="formLabel" for="productAvatar">Chosse
                </label>
                <input type="file" id="productAvatar" name="imgupload">
            </div>
            <textarea name="content" id="editor">
                <p>This is some sample content.</p>
            </textarea>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
</div>
@endsection