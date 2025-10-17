<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gigss extends Model
{
    use HasFactory;
    protected $primaryKey = 'G_id';
    protected $table = 'gigs';
    protected $fillable = ['FS_id', 'FCat_id', 'G_title', 'G_description', 'G_price', 'G_status', 'G_image'];

    public function freelanceSeller()
    {
        return $this->belongsTo(FreelanceSeller::class, 'FS_id', 'FS_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'G_id', 'G_id');
    }
    public function freelancecategory()
    {
        return $this->belongsTo(freelanceCategory::class, 'FCat_id', 'FCat_id');
    }
}
