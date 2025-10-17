<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $primaryKey = 'J_id';
    protected $table = 'freelancejobs';
    protected $fillable = ['FB_id', 'J_title', 'J_description', 'J_budget', 'J_status'];

    public function freelanceBuyer()
    {
        return $this->belongsTo(FreelanceBuyer::class, 'FB_id', 'FB_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'J_id', 'J_id');
    }
}
