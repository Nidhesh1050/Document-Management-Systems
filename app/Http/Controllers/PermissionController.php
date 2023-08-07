<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function module_permission(){
        $modules = DB::table('users')->select('id','name')->get();

        $users = DB::table('modules')->orderBy('id','ASC')->get();
        return view('admin.permission.module_permission')->with(['users'=>$users,'modules'=>    $modules]);
    }
    public function permission(Request $request){

    //    echo  count($request->edit_check);die;

            $inserData['user_type'] = $request->user_type;
            $inserData['module_id']= $request->id;
            // $inserData['add_check'] = $request->add_check;
            // $inserData['edit_check']= $request->edit_check;
            // $inserData['delete_check']= $request->delete_check;
            // $inserData['view_check'] = $request->view_check;

            DB::table('modules_permissions')->insert($inserData);
            return  redirect('admin/module_permission');
            // echo "success";


    }

}
