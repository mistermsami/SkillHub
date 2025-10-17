<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelanceCategory extends Model
{
    use HasFactory;
    protected $table = 'freelance_categories';
    protected $primaryKey = 'FCat_id';
    protected $fillable = ['FCat_name'];
}
