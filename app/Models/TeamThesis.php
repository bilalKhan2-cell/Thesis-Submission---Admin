<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamLead;
use App\Models\Supervisor;
use Laravel\Sanctum\HasApiTokens;

class TeamThesis extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'team_thesis';
    protected $fillable = ['team_id', 'supervisor_id', 'thesis_file', 'comments', 'thesis_status', 'project_title', 'project_description'];

    public function team()
    {
        return $this->belongsTo(TeamLead::class,'team_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class,'supervisor_id');
    }

    public function teamThesis()
    {
        return $this->hasMany(TeamThesis::class, 'team_id');
    }
}

?>