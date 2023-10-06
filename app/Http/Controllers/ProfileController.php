<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Supervisor,TeamLead};

class ProfileController extends Controller
{
    //Route For API
    public function profile(Request $request){
        if($request->type=='supervisor'){
            return response()->json(['data'=>Supervisor::find($request->id)]);
        }

        else if($request->type=='team'){
            return response()->json(['data'=>TeamLead::with('members')->where('id',$request->id)->first(['id','name','email','cnic','contactinfo','address','batch'])]);
        }
    }
}
