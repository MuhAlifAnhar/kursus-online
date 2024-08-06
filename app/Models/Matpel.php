<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    use HasFactory;
    protected $table = "matpel";
    protected $guarded = [
        'id'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_guru');
    // }

    public function materis()
    {
        return $this->hasMany(Materi::class, 'id_matpel');
    }
}
