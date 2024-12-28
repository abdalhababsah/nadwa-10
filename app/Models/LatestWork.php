<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestWork extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = ['category', 'title', 'description', 'image_path'];

    /**
     * Get the category that owns the work.
     */

}