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
    		return 'https://chartidea-production-public.s3.eu-west-3.amazonaws.com/images/'.$this->image;
    	return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function banner()
    {
    	if($this->banner!=null)
    		return 'https://chartidea-production-public.s3.eu-west-3.amazonaws.com/banners/'.$this->banner;
    	return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function partner_features()
    {
    	return $this->hasMany('\App\Models\PartnerFeature');
    }
    public function partner_links()
    {
        return $this->hasMany('\App\Models\PartnerLink');
    }
    public function getRouteKeyName()
    {
    	return 'id';
    }
}
