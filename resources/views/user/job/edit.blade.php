@extends('layouts.index')
@section('content')
<main class="page-content">
    <div class="container">
        <div class="row">
            <div class="col align-self-center">
                <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">Edit Job</h5>
            </div>
        </div>

        <div class="row">
            <div class="col align-self-center">
                <form action="/update-job/{{ $job[0]->jobId }}" method="POST" id="formJob">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $job[0]->title }}" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="editor">
                        {!! $job[0]->body !!}
                                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Location</label>
                        <input type="text" class="form-control" name="location" value="{{ $job[0]->location }}" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <label for="title">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            @if(isset($category))
                            @foreach($category as $c)
                            <option value="{{ $c->catId }}">{{ $c->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Deadline</label>
                        {{-- <!-- <input type="text" class="form-control" name="deadline" value="{{ $job[0]->deadline }}" placeholder="Deadline"> --> --}}
                        <input type="text" id="datepicker" name="deadline" width="276" />
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="title">Salary</label>
                        <input type="text" class="form-control" name="salary" value="{{ $job[0]->salary }}" placeholder="Salary">
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection