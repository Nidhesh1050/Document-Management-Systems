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
            // print_r($request->all());die;
            // dd($request->all());die;
            $inserData['user_id'] = $request->user_id;
            $inserData['module_id']= $request->id;
            // $inserData['add'] = $request->add;
            // print_r($request->all());die;
            // $inserData['edit']= $request->edit;
            // $inserData['delete']= $request->delete;
            // $inserData['view'] = $request->view;

            DB::table('modules_permissions')->insert($inserData);
            return  redirect('admin/module_permission');
            // echo "success";


    }

}
