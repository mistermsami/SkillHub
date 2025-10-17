<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelanceSeller extends Model
{
    use HasFactory;
    protected $primaryKey = 'FS_id';
    protected $table = 'freelanceSellers';
    protected $fillable = ['GU_id', 'FS_about', 'FS_role', 'FS_hourlyrate', 'FS_skills'];

    public function user()
    {
        return $this->belongsTo(User::class, 'GU_id', 'GU_id');
    }

    public function gigs()
    {
        return $this->hasMany(Gigss::class, 'FS_id', 'FS_id');
    }
}
