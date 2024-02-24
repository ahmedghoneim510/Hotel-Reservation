<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'apartment_id',
        'user_id',
        'email',
        'phone',
        'check_in',
        'check_out',
        'total_nights',
        'total_price',
        'status',
    ];
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
