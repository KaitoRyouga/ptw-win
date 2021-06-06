<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ BASE_URL . 'admin/css/login.css' }}" rel="stylesheet">
    <title>Change</title>
</head>

<body>
    <body>
        <form class="login" action="create-token" method="post">
            <label for="login__username">Email</label>
            <input type="email" name="email" id="login__username" required />
            <div class="login__section">

            </div>
            <div class="login__section-2">
                <button class="login__submit login__button" type="submit">Submit</button>
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