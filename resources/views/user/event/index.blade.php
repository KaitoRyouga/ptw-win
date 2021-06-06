@extends('layouts.index')
@section('content')
<div class="container mt-3">
    <main class="page-content">
    <div class="row mr-0 ml-0 p-3">
        @if (isset($events))
        @foreach ($events as $event)
        <div class="col-md-12 mr-auto ml-auto mb-3 bd-radius">
            <div class="event">
                <div class="d-flex flex-row p-4">
                    <img src="{{ 'https://ptw.devf.tech/admin/img/' . $event->imgSrc }}" width="200" height="150" alt="" srcset="">
                    <div class="infor ml-5">
                        @php echo $event->body @endphp

                    </div>
                </div>
            </div>
            <button data-dismiss="modal" data-toggle="modal" data-target="#event-detail" data-id="{{ $event->eventId }}" class="float-right btn btn-primary mb-2 description-button">chi tiết</button>

        </div>
        @endforeach
        @endif
    </div>
    </main>
</div>
@endsection