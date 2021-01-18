<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function image()
    {
    	if($this->image!=null)
    		return '/storage/images/'.$this->image;
    	return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function banner()
    {
    	if($this->banner!=null)
    		return '/storage/banners/'.$this->banner;
    	return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function partner_features()
    {
    	return $this->hasMany('\App\Models\PartnerFeature');
    }
    public function getRouteKeyName()
    {
    	return 'id';
    }
}
