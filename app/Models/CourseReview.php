<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function course()
    {
    	return $this->belongsTo('\App\Models\Course');
    }
    public function user()
    {
    	return $this->belongsTo('\App\Models\User');
    }
}
