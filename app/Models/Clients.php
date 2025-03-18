<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'nom',
        'genre',
        'telephone',
        'email',
        'addresses_id',
        'properties_id',
        'contrats_id',
    ];
    
    public function addresses() {
        return $this->belongsTo(Addresses::class);
    }
    public function properties() {
        return $this->belongsTo(Properties::class);
    }/*
    public function calendriers() {
        return $this->belongsTo(Calendrier::class);
    }*/
    public function contrats() {
        return $this->belongsTo(Contrats::class);
    }
}
