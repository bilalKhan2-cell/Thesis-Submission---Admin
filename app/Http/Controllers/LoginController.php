<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use Hash;
use Illuminate\Http\Request;
use App\Models\TeamLead;
use App\Models\UserRoute;

class LoginController extends Controller {
    
    public function team_login(Request $request)
    {
        $response = TeamLead::where('email', $request->email)->where('pasword',$request->pasword)->exists();

        if ($response) {
            $team_data = TeamLead::with('members', 'departments')
                ->where('email', $request->email)
                ->select(['id', 'name', 'fname', 'email', 'pasword','contactinfo', 'department', 'cnic', 'rollno', 'batch', 'project_id', 'is_first_login'])
                ->first();

            $routes = UserRoute::where('route_type', 1)->get();

            return response()->json(['data' => $team_data, 'routes' => $routes]);
        } else {
            return response()->json(['data' => '0']);
        }
    }

    public function supervisor_login(Request $request)
    {
        try {

            $response = Supervisor::where('email', $request->email)->orWhere('cnic', $request->email)->where('pasword', ($request->password))->exists();

            if ($response) {
                $supervisor_data = Supervisor::where('email', $request->email)
                    ->orWhere('cnic', $request->email)
                    ->select(['id', 'name', 'email', 'contactinfo', 'pasword','cnic', 'department', 'address', 'is_first_login'])
                    ->with('dept')
                    ->first();

                $routes = UserRoute::where('route_type', 2)->get();

                return response()->json(['data' => $supervisor_data, 'routes' => $routes]);
            } else {
                return response()->json(['data' => '0']);
            }
        } catch (\Exception $ex) {
            return response()->json(['data' => $ex->getMessage()]);
        }
    }

    public function get_routes(Request $request)
    {
        $data = UserRoute::where('route_type', $request->route_type)->get();
        return response()->json(['routes' => $data]);
    }

    public function change_password(Request $request)
    {
        $user_type = $request->user_type;

        if ($user_type == 1) {
            $current_password = TeamLead::where('id', $request->user_id)->where('pasword', $request->current_password)->exists();

            if ($current_password) { {
                    $change_pass = TeamLead::where('id', $request->user_id)
                        ->update(['pasword' => ($request->new_password), 'is_first_login' => 2]);
                    if ($change_pass) {
                        return response()->json(['message' => 'Password Changed Successfully..','comp'=>1]);
                    }
                }
            } else {
                return response()->json(['message' => 'Invalid Current Password','comp'=>0]);
            }
        }

        if ($request->user_type == 2) {
            $current_password = Supervisor::where('id', $request->user_id)->where('pasword',bcrypt($request->current_password))->exists();

            if($current_password){
                $change_pass = Supervisor::where('id',$request->user_id)
                                ->update(['pasword'=>($request->new_password),'is_first_login'=>2]);
                if($change_pass){
                    return response()->json(['msg'=>"Password Updated Successfully..",'comp'=>'1']);
                }
            }

            else {
                return response()->json(['msg'=>"Invalid Current Password..",'comp'=>'0']);
            }
        }
    }

    public function check_current_password(Request $request){

        //1 for supervisor 2 for team

        if($request->type==1){
            $result = Supervisor::where('id',$request->uid)->where('pasword',$request->current_password)->exists();

            if($result){
                return response()->json(['msg'=>'1']);
            }

            else {
                return response()->json(['msg'=>'0']);
            }
        }

        if($request->type==2){
            $result = TeamLead::where('id',$request->uid)->where('pasword',$request->current_password)->exists();

            if($result){
                return response()->json(['msg'=>'1']);
            }

            else {
                return response()->json(['msg'=>'0']);
            }
        }

    }

    public function update_passowrd(Request $request){
        
        //1 for supervisor 2 for team

        if($request->type==1){
            $result = Supervisor::where('id',$request->uid)->update(['pasword'=>$request->new_password]);

            if($result){
                return response()->json(['msg'=>'1']);
            }

            else {
                return response()->json(['msg'=>'0']);
            }
        }

        if($request->type==2){
            $result = TeamLead::where('id',$request->uid)->update(['pasword'=>$request->new_password]);

            if($result){
                return response()->json(['msg'=>'1']);
            }

            else {
                return response()->json(['msg'=>'0']);
            }
        }
    }
}

?>