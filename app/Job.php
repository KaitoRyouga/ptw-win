<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class Job extends Model {
    protected $guarded = [];
    protected $table = "jobs";
}