<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'height', 'weight', 'hobby', 'job', 'photo'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
