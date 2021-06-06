<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Address;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminAuthController
{

    public function indexLogin()
    {
        Blade::render('auth/login');
    }

    public function indexRegister()
    {
        Blade::render('auth/register');
    }

    public function login()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === "" || $password === "") {
            echo "<script>alert('Missing!'); window.location = '/login';</script>";
        } else {

            if (isset($_POST["code"])) {
                $code = $_POST["code"];
                $user = DB::table("users")
                    ->where(['username' => $username, 'password' => md5($password), 'code' => $code])
                    ->get();
            } else {
                $user = DB::table("users")
                    ->where(['username' => $username, 'password' => md5($password)])
                    ->get();
            }
            if (count($user) !== 0) {
                if (isset($_POST["code"])) {
                    $_SESSION['code'] = $user[0]->code;
                }
                $_SESSION['username'] = $user[0]->username;
                $_SESSION['userId'] = $user[0]->userId;
                if ($user[0]->permission === "user") {
                    echo "<script>alert('Login success!'); window.location = '/';</script>";
                }
            } else {
                echo "<script>alert('Wrong username/password!'); window.location = '/login';</script>";
            }
        }
    }

    public function register()
    {

        if (isset($_POST["code"])) {
            $code = $_POST["code"];
        } else {
            $code = null;
        }
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $email = $_POST["email"];



        if ($username === "" || $password === "" || $repassword === "" || $email === "") {
            echo "<script>alert('Missing!'); window.location = '/register';</script>";
        } elseif (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $username)) {
            echo "<script>alert('Tên user name không hợp lệ!'); window.location = '/register';</script>";
        } elseif (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)) {
            echo "<script>alert('Mật khẩu phải có ít nhất 8 ký tự, có chữ hoa, chữ thường và số!'); window.location = '/register';</script>";
        } else {

            if ($password === $repassword) {
                $getOldUser = DB::table("users")
                    ->where('username', $username)
                    ->get("username");

                if (count($getOldUser) === 0) {

                    $user = new User();
                    $user->code = $code;
                    $user->username = $username;
                    $user->password = md5($password);
                    $user->permission = "user";
                    $user->email = $email;

                    $user->save();

                    echo "<script>alert('Đăng ký thành công'); window.location = '/login';</script>";
                } else {
                    echo "<script>alert('Duplicate username!'); window.location = '/register';</script>";
                }
            } else {
                echo "<script>alert('Password don\'t match!'); window.location = '/register';</script>";
            }
        }
    }

    public function logout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["userId"]);
        unset($_SESSION['code']);
        echo "<script>window.location = '/';</script>";
    }

    public function changePass($id)
    {
        Blade::render('user/info/change');
    }

    public function createToken()
    {
        if (isset($_POST["email"])) {

            $email = $_POST["email"];

            $user = User::where("email", $email)->first();

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $rand_chars = rand();
            $token = md5(str_shuffle($permitted_chars) . $rand_chars);

            if (isset($user)) {
                User::where('email', $email)
                    ->update([
                        'token' => $token,
                    ]);

                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                // $mail->SMTPDebug  = 1;
                $mail->SMTPAuth   = TRUE;
                $mail->SMTPSecure = "tls";
                $mail->Port       = 587;
                $mail->Host       = "smtp.gmail.com";
                $mail->Username   = "Lephuc010899@gmail.com";
                $mail->Password   = "Liarliar123123";
                $mail->IsHTML(true);
                $mail->AddAddress($user->email, $user->username);
                $mail->SetFrom("Lephuc010899@gmail.com", "Reset Password");
                $mail->Subject = "Reset Password";
                $content = '
                        <html>
                            <body>
                                <center>
                                    <p>
                                        <a href="https://ptw.devf.tech/reset-pass/' . $token . '" 
                                        style="background-color:#ffbe00; color:#000000; display:inline-block; padding:12px 40px 12px 40px; text-align:center; text-decoration:none;" 
                                        target="_blank">Reset Password Now</a>
                                    </p>
                                </center>
                            </body>
                        </html>
                    ';

                $mail->MsgHTML($content);
                $mail->Send();
            }
        }
        header("Location: /");
    }

    public function resetPass($id)
    {
        $token = $id["token"];
        $user = User::where("token", $token)->first();
        if (isset($user)) {
            Blade::render('user/info/reset', compact('user', 'token'));
        } else {
            echo "<script>alert('Invalid!'); window.location = '/';</script>";
        }
    }

    public function updatePass($id)
    {

        $password = $_POST['password'];
        $token = $_POST['token'];
        $repassword = $_POST['repassword'];

        if ($password === "" || $repassword === "") {
            echo "<script>alert('Missing!'); window.location = '/change-pass/" . $id['userId'] . "';</script>";
        } else {

            if ($password === $repassword) {
                $getToken = DB::table("users")
                    ->where('userId', $id['userId'])
                    ->get("token");

                if ($getToken[0]->token === $token) {
                    DB::table('users')
                        ->where('userId', $id['userId'])
                        ->update(['password' => md5($password)]);

                    $_SESSION['success'] = "edit";
                    header('Location: /');
                } else {
                    echo "<script>alert('Wrong token!'); window.location = '/';</script>";
                }
            } else {
                echo "<script>alert('Password don\'t match!'); window.location = '/reset-pass/" . $token . "';</script>";
            }
        }
    }
}
