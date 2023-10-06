<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignSupervisor;
use App\Models\TeamLead;
use App\Models\TeamThesis;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function get_supervisor(Request $request)
    {
        $data = AssignSupervisor::with([
            'supervisor' => function ($query) {
                $query->select('id', 'name', 'email');
            }
        ])->where('team_id', $request->team_id)->first();

        $existing_thesis = TeamThesis::where('team_id', $request->team_id)->exists();

        if ($existing_thesis) {
            $thesis_records = TeamThesis::where('team_id', $request->team_id)->first();
        } else {
            $thesis_records = [];
        }


        return response()->json(['data' => $data, 'exists' => $thesis_records]);
    }

    public function dashboard(Request $request)
    {
        $data = AssignSupervisor::withCount('team')->where('supervisor_id', $request->supervisor_id)->get();

        if ($data) {
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['data' => '0']);
        }
    }

    public function get_thesis(Request $request)
    {
        $data = TeamThesis::with([
            'team' => function ($query) {
                $query->select('id', 'name', 'rollno', 'email');
            }
        ])->where('supervisor_id', $request->supervisor_id)->get();

        if ($data->count() > 0) {
            return response()->json(['thesis_list' => $data]);
        } else {
            return response()->json(['thesis_list' => []]);
        }
    }

    public function process_thesis(Request $request)
    {
        $team_id = $request->team_id;

        $data = TeamThesis::with([
            'team' => function ($query) {
                $query->select('id', 'name', 'rollno', 'email');
            }
        ])->where('team_id', $team_id)->first();

        if ($data->count() > 0) {
            return response()->json(['team_thesis' => $data]);
        } else {
            return response()->json(['team_thesis' => []]);
        }
    }

    public function process_thesis_data(Request $request)
    {
        $data = TeamThesis::where('team_id', $request->team_id)
            ->update([
                'thesis_status' => $request->thesis_status,
                'comments' => $request->comments,
                'is_edit_allowed' => $request->thesis_status == 1 ? 1 : 0,
            ]);

        if ($data) {
            return response()->json(['success' => 'Thesis Status Updated Successfully..']);
        }
    }

    public function get_approved_thesis(Request $request)
    {
        $team_data = TeamLead::where('batch', $request->batch)
            ->where('department', $request->department)
            ->get(['id']);

        $records = [];

        foreach ($team_data as $teamLead) {
            $teamThesis = TeamThesis::with([
                'team' => function ($query) {
                    $query->select('name', 'id', 'email');
                }
            ])
                ->where('team_id', $teamLead->id)
                ->where('supervisor_id', $request->supervisor_id)
                ->where('thesis_status', 2)
                ->first();

            if ($teamThesis) {
                array_push($records, $teamThesis);
            }
        }

        return response()->json(['data' => $records]);
    }

    public function get_team_details(Request $request)
    {
        $data = TeamThesis::with([
            'team' => function ($query) {
                $query->select('name', 'id', 'email', 'rollno');
            }
        ])
            ->where('team_id', $request->team_id)
            ->where('supervisor_id', $request->supervisor_id)
            ->exists();

        if ($data) {
            $records = TeamThesis::with('team', 'team.members')
                ->where('team_id', $request->team_id)
                ->where('supervisor_id', $request->supervisor_id)
                ->first();
            return response()->json(['team_data' => $records]);
        } else {
            return response()->json(['team_data' => []]);
        }
    }

    public function assign_marks(Request $request)
    {
        $team_thesis = new TeamThesis();

        $allow_edit = 0;
        $edit_status = $team_thesis->where('team_id',$request->team_id)->first();

        if($edit_status->is_marks_edit==null){
            $allow_edit = 1;
        }

        if($edit_status->is_marks_edit==1){
            $allow_edit = 2;
        }

        $result = $team_thesis->where('team_id', $request->team_id)->update(['marks' => $request->marks, 'is_marks_edit'=>$allow_edit]);

        if ($result) {
            return response()->json(['success'=>'success']);
        }
    }
}

?>