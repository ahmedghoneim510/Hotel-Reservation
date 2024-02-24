<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable= ['hotel_id', 'name', 'image', 'max_person', 'size', 'view', 'price','num_beds'];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
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
