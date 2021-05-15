<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = [
        'amount' => 'integer',
    ];

    public function user()
    {
    	return $this->belongsTo('\App\Models\User');
    }
    public function order()
    {
    	return $this->belongsTo('\App\Models\Order');
    } 
    
}
