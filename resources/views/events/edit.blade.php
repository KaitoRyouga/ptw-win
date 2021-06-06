@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">Event</div>
    <div class="card-body ">
        <form class="col-md-12" action="/admin/update-event/{{$event[0]->eventId}}" method="post" enctype="multipart/form-data">
            <div class="form-group ">
                <img style="height: 10em; width: 10em" src="{{ 'https://ptw.devf.tech/admin/img/' . $event[0]->imgSrc }}" />
                <br />
                <br />
                <label class="formLabel" for="productAvatar">Chosse
                </label>
                <input type="file" id="productAvatar" name="imgupload">
            </div>
            <textarea name="content" id="editor">
            @php echo $event[0]->body @endphp
            </textarea>
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
    @endsection