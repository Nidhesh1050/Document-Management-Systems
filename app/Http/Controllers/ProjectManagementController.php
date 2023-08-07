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
    

        $inserData['project_name']= $request->project_name;
        $inserData['status'] =  $status;


        DB::table('projects')->insert($inserData);
        return redirect('/admin/view_project');


    }


    public function view_project(){
        $users = DB::table('projects')->orderBy('id','DESC')->get();
        return view('admin.project_management.view_project',['users'=>$users]);
    }


    public function delete_project($id) {
        DB::delete('delete from projects where id = ?',[$id]);
        return redirect()->back();
    }


    public function update_project(Request $request,$id) {
        $users = DB::table('projects')->where(['id'=> $id])->first();
        $project_manager=DB::table('projects')->select('id','project_name')->get();
        return view('admin.project_management.update_project')->with(['users'=>$users,'project_manager'=>    $project_manager]);
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
            'manager_d' => $request['manager_d'],
        ]);
    return redirect('/admin/view_project');
    }

}