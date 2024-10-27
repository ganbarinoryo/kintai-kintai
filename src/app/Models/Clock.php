<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clock extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'clock_in', 'clock_out', 'is_active'];
    
    // usersテーブルとのリレーション設定
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}