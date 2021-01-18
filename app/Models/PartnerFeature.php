<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerFeature extends Model
{

    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function partner()
    {
    	return $this->belongsTo('\App\Models\Partner');
    }
    public function getRouteKeyName()
    {
    	return 'id';
    }
}
