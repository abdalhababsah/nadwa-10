<?php

namespace App\Models;

use App\Enums\CategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = ['category', 'title', 'description', 'image_path', 'order'];

    protected $casts = [
        'category' => CategoryEnum::class,
    ];
    
    //Relationships
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}