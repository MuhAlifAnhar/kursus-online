<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $guarded = [
        'id'
    ];

    // public function quiz()
    // {
    //     return $this->belongsTo(Quiz::class, 'id_quiz');
    // }

    // public function matpel()
    // {
    //     return $this->belongsTo(Matpel::class, 'id_matpel');
    // }
}