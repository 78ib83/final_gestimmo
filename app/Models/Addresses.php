<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'pays',
        'ville',
        'quartier',
        'rue',
        'porte',
    ];
    /*
    public function clients() {
        return $this->belongsTo(Clients::class);
    }
    public function users() {
        return $this->belongsTo(User::class);
    }*/
}
