<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'type',
        'libelle',
        'prix',
        'etat',
        'addresses_id',

    ];
    public function addresses(){
        return $this->belongsTo(Addresses::class);
    }
}
