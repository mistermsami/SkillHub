<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'C_id';
    protected $fillable = ['FS_id', 'C_title', 'C_description', 'C_image', 'C_price', 'CC_id'];

    public function author()
    {
        return $this->belongsTo(freelanceSeller::class, 'FS_id', 'FS_id');
    }
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'CC_id', 'CC_id');
    }
}
