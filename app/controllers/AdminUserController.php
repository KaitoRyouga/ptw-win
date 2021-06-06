<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Address;
use App\User;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminUserController extends Controller
{
    /**
     * @function index()
     * List All data from database
     */
    public function index()
    {
        $users = User::all();

        Blade::render('users/index', compact('users'));
    }
    /**
     * @function create()
     * View form create
     * Type data : Array
     */
    public function create()
    {
        Blade::render('users/add');
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     */
    public function store()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $permission = "user";

        if ($username === "" || $password === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-user';</script>";
        } else {
            $user = new User();
            $user->username = $username;
            $user->password = $password;
            $user->permission = $permission;

            $user->save();
            $_SESSION['success'] = "add";
            header('Location: /admin/users');
        }
    }
    /**
     * @function show()
     * Get detail a data in database
     * Type id : number
     * Get id from URl
     */
    public function show($id)
    {
        $user = DB::table("users")
            ->where(['users.userId' => $id['userId']])
            ->get();

        Blade::render('users/edit', compact('user'));
    }
    /**
     * @function update()
     * Update data with id to database
     * Type id :number
     * Get id from URL
     * Type data : Array
     */
    public function update($id)
    {
        $username = $_POST['username'];
        $permission = "user";
        $summary = $_POST['summary'];
        $email = $_POST['email'];
        $experience = $_POST['experience'];
        $education = $_POST['education'];
        $work = $_POST['work'];
        $imgSrc = $_POST['imgSrc'];


        if ($username === "" || $permission === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/edit-user/" . $id['userId'] . "';</script>";
        } else {

            DB::table('users')
                ->where('userId', $id['userId'])
                ->update([
                    'username' => $username,
                    'permission' => $permission,
                    'summary' => $summary,
                    'email' => $email,
                    'experience' => $experience,
                    'education' => $education,
                    'work' => $work,
                    'imgSrc' => $imgSrc
                ]);

            $_SESSION['success'] = "edit";
            header('Location: /admin/users');
        }
    }
    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id)
    {
        DB::table('users')
            ->where('userId', $id['userId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /admin/users');
    }
    public function search()
    {
    }
    public function check()
    {
    }
    public function changeStatus($id)
    {
    }

    public function changePassword($id)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $oldpassword = $_POST['oldpassword'];

        if ($username === "" || $password === "" || $repassword === "" || $oldpassword === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/edit-user/" . $id['userId'] . "';</script>";
        } else {

            if ($password === $repassword) {
                $getOldPass = DB::table("users")
                    ->where('userId', $id['userId'])
                    ->get("password");

                if ($getOldPass[0]->password === md5($oldpassword)) {
                    DB::table('users')
                        ->where('userId', $id['userId'])
                        ->update(['username' => $username, 'password' => md5($password)]);

                    $_SESSION['success'] = "edit";
                    header('Location: /admin/users');
                } else {
                    echo "<script>alert('Wrong password!'); window.location = '/admin/edit-user/" . $id['userId'] . "';</script>";
                }
            } else {
                echo "<script>alert('Password don\'t match!'); window.location = '/admin/edit-user/" . $id['userId'] . "';</script>";
            }
        }
    }
}
