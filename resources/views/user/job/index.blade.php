@extends('layouts.index')
@section('content')
    <div class="container">
        <main class="page-content">
            <form action="/jobs/search" class="col-md-6 mb-4" method="get">
                <div class="form-search-post">
                    <div class="form-group d-flex flex-row mb-0 ">
                        <label for=""></label>
                        <input type="text" name="search" value="@if (isset($search)) {{ $search }} @endif" id="" class="form-control mt-0 mb-0" placeholder="Tìm kiếm jobs"
                            aria-describedby="helpId">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title">Danh mục việc làm:</div>
                        <div class="btn btn-primary mt-3 col-md-12 col-sm-5">Tất cả công việc</div>
                        <button onClick="window.location='/jobs/works'" class="btn btn-primary mt-3 col-md-12  col-sm-3">Việc làm</button>
                        <button onClick="window.location='/jobs/interns'" class="btn btn-primary mt-3 col-md-12 col-sm-3">Thực tập </button>
                    </div>
                    <div class="col-md-9 mt-2">
                        @if (!isset($_SESSION['code']))
                            <div class="card text-center p-4">
                                <p class="text">Công ty bạn muốn tuyển dụng? Hãy chia sẻ cơ hội nghề nghiệp với
                                    nguồn
                                    nhân lực
                                    chất lượng của cộng đồng</p>
                                <button data-toggle="modal" data-target="#upjob"
                                    class="btn btn-success m-auto col-md-8 openmodal">+ Đăng một công việc thực
                                    tập</button>
                            </div>
                        @endif

                        @if (isset($jobs))
                            @foreach ($jobs as $job)
                                <div class="card d-flex flex-row mt-3">
                                    <img src="{{ BASE_URL . '/admin/img/' . $job->imgAuthor }}" alt="" srcset="">

                                    <div class="content-job p-3">
                                        <h5 class="name-job">{{ $job->title }} @if (isset($_SESSION['userId']))
                                                @if ($job->author == $_SESSION['userId'])
                                                    <a href="/edit-job/{{ $job->jobId }}" style="margin-right: 0.5em"
                                                        class="btn btn-success float-right">Edit</a>
                                                    <a href="/delete-job/{{ $job->jobId }}" style="margin-right: 0.5em"
                                                        class="btn btn-success float-right">Delete</a>
                                                @endif
                                            @endif
                                        </h5>
                                        <h6 class="user-name">{{ $job->username }}</h6>
                                        <p>{{ $job->location }}</p>
                                        <p>
                                            @php
                                                
                                                $end = $job->deadline;
                                                $current = date('m/d/Y');
                                                
                                                $datetime1 = date_create($end);
                                                $datetime2 = date_create($current);
                                                $interval = date_diff($datetime1, $datetime2);
                                                if (strtotime($end) - strtotime($current)) {
                                                    echo 'Còn ' . $interval->days . ' ngày';
                                                } else {
                                                    echo 'Hết hạn.';
                                                }
                                            @endphp
                                        </p>
                                        <a href="/job/{{ $job->jobId }}">Click view salary</a>
                                    </div>

                                </div>
                                {{-- <div class="card  p-4 mt-4">
                        <p class="text">{{ $job->title }}</p>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="header-title-job mb-0 d-block">Location</p>
                            <p>{{ $job->location }}</p>
                            <div class="flex flex-column justify-content-center">
                                <img width="100" height="100" src="{{ BASE_URL . '/admin/img/' . $job->imgAuthor }}" alt="" srcset="">
                                <p class="mb-0 d-block">{{ $job->username }}</p>
                                <p>Published On {{ $job->created_at }}</p>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <p class="header-title-job mb-0 d-block">Deadline</p>
                            <p>
                                @php

                                $end = $job->deadline;
                                $current = date("m/d/Y");

                                $datetime1 = date_create($end);
                                $datetime2 = date_create($current);
                                $interval = date_diff($datetime1, $datetime2);
                                if(strtotime($end) - strtotime($current)){
                                echo 'Còn ' . $interval->days . ' ngày';
                                }else{
                                echo "Hết hạn.";
                                }
                                @endphp
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="header-title-job mb-0 d-block">Salary</p>
                            <p>{{ $job->salary }}</p>

                        </div>

                    </div>
                    <div class="text-right">
                        <a href="/job/{{ $job->jobId }}" class="btn btn-success float-right">View</a>
                        @if (isset($_SESSION['userId']))
                        @if ($job->author == $_SESSION['userId'])
                        <a href="/edit-job/{{ $job->jobId }}" style="margin-right: 0.5em" class="btn btn-success float-right">Edit</a>
                        <a href="/delete-job/{{ $job->jobId }}" style="margin-right: 0.5em" class="btn btn-success float-right">Delete</a>
                        @endif
                        @endif
                    </div>



                </div> --}}
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </main>

        <!-- modal -->
        
    </div>

@endsection
