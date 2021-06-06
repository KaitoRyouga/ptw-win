<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class User extends Model {
    protected $guarded = [];
    protected $table = "users";
}