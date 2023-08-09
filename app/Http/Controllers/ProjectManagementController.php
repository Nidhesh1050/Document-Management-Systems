<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProjectManagementController extends Controller
{

    public function project_management(){
        // $project_manager = DB::table('users')->select('id','name')->get();
        $project_manager = DB::table('users')->where(['user_type'=> 2])->get();
        //echo $project_manager;die;
        return view('admin.project_management.project',['project_manager'=>$project_manager]);
    }


    public function add_project(Request $request) {
        $request->validate([
            'project_name' => 'required|string',
            'manager_d' =>  'required',
            'status' => 'nullable|boolean',
        ]);
       $status = $request->status == 1 ? 1 : 0;

       $user_id =  Session::get('user_id');
       $user_type = Session::get('user_type');

     if($user_type = "admin"){
      $inserData['admin_id'] = $user_id;
      $inserData['manager_d'] = $request->manager_d;
     }
    
        $inserData['description']= $request->description;
        $inserData['project_name']= $request->project_name;
        $inserData['status'] =  $status;


        DB::table('projects')->insert($inserData);
        return redirect('/admin/view_project')->with('success', 'Project has been added successfully.');


    }


    public function view_project(){
        $users = DB::table('projects')->select(
            "projects.*", 
            "users.name" )
        ->leftJoin("users",  "users.id" ,"=", "projects.manager_d"  )
        ->get();
       return view('admin.project_management.view_project',['users'=>$users]);
    }


    public function delete_project($id) {
        DB::delete('delete from projects where id = ?',[$id]);
        return redirect()->back();
    }


    public function update_project(Request $request,$id) {
        $projects = DB::table('projects')->where(['id'=> $id])->first();
        $managers=DB::table('users')->select('id','name')->get();
        return view('admin.project_management.update_project')->with(['projects'=>$projects,'managers'=>    $managers]);
    }

    public function edit_project(Request $request){
        $request->validate([
            'project_name' => 'required|string',
            'manager_d' =>  'required',
        ]);
        DB::table('projects')
        ->where('id', $request['id'])
        ->update([
            'project_name' => $request['project_name'],
            'description' => $request['description'],
            'manager_d' => $request['manager_d'],
        ]);
          return redirect('/admin/view_project')->with('success', 'Project has been updated successfully.');
    
    }

}