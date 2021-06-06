@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">Category</div>
    <div class="card-body ">
        <form class="col-md-6" action="/admin/save-category" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
    @endsection