<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelanceBuyer extends Model
{
    use HasFactory;

    protected $primaryKey = 'FB_id';
    protected $table = 'freelance_buyers';
    protected $fillable = ['GU_id', 'GU_about'];
    public function user()
    {
        return $this->belongsTo(User::class, 'GU_id', 'GU_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'FB_id', 'FB_id');
    }
}
