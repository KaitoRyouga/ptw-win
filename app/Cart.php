<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model {
    protected $guarded = [];
    protected $table = "carts";
}