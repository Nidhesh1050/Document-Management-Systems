<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CMSController extends Controller
{
    public function addcontent(){
        return view('admin.content_management.addcontent');
    }

    public function add_content(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'description' =>  'required',
            'image' =>  'required','mimes:jpeg,png,jpg,gif,svg',
            'status' => 'nullable|boolean',
        ]);
        $status = $request->status == 1 ? 1 : 0;

        $image = $request->file('image');
        $destinationPath = public_path('/cms');
        $image_name = rand().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $image_name);
        $insertData['title']= str_replace(' ', '_', $request->title);

        $insertData['description'] = strip_tags($request->description);
        $insertData['image'] = $image_name;
        $insertData['status'] =  $status; 
   
        DB::table('cms')->insert($insertData);
        return redirect('admin/view_content');
    }
    public function view_content(){
        $users = DB::table('cms')->get();
        return view('admin.content_management.view_content',['users'=>$users]);
    }

    public function delete_content($id) {
        DB::delete('delete from cms where id = ?',[$id]);
        return redirect()->back();
    }
  
    public function update_content(Request $request,$id){
        $users = DB::table('cms')->where(['id'=> $id])->first();
        return view('admin.content_management.update_content')->with(['users'=>$users]);
    }
    
    public function edit_content(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' =>  'required',
            'status' => 'nullable|boolean',
        ]);

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $destinationPath = public_path('/cms');
            $image_name = rand().'.'.$image->getClientOriginalExtension(); 
            $image->move($destinationPath, $image_name);
            DB::table('cms')
            ->where('id', $request['id'])
            ->update([
               
                'title' => $request['title'],
                'description' => $request['description'],
                'image' => $image_name,
                'status' => $request['status'],
            ]);
        }
        else {
            DB::table('cms')
            ->where('id', $request['id'])
            ->update([
               
                'title' => $request['title'],
                'description' => $request['description'],
                'status' => $request['status'],
            ]);

        }
            return redirect('admin/view_content');

}
}