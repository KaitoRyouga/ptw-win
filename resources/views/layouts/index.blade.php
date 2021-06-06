<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ BASE_URL . 'index/assets/css/main.css' }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"> </script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="{{ BASE_URL . 'chat/js/jquery.js' }}"> </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <div class="container mb-2">
            <div class="header">
                <div class="logo">
                    <a href="/">
                        <h5>DTU market</h5>
                    </a>
                </div>
                <div class="button-bar">

                </div>
                <ul class="menu_list">
                    <li class="menu_item">
                        <a href="/">
                            <i class="fas fa-home"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="/messages">
                            <i style="color: white" class="fab fa-facebook-messenger"></i>
                            Chat
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="/cart">
                            <i class="fas fa-cart-plus"></i>
                            Cart
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="/info">
                            <i class="fas fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li class="menu_item">

                        <a href="/jobs">
                            <i class="fas fa-user-md"></i> jobs</a>
                    </li>
                    <li class="menu_item">
                        <a href="/event">
                            <i class="fas fa-calendar-week"></i>
                            Event
                        </a>
                    </li>
                    @if (isset($_SESSION['username']))
                        <li class="menu_item">
                            <a href="/logout">
                                <i class="fas fa-sign-out-alt"></i>
                                logout
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="header_bottom ">
                <div class="row">
                    <div class="col-md-8 col-sm-12 ml-0 mr-0">
                        <form action="@if ($_SERVER['REQUEST_URI']=='/jobs' ||
                        $_SERVER['REQUEST_URI']=='/jobs/search' ) /jobs/search @else /posts/search @endif" method="post">
                            <div class="form-search  ">
                                <div class="form-group d-flex flex-row mb-0 ">
                                    <label for=""></label>
                                    <input type="text" name="search" value="@if (isset($search)) {{ $search }} @endif" id=""
                                        class="form-control mt-0 mb-0" placeholder="Tìm kiếm trên DTU market"
                                        aria-describedby="helpId">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="user col-md-4">
                        <div class="user_login">
                            @if (isset($_SESSION['username']))
                                <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                    alt="">
                                <p class="name">
                                    {{ $_SESSION['username'] }}
                                </p>

                            @else
                                <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                    alt="">
                                <a href="/login">Đăng nhập</a>
                            @endif





                        </div>
                        <div class="button-add-post">
                            @if (isset($_SESSION['code']))
                                <button type="button" class="btn btn-warning mb-3 openmodal" data-toggle="modal"
                                    data-target="#uppost">
                                    <i class="fas fa-edit"></i> Post mới
                                </button>
                            @else
                                <button type="button" class="btn btn-warning mb-3 openmodal" data-toggle="modal"
                                    data-target="#upjob">
                                    <i class="fas fa-edit"></i> Đăng việc
                                </button>
                            @endif

                        </div>

                    </div>
                </div>

            </div>



        </div>
        </div>
    </header>
    @yield('content')


    <!-- about ronak -->



    <!-- footer main area start -->

    <footer>

        <!-- Social media icons line Start -->

        <div class="sm-handle">

            <a href="https://instagram.com/ronakgiriraj" class="sm-button">

                <i class="fab fa-instagram"> </i>

            </a>

            <a href="https://www.linkedin.com/in/giri-raj-ronak-999257212" class="sm-button">

                <i class="fab fa-linkedin"> </i>

            </a>

            <a href="https://facebook.com/giriraj.ronak" class="sm-button">

                <i class="fab fa-facebook-f"> </i>

            </a>

            <a href="https://twitter.com/2Teching" class="sm-button">

                <i class="fab fa-twitter"> </i>

            </a>

            <a href="https://github.com/ronakgiriraj" class="sm-button">

                <i class="fab fa-github"> </i>

            </a>

        </div>

        <!-- Social media icons line Start -->

        <div class="footer-links">

            <div class="menu">

                <h4 class="menu-title">Menu</h4>

                <a href="#" class="menu-links">Join Me</a>

                <a href="#" class="menu-links">My Blogs</a>

                <a href="#" class="menu-links">My Journey</a>

                <a href="#" class="menu-links">About</a>

            </div>

            <div class="menu">

                <h4 class="menu-title">Other Pages</h4>

                <a href="#" class="other-links">Contact Us</a>

                <a href="#" class="other-links">Privacy Policy</a>

                <a href="#" class="other-links">FAQ</a>

                <a href="#" class="other-links">Terms of use</a>

            </div>

        </div>

        <!-- copyright area -->

        <p class="copyright">&copy Copyright 2021 | <a href="https://instagram.com/ronakgiriraj">❤️ Ronak Giri Raj</a>
        </p>

    </footer>

    <!-- footer main area end -->
    </footer>


    {{-- <div class="page-wrapper chiller-theme toggled"><a class="btn btn-sm btn-dark" id="show-sidebar" href="#"><i class="fas fa-bars"></i></a>
        <nav class="sidebar-wrapper" id="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-brand"><a href="#">Home</a>
                    <div id="close-sidebar"><i class="fas fa-times"></i></div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="m-auto" width="100" height="100" src="
                        @if ($user[0]->imgSrc == '' || $user[0]->imgSrc == null)
                        https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg
                        @else
                        {{ BASE_URL . '/admin/img/' . $user[0]->imgSrc }}
    @endif
    " alt="">
    </div>
    <div class="user-info">
        <span class="user-name">
            @if (isset($_SESSION['username']))
            {{ $_SESSION["username"] }}
            @else
            Guest
            @endif
        </span>
    </div>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li class="sidebar-dropdown"><a href="/"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li class="sidebar-dropdown"><a href="/info"><i class="fas fa-user"></i><span>User</span></a></li>
            <li class="sidebar-dropdown"><a href="/jobs"><i class="fas fa-bell"></i><span>Jobs</span></a>
            <li class="sidebar-dropdown"><a href="/messages"><i class="fas fa-bell"></i><span>Chats</span></a>
            <li class="sidebar-dropdown event" data-toggle="modal" data-target="#event"><a href="#"><i class="fas fa-bars"></i><span>Events</span></a>
            </li>
            @if (!isset($_SESSION['username']))
            <li class="sidebar-dropdown"><a href="/login"><i class="fas fa-bell"></i><span>Login</span></a>
                @else
            <li class="sidebar-dropdown"><a href="/logout"><i class="fas fa-bell"></i><span>Logout</span></a>
                @endif
            <li class="sidebar-dropdown"><a href="/register"><i class="fas fa-bell"></i><span>Register</span></a>
            </li>

        </ul>
    </div>
    </div>
    </nav>

    </div> --}}
    {{-- <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3">
                        <div class="row">
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
    <button data-dismiss="modal" data-toggle="modal" data-target="#event-detail" data-id="{{ $event->eventId }}" class="float-right btn btn-success mb-2 description-button">chi tiết</button>

    </div>
    @endforeach
    @endif
    </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>

    </div>
    </div> --}}
    {{-- ------------- upjob ----------------- --}}

    <div class="modal fade" id="upjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">New Job</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col align-self-center">
                                    <form action="/add-job" method="POST" id="formJob">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="content" id="editor">
                                                        <p>This is some sample content.</p>
                                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Location</label>
                                            <input type="text" class="form-control" name="location" placeholder="Location">
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
                                        <div class="form-group">
                                            <label for="title">Deadline</label>
                                            {{-- <input type="text" class="form-control" name="deadline" placeholder="Deadline"> --}}
                                            <input type="text" id="datepicker" name="deadline" width="276" />
                                            <script>
                                                $('#datepicker').datepicker({
                                                    uiLibrary: 'bootstrap4'
                                                });

                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Salary</label>
                                            <input type="text" class="form-control" name="salary" placeholder="Salary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-body description">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" form="formJob" class="btn btn-success addjob">Add</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- modal decription -->
    <div class="modal fade" id="event-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body description">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal post -->
    <div class="modal fade" id="uppost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="container">

                        <div class="row">
                            <div class="col align-self-center">
                                <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">New Job</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-self-center">
                                <form action="/add-post" method="POST" id="formPost" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label class="formLabel" for="productAvatar">Chosse
                                        </label>
                                        <input type="file" id="productAvatar" name="imgupload">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content" id="editor">
                                            <p>This is some sample content.</p>
                                        </textarea>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-body description">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="formPost" class="btn btn-success addjob">Add</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', '|',
                        'insertTable', '|',
                        'uploadImage', 'blockQuote', '|',
                        'undo', 'redo', 'ckfinder'
                    ],
                    shouldNotGroupWhenFull: true

                },
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: 'http:localhost/upload-event?command=QuickUpload&type=Images&responseType=json',
                    options: {
                        resourceType: 'Images'
                    }
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            });

    </script>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="{{ BASE_URL . 'chat/js/jquery-3.6.0.slim.min.js' }}"> </script>
<script src="{{ BASE_URL . 'chat/js/jquery-3.6.0.min.js' }}"> </script>
<script src="{{ BASE_URL . 'index/assets/js/main.js' }}"> </script>
<script src="{{ BASE_URL . 'index/assets/js/index.js' }}"> </script>
<script src="{{ BASE_URL . 'backend/assets/js/jobs.js' }}"> </script>

</html>
