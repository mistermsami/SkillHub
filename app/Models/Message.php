<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $primaryKey = 'M_id';
    protected $table = 'messages';
    protected $fillable = ['sender_id', 'receiver_id', 'message_content'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'GU_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'GU_id');
    }
}
