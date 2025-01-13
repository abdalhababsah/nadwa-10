<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestWork extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = ['category', 'title', 'description', 'image_path'];

    //Relationships
    public function images()
    {
        return $this->hasMany(LatestWorkImage::class);
    }
}