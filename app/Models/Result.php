<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'test_id', 'score', 'test_attempts',
    ];

    /**
     * Get the user that owns the result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
