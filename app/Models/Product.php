<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Weight',
        'Number',
        'Image'
    ];

    public function getImage()
    {
        return asset('app/public/images/'.$this->Image);
    }
}
