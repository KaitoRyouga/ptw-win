<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Category;
use App\User;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminCategoryController extends Controller
{
    /**
     * @function index()
     * List All data from database
     */
    public function index()
    {
        $categories = Category::all();
        Blade::render('categories/index', compact('categories'));
    }
    /**
     * @function create()
     * View form create
     * Type data : Array
     */
    public function create()
    {
        Blade::render('categories/add');
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     */
    public function store()
    {
        $name = $_POST['name'];

        if ($name === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-category';</script>";
        } else {
            $category = new Category();
            $category->name = $name;

            $category->save();
            $_SESSION['success'] = "add";
            header('Location: /admin/categories');
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
        $category = DB::table("categories")
            ->where('catId', $id['catId'])
            ->get();

        Blade::render('categories/edit', compact('category'));
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
        $name = $_POST['name'];

        if ($name === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/edit-category/" . $id['catId'] . "';</script>";
        } else {

            DB::table('categories')
                ->where('catId', $id['catId'])
                ->update(['name' => $name]);

            $_SESSION['success'] = "edit";
            header('Location: /admin/categories');

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
        DB::table('categories')
            ->where('catId', $id['catId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /admin/categories');
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
}
