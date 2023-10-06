<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamLead;
use App\Models\Supervisor;
use Laravel\Sanctum\HasApiTokens;

class AssignSupervisor extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['team_id','supervisor_id'];

    public function team(){
        return $this->belongsTo(TeamLead::class);
    }

    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }
}

?>