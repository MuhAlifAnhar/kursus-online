<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizs";
    protected $guarded = [
        'id'
    ];

    // public function materi()
    // {
    //     return $this->hasMany(Materi::class, 'id_quiz');
    // }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'guru_id');
    // }
    
}
