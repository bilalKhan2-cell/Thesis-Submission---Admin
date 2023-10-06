<?php

namespace App\Livewire\TeamLead;

use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\TeamLead;
use App\Models\Department;

class Edit extends Component
{
    public $department, $members = [], $team_id;

    public $team_department, $name, $email, $contactinfo, $cnic, $fname, $gender, $address, $rollno, $project_id;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'contactinfo' => 'required|numeric',
        'cnic' => 'required|numeric',
        'address' => 'required',
        'fname' => 'required',
        'gender' => 'required',
        'rollno' => 'required',
        'project_id' => 'required',
        'team_department' => 'required|numeric'
    ];

    public function mount($id)
    {
        $this->team_id = $id;
        $this->getTeamAndMembersById();
        $this->department = Department::all(['*']);
    }

    private function getTeamAndMembersById()
    {
        $team = TeamLead::find($this->team_id);

        if (!$team) {
            $this->redirectRoute('teams.index');
        } else {
            $this->name = $team->name;
            $this->fname = $team->fname;
            $this->email = $team->email;
            $this->contactinfo = $team->contactinfo;
            $this->cnic = $team->cnic;
            $this->project_id = $team->project_id;
            $this->rollno = $team->rollno;
            $this->address = $team->address;
            $this->gender = $team->gender;
            $this->team_department = $team->department;

            $members = TeamMember::where('team_id',$this->team_id)->get();
            
            foreach($members as $key=>$value) {
                $this->members[$key]['name'] = $value['name'];
                $this->members[$key]['rollno'] = $value['rollno'];
            }
        }
    }

    public function addMember()
    {
        $this->members[] = ['member_name' => '', 'member_rollno' => ''];
    }

    public function removeMember($index)
    {
        unset($this->members[$index]);
    }

    public function render()
    {
        return view('livewire.team-lead.edit')
        ->layout('components.layouts.app',['title'=>'Edit Teams Data']);
    }

    public function UpdateTeam()
    {
        $this->validate();

        $team = TeamLead::where('id', $this->team_id);

        $new_record = $team->update([
            'name' => $this->name,
            'fname' => $this->fname,
            'rollno' => $this->rollno,
            'project_id' => $this->project_id,
            'gender' => $this->gender,
            'address' => $this->department,
            'contactinfo' => $this->contactinfo,
            'cnic' => $this->cnic,
            'email' => $this->email,
            'department' => $this->team_department
        ]);

        if ($new_record) {

            TeamMember::where('team_id', $this->team_id)->delete();

            $recs = [];
            foreach ($this->members as $key => $value) {
                $recs[] = [
                    'name' => ucfirst($value['name']),
                    'rollno' => strtoupper($value['rollno']),
                    'team_id' => $this->team_id
                ];
            }

            DB::table('team_members')->insert($recs);

            session()->flash('team-update', "Team Record(s) of ID Team-{{$this->team_id}} Updated Successfully..");
            $this->redirectRoute('teams.index');
        }
    }
}

?>