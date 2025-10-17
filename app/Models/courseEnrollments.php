<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseEnrollments extends Model
{
    use HasFactory;

    protected $table = 'course_enrollments';
    protected $primaryKey = 'CE_id';
    protected $fillable = ['EL_id', 'C_id', 'CE_status'];

    public function courses()
    {
        return $this->belongsTo(Courses::class, 'C_id', 'C_id');
    }
}
