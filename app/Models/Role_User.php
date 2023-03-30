<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    use HasFactory;
    protected $table = 'role_user';
    
    protected $fillable = [
        'role_id',
        'user_id',
        'user_type',
    ];
    public function getRole()
    {
        return $this->belongsTo('Role');
    }
    public function getUser()
    {
        return $this->belongsTo('User');
    }
}
