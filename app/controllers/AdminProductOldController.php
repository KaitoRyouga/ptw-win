<?php
namespace App\controllers;
use App\Blade\Blade;
use App\database\Database;
use App\Product;
use App\Category;
use App\Product_Tag;
use App\Tag;
use Illuminate\Support\Facades\DB;
new Database;
class AdminProductController extends Controller
{
    /**
     * @function index()
     * List All data from database
     * Example : Product::all()
     */
    public function index(){
        if(!$_SESSION['user']['id']) {
            header('location: /login');
        }
        $products= Product::all();
        $category= Category::all();
        $tag= Tag::all();
        $product_tag = Product_Tag::all(); 

        
        // SELECT * FROM products ; lay du lieu tu bang products
        Blade::render('products/index', compact('products','category','tag','product_tag'));
    }
    /**
     * @function create()
     * View form create
     * Type data : Array
     * Example :
     */
    public function create(){
        $category = Category::all();
        $tag = Tag::all();
        Blade::render('products/add',compact('category','tag'));
        
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store(){
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $tag = $_POST['tag'];
        if($name=="" | $category_id=="" | $tag=="") {
           echo "<script>alert('Không được để tên, họ và email rỗng!'); window.location = '/them-san-pham';</script>";
           die();
        } 
        

            if(is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
                $image_src=  uploadFile($_FILES['imgupload'], 'product');
                {
                    $products = new Product();
                    $products->name = $name;
                    $products->category_id= $category_id;
                    $products->img = $image_src;
                    $products->save();//INSERT INTO products ...
                    foreach($tag as $t){
                        $product_tag = new Product_Tag();
                        $product_tag->product_id = $products->id;
                        $product_tag->tag_id=$t;
                        $product_tag->save();
                    }
                }
            }  else {
                $products = new Product();
                $products->name = $name;
                $products->category_id= $category_id;
                $products->save();//INSER
                foreach($tag as $t){
                    $product_tag = new Product_Tag();
                    $product_tag->product_id = $products->id;
                    $product_tag->tag_id=$t;
                    $product_tag->save();
                }
            }   
            $_SESSION['success']="add";
            header('location: /danh-sach-san-pham');


        }
    
    
    /**
     * @function show()
     * Get detail a data in database
     * Type id : number
     * Get id from URl
     * Example : Product::find($id)
     */
    public function show($id){
        $product = Product::find($id['id']);
        $tag = Tag::all();
        $product_tag = Product_Tag::all(); 
        $category = Category::all();
        Blade::render('products/edit', compact('product','category','tag','product_tag'));
    }
    /**
     * @function update()
     * Update data with id to database
     * Type id :number
     * Get id from URL
     * Type data : Array
     * Example : Product::find($id)->update($data)
     */
    public function update($id){
        $product = Product::find($id['id']); // SELECT * FROM products where id=$id;
        $product->category_id =$_POST['category_id'];
        $product->name = $_POST['name'];
        $product->save();
        if ($product) {
            //  Gắn tags
            $tags = $_POST["tags"];
            if (!empty($tags)) {
                //  Lấy tag đã tồn tại
                $Producttag = Product_Tag::where('product_id', $product->id)->get();
                $selected_tags = [];
                if (!$Producttag->isEmpty()) {
                    foreach ($Producttag as $tag) {
                        $selected_tags[$tag->tag_id] = $tag->tag_id;
                    }
                }

                foreach ($tags as $tag_id) {
                    //  Kiểm tra nếu có rồi thì bỏ qua
                    $Producttag = Product_Tag::where('product_id', $product->id)->where('tag_id', $tag_id)->get();
                    //  Insert thêm vào nếu chưa có
                    if ($Producttag->isEmpty()){
                        Product_Tag::create([
                            'product_id' => $product->id,
                            'tag_id' => $tag_id
                        ]);
                    }
                    unset($selected_tags[$tag_id]);
                }
                //  Loại bỏ tag thừa
                if (!empty($selected_tags)){
                    $arr = [];
                    foreach ($selected_tags as $v) {
                        $arr[] = $v;
                    }
                    Product_Tag::where('product_id', $product->id)->whereIn('tag_id', $arr)->delete();
                }
            }else{
                // trường hợp mà không chọn tag nào thì xóa hết các liên kết
                Product_Tag::where('news_id', $product->id)->delete();  
            }
            header('Location:/danh-sach-san-pham');
        } else {
            echo "<script>alert('Sửa tin thất bại'); window.location= '/superFood_MVC/admin/news';</script>";
        }
        if(is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
            $image_src=  uploadFile($_FILES['imgupload'], 'product');
            $product->img = $image_src;
            $product->save();
        }
        $_SESSION['success']="edit";
        header('Location: /danh-sach-san-pham');
    }
    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id){
        $product = Product::find($id['id']);
        deleteFile($product->img);
        Product::destroy($id['id']); //DELETE * FROM products where id=$id
        $_SESSION['success']="delete";
        header('Location: /danh-sach-san-pham');
    }
    public function search(){

    }
    public function check(){}
    public function changeStatus($id) {

    }
}
