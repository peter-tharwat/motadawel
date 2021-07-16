<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohallel extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function image()
    {
        if($this->image!=null)
            return env('AWS_URL').'/uploads/mohallel/'.$this->image;
        return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
}
