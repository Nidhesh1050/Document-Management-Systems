<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CMSController extends Controller
{
    public function addcontent(){
        return view('admin.content_management.addcontent');
    }

    public function add_cms(Request $request) {
        $request->validate([
            'title' => 'required|string',
             'image' =>  'mimes:jpeg,png,jpg,gif,svg',
            'status' => 'nullable|boolean',
        ]);
        $status = $request->status == 'on' ? 1 : 0;

        $image = $request->file('image');
        $destinationPath = public_path('/cms');
        $image_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath, $image_name);
        $insertData['title']= str_replace(' ', '_', $request->title);

        $insertData['description'] = strip_tags($request->description);
        $insertData['image'] = $image_name;
        $insertData['status'] =  $status;
        DB::table('cms')->insert($insertData);

        return redirect('admin/view_content')->with('success', 'Content has been added successfully.');
    }
    public function view_content(){
        $users = DB::table('cms')->orderBy('id','DESC')->get();
        return view('admin.content_management.view_content',['users'=>$users]);
    }

    public function delete_content($id) {
        DB::delete('delete from cms where id = ?',[$id]);
        return redirect('admin/view_content')->with('success', 'Content has been deleted successfully.');
    }

    public function update_content(Request $request,$id){
        $users = DB::table('cms')->where(['id'=> $id])->first();
        return view('admin.content_management.update_content')->with(['users'=>$users]);
    }

    public function edit_content(Request $request){
     ///   print_r($request->all());die;
        $request->validate([
            'title' => 'required|string',
            'image' =>  'mimes:jpeg,png,jpg,gif,svg',
           // 'status' => 'nullable|boolean',
        ]);

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $destinationPath = public_path('/cms');
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('cms')
            ->where('id', $request['id'])
            ->update([

                'title'=> str_replace(' ', '_', $request->title),
                'description' => strip_tags($request->description),
                'image' => $image_name,
                'status' => $status,
            ]);
        }
        else {
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('cms')
            ->where('id', $request['id'])
            ->update([
           'title'=> str_replace(' ', '_', $request->title),
           'description' => strip_tags($request->description),
           'status' => $status,
            ]);

        }
            return redirect('admin/view_content')->with('success', 'Content has been updated successfully.');
}
}
