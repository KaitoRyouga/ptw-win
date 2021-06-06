@extends('layouts.index')
@section('content')
<div class="container">
    
    <main class="page-content">
        <form action="/posts/search" class="col-md-6 mb-4" method="post">
            <div class="form-search-post">
                <div class="form-group d-flex flex-row mb-0 ">
                    <label for=""></label>
                    <input type="text" name="search" value="@if (isset($search)) {{ $search }} @endif" id="" class="form-control mt-0 mb-0"
                        placeholder="Tìm kiếm post" aria-describedby="helpId">
                    <button type="submit"><i class="fas fa-search"></i></button>

                </div>

            </div>
        </form>
        <div class="container">
            
                
            <div class="row">
               
             
                @if (isset($posts))
                    @foreach ($posts as $key => $post)
                        @if ($key + (1 % 3) == 0)
                            <br />
                        @endif
                        <div class="col-md-4 text-center">
                            <div class="box-content"> <img style="height: 10em; width: 10em"
                                    src="{{ BASE_URL . 'admin/img/' . $post->imgSrc }}" alt="" srcset="">
                                <p>{{ $post->title }}</p><a class="btn btn-light"
                                    href="/post/{{ $post->postId }}">more...</a>

                                @if (isset($_SESSION['userId']))
                                    @if ($post->author == $_SESSION['userId'])
                                        <div
                                            style="width: 100%; display: flex; justify-content: space-around; margin-top: 1em">
                                            <a href="/edit-post/{{ $post->postId }}"
                                                class="btn btn-secondary float-right">Edit</a>
                                            <a href="/delete-post/{{ $post->postId }}"
                                                class="btn btn-danger float-right">Delete</a>
                                        </div>

                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
    </div>

</div>
@endsection
