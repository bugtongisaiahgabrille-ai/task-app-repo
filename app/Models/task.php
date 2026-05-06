<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $fillable = ['title', 'is_done'];

    // ✅ ADD THIS RELATIONSHIP
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}