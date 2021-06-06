@extends('layouts.client')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-9  m-auto  border p-4">
            @if(isset($event))
            <div class="event">
                <div class="d-flex flex-row">
                    <img src="{{ 'https://ptw.devf.tech/admin/img/' . $event[0]->imgSrc }}" width="200" height="150" alt="" srcset="">
                    <div class="infor ml-5">
                        @php echo $event[0]->body @endphp
                        <div class="float-right btn btn-primary">chi tiết</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection