<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignSupervisor;
use App\Models\Department;
use App\Models\Supervisor;
use App\Models\TeamLead;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\TeamThesis;
use Exception;

class TeamController extends Controller
{
    public function upload_thesis(Request $request)
    {
        $team_thesis = new TeamThesis();

        $record = $team_thesis->where('team_id', $request->team_id)->exists();

        if ($record) {
            $result = $team_thesis->where('team_id', $request->team_id)->update([
                'supervisor_id' => $request->supervisor_id,
                'thesis_file' => $request->thesis_file,
                'project_title' => $request->project_title,
                'project_description' => $request->project_description,
                'thesis_status' => 0
            ]);

            if ($result) {
                return response()->json(['data' => '1']);
            }
        } else {
            $team_thesis->team_id = $request->team_id;
            $team_thesis->supervisor_id = $request->supervisor_id;
            $team_thesis->thesis_file = $request->thesis_file;
            $team_thesis->thesis_status = 0;
            $team_thesis->project_title = $request->project_title;
            $team_thesis->project_description = $request->project_description;
            $team_thesis->is_edit_allowed = 0;

            if ($team_thesis->save()) {
                return response()->json(['data' => '1']);
            }
        }
    }

    public function thesis_remarks(Request $request)
    {
        $data = TeamThesis::where('team_id', $request->team_id)->with('supervisor', function ($qry) {
            return $qry->select('id', 'name');
        })->first();

        if ($data) {
            return response()->json(['data' => $data]);
        }
    }

    public function fetch_result(Request $request)
    {
        $data = TeamThesis::with(['supervisor' => function ($query) {
            return $query->select('id', 'name');
        }])->where('team_id', $request->team_id)->first();
        return response()->json(['records' => $data]);
    }

    public function get_member_team_info(Request $request)
    {
        try {
            $team_member_details = [];
            $team_member_team_id = TeamMember::where('rollno', $request->roll_no)->first(['team_id']);

            $team_lead_data = TeamLead::where('id', $team_member_team_id->team_id)->first(['name', 'email', 'id', 'department']);
            $supervisor_id = AssignSupervisor::where('team_id', $team_member_team_id->team_id)->first(['supervisor_id']);

            $team_supervisor_data = Supervisor::where('id', $supervisor_id->supervisor_id)->first(['name', 'email', 'id']);
            $thesis_details = TeamThesis::where('team_id', $team_member_team_id->team_id)->first(['thesis_file', 'thesis_status', 'comments', 'marks', 'project_title']);

            $department_data = Department::where('id', $team_lead_data->department)->first(['name']);

            $team_member_details[0] = $team_lead_data;
            $team_member_details[1] = $team_supervisor_data;
            $team_member_details[2] = $thesis_details;
            $team_member_details[3] = $department_data;

            return json_encode($team_member_details);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}

?>