<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function module_permissioN(){
        $modules = DB::table('users')->select('id','name')->get();

        $users = DB::table('modules')->orderBy('id','ASC')->get();
        return view('admin.permission.module_permission')->with(['users'=>$users,'modules'=>    $modules]);
    }
    public function permission(Request $request){

    //    echo  count($request->edit_check);die;
            // print_r($request->all());die;
            // dd($request->all());die;
            $inserData['user_id'] = $request->user_id;
            foreach($request->id as $modules){
                $inserData['module_id']= $modules;
                $inserData['add'] = isset($request->add[$modules])?1:0;
                $inserData['edit'] = isset($request->edit[$modules])?1:0;
                $inserData['delete'] = isset($request->delete[$modules])?1:0;
                $inserData['view'] = isset($request->view[$modules])?1:0;
                DB::table('modules_permissions')->insert($inserData);
            }
            return  redirect('admin/module_permission')->with('success', 'Permission give successfully.');
    }

}
