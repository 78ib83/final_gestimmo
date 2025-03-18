<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenances extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'libelle',
        'properties_id'
    ];
    public function payments() {
        return $this->belongsTo(Properties::class);
    }
}
