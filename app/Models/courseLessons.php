<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseLessons extends Model
{
    use HasFactory;

    protected $table = 'course_lessons';
    protected $primaryKey = 'CL_id';
    protected $fillable = ['C_id', 'CL_videopath', 'CL_lessonname'];
}
