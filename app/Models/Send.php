<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Send extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'sends';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
    
    public function prisoner()
    {
        return $this->belongsTo(Prisoner::class, 'id_prisoner');
    }

}
