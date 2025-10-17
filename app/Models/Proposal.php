<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $primaryKey = 'P_id';
    protected $table = 'proposals';
    protected $fillable = ['G_id', 'J_id', 'P_coverletter', 'P_status', 'worksubmit', 'rating'];
    public function gig()
    {
        return $this->belongsTo(Gigss::class, 'G_id', 'G_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'J_id', 'J_id');
    }
}
