@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">Edit Category</div>
    <div class="card-body ">
        <form class="col-md-6" action="/admin/update-category/{{$category[0]->catId}}" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{$category[0]->name}}" class="form-control" placeholder="">
            </div>
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
    @endsection