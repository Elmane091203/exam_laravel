<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'region_id',
    ];
    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
    public function Villes()
    {
        return $this->hasMany(Position::class);
    }
}
