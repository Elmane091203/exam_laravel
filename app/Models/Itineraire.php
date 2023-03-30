<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itineraire extends Model
{
    use HasFactory;
    protected $fillable = [
        'depart_id',
        'arrivee_id',
        'distance',
        'tarif',
    ];
    public function depart()
    {
        return $this->belongsTo(Position::class);
    }
    public function arrivee()
    {
        return $this->belongsTo(Position::class);
    }
}
