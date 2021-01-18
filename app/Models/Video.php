<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{ 
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];





    
    /*'cost_type'=>"required|in:FREE,PAID",
    'type'=>"required|in:LIVE,RECORDED,OFFLINE", */
}
