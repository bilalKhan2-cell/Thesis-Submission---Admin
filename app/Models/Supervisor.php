<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AssignSupervisor;

class Supervisor extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['name', 'gender', 'department', 'email', 'cnic'];

    public function dept()
    {
        return $this->belongsTo(Department::class, 'department');
    }

    public function teams()
    {
        return $this->hasMany(AssignSupervisor::class);
    }

    public function teamThesis()
    {
        return $this->hasMany(TeamThesis::class, 'supervisor_id');
    }
}

?>