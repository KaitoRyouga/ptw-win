@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">Edit User</div>
        <div class="card-body ">
            <form class="col-md-6" action="/admin/update-job/{{ $job[0]->postId }}" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $job[0]->title }}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Deadline</label>
                    {{-- <input type="text" name="deadline" value="{{ $job[0]->deadline }}" class="form-control"
                        placeholder=""> --}}
                    <input type="text" id="datepicker" value="{{ $job[0]->deadline }}"" name="deadline" width="276" />
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4'
                        });

                    </script>
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" value="{{ $job[0]->location }}" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Salary</label>
                    <input type="text" name="salary" value="{{ $job[0]->salary }}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <textarea name="content" id="editor">
                                {!! $job[0]->body !!}
                            </textarea>
                </div>
                <div class="form-group">
                    <label for="title">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        @if (isset($category))
                            @foreach ($category as $c)
                                <option value="{{ $c->catId }}">{{ $c->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
        <div class="card-footer">

        </div>
    @endsection
