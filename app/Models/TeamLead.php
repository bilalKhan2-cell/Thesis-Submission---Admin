<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\TeamMember;
use App\Models\AssignSupervisor;
use Laravel\Sanctum\HasApiTokens;

class TeamLead extends Model
{
    use HasFactory, HasApiTokens;
    
    protected $table = 'team_leads';
    
    protected $fillable = ['name','fname','age','gender','email','cnic','rollno','batch','department','contactinfo','project_id','address','batch'];
    
    public function departments(){
        return $this->belongsTo(Department::class,'department');
    }

    public function members(){
        return $this->hasMany(TeamMember::class,'team_id');
    }

    public function supervisor(){
        return $this->hasOne(AssignSupervisor::class,'team_id');
    }

    public function assignsupervisor(){
        return $this->hasOne(AssignSupervisor::class,'team_id');
    }

    public function thesis(){
        return $this->hasOne(TeamThesis::class,'team_id');
    }
}

?>