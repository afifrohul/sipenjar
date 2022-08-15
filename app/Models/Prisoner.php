<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Prisoner extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'prisoners';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'no_regis', 'enter_date', 'room', 'case'];

    public function send()
    {
        return $this->hasMany(Send::class, 'id_prisoner');
    }
}
