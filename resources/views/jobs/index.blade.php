@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Users</div>
            <div class="card-body">
                {{-- <a class="btn btn-success mb-3" href="/admin/add-user">Add</a> --}}
                @php
                    if (isset($_SESSION['success'])) {
                        if ($_SESSION['success'] == 'add') {
                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                            <strong>Bạn đã thêm thành công</strong>
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>';
                            unset($_SESSION['success']);
                        } elseif ($_SESSION['success'] == 'edit') {
                            echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>Bạn đã sửa thành công</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                            unset($_SESSION['success']);
                        } elseif ($_SESSION['success'] == 'delete') {
                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                            <strong>Bạn đã xóa thành công</strong>
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>';
                            unset($_SESSION['success']);
                        }
                    }
                @endphp
                <div class="table table-responsive table-bordered table-hover">
                    <table>
                        <thead>
                            <tr>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Deadline</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>content</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $u)
                                <tr>
                                    <td>{{ $u->title }}</td>
                                    <td>{{ $u->deadline }}</td>
                                    <td>{{ $u->location }}</td>
                                    <td>{{ $u->salary }}</td>
                                    <td>{!! $u->body !!}</td>
                                    <td>{{ $u->author }}</td>
                                    <td>{{ $u->category }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/edit-job/{{ $u->jobId }}">Edit</a>
                                        <a class="btn btn-dark" href="/admin/delete-job/{{ $u->jobId }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
