<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Department extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = ['name', 'description'];
    public function supervisors()
    {
        return $this->hasMany(Supervisor::class,'department');
    }
}

?>