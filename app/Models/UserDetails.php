<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserDetails extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'user_details';
    protected $primaryKey = 'id';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
