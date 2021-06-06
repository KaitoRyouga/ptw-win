@extends('layouts.index')
@section('content')
    <div class="container">
        <main class="page-content">
            @if (isset($job))
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="name-job">
                                {{ $job[0]->title }}
                            </h3>
                            <button data-id="{{ $job[0]->author }}" class="btn btn-success contact">Apply now</button>

                            <hr>
                            <p class="mt-2 mb-0">Location: {{ $job[0]->location }}</p>
                            <p class="mt-2 mb-0 ">Deadline: {{ $job[0]->deadline }} </p>
                            <p class="mt-2">Salary: {{ $job[0]->salary }} </p>
                            <hr>
                            <div class="jop-detail-title">
                                <h5>Job Description</h5>
                            </div>
                            <div class="paragrap">
                                <div class="job-details__paragraph">
                                    @php echo $job[0]->body @endphp
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <img width="100" height="100"
                                src="{{ BASE_URL . '/admin/img/' . $job[0]->imgAuthor }}"
                                alt="" srcset="">
                            <p class="name mb-0">{{ $job[0]->username }}</p>
                            <p>Published On {{ $job[0]->created_at }}</p>
                        </div>
                    </div>

                </div>

            @endif
        </main>
    </div>

@endsection
