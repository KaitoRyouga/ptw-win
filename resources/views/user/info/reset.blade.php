<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ BASE_URL . 'admin/css/login.css' }}" rel="stylesheet">
    <title>Reset</title>
</head>

<body>

    <body>
        <form class="login" action="/update-pass/{{ $user->userId }}" method="post">
            <input type="hidden" name="token" value="{{ $token }}" />
            <label for="login__password">Password</label>
            <input type="password" name="password" id="login__password" required />
            <label for="login__password">Repeat Password</label>
            <input type="password" name="repassword" id="login__password" required />
            <div class="login__section">
            </div>
            <div class="login__section-2">
                <button class="login__submit login__button" type="submit">Edit</button>
            </div>

        </form>
    </body>



</body>

</html>




@section('content')
    <main class="page-content">
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body ">
                <form class="col-md-6" action="" method="post">

                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" name="oldpassword" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Repeat Password</label>
                        <input type="password" name="repassword" class="form-control" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-success"></button>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </main>
@endsection
