<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eLearning extends Model
{
    use HasFactory;

    protected $primaryKey = 'EL_id';
    protected $table = 'eLearnings';
    protected $fillable = [
        'GU_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'GU_id', 'GU_id');
    }
}

