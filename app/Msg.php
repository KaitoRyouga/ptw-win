<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class Msg extends Model {
    protected $guarded = [];
    protected $table = "messages";
}