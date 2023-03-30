<?php

namespace App\Models;

use App\Models\User;
use App\Models\Itineraire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItineraireChauffeur extends Model
{
    use HasFactory;
    public function Itineraire()
    {
        return $this->belongsTo(Itineraire::class);
    }
    public function Chauffeur()
    {
        return $this->belongsTo(User::class);
    }
}
