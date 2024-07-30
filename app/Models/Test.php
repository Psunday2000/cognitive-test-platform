<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
    ];

    /**
     * Get the questions for the test.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
