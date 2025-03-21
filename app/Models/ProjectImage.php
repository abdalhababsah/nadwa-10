<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProjectImage extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            // Delete the file from storage when the image record is deleted
            if (!is_null($image->image) && $image->image !== '') { 
                Storage::disk('public')->delete($image->image); 
            }
        });
    }

    //Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
