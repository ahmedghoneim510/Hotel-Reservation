<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'description', 'image'];
    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
    public function getImageUrlAttribute(){ // when we use it product->image_url
        if(!$this->image){
            return 'https://smithcodistributing.com/wp-content/themes/hello-elementor/assets/default_product.png';
        }
        if(str::startsWith($this->image,['https://','http://']))
        {
            return $this->image;
        }
        return asset('storage/'.$this->image);

    }
}
