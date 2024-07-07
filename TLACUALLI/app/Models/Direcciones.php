<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_ext',
        'num_int',
        'id_calle'
    ];

    public function calles() 
    {
        return $this->hasOne(Calles::class, 'id', 'id_calle');
    }
}
