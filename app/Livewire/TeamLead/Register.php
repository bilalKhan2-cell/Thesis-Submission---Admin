<?php

namespace App\Livewire\TeamLead;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Mail\LeadMail;
use App\Models\TeamLead;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Department;

class Register extends Component
{
    public $department, $members = [];

    public $team_department, $name, $email, $contactinfo, $cnic, $fname, $gender, $address, $rollno, $project_id;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:team_leads,email',
        'contactinfo' => 'required|numeric',
        'cnic' => 'required|numeric|unique:team_leads,cnic',
        'address' => 'required',
        'fname' => 'required',
        'gender' => 'required',
        'rollno' => 'required',
        'project_id' => 'required',
        'team_department' => 'required|numeric'
    ];

    public function mount()
    {
        $this->department = Department::all();
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
        return view('livewire.team-lead.register')
            ->layout('components.layouts.app', ['title' => 'Create FYPs Team']);
    }

    public function RegisterTeam()
    {
        $this->validate();

        $team = new TeamLead();

        $team->name = strtoupper($this->name);
        $team->fname = ucwords($this->fname);
        $team->gender = $this->gender;
        $team->email = $this->email;
        $team->address = $this->address;
        $team->contactinfo = $this->contactinfo;
        $team->cnic = $this->cnic;
        $team->rollno = strtoupper($this->rollno);
        $team->project_id = strtoupper($this->project_id);
        $team->pass_key = 0;
        $team->is_first_login = 1;
        $team->batch = date('Y') - 3;
        $team->department = $this->team_department;
        $team->age = 0;

        if ($team->save()) {

            $id = $team->id;

            $recs = [];
            foreach ($this->members as $key => $value) {
                $recs[] = [
                    'name' => ucfirst($value['name']),
                    'rollno' => ucwords($value['rollno']),
                    'team_id' => $id
                ];
            }

            DB::table('team_members')->insert($recs);
            $this->SendMail($id);

            session()->flash('team-success', 'Team Created Successfully..');
            $this->redirectRoute('teams.index');
        }
    }

    public function SendMail($uid)
    {
        $team_lead_data = TeamLead::where('id', $uid)->first();

        $pass = Str::random(10);

        TeamLead::where('id', $uid)->update(['pasword' => $pass]);

        $emailContent = view('LeadMail', compact('team_lead_data', 'pass'));

        $mail = Mail::to($team_lead_data->email)->send(new LeadMail($emailContent));
    }
}

?>