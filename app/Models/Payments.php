<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'libelle',
        'properties_id',
        'maintenances_id',
        'montant',
    ];
    public function properties() {
        return $this->belongsTo(Properties::class);
        
    }public function maintenances() {
        return $this->belongsTo(Maintenances::class);
        
    }
}
