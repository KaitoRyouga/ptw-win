<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(BASE_URL . 'admin/css/login.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Nhà tuyển dụng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Sinh viên</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form class="login" action="/login" method="post">
                <label for="login__username">username</label>
                <input type="text" name="username" id="login__username" required />
                <label for="login__password">password</label>
                <input type="password" name="password" id="login__password" required />
                <div class="login__section">
                    <a href="/change-pass" class="login__new-password">Forgot password?</a>
                </div>
                <div class="login__section-2">
                    <a href="/register" class="login__register login__button">register</a>
                    <button class="login__submit login__button" type="submit">login</button>
                </div>

            </form>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form class="login" action="/login" method="post">
                <label for="login__username">ID</label>
                <input type="text" name="code" id="login__username" required />
                <label for="login__username">username</label>
                <input type="text" name="username" id="login__username" required />
                <label for="login__password">password</label>
                <input type="password" name="password" id="login__password" required />
                <div class="login__section">

                </div>
                <div class="login__section-2">
                    <a href="/register" class="login__register login__button">register</a>
                    <button class="login__submit login__button" type="submit">login</button>
                </div>

            </form>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views/auth/login.blade.php ENDPATH**/ ?>