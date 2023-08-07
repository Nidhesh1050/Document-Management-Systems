<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function setting(){
        return view('admin.setting.setting');  
    }

    public function add_image(Request $request) {
        $request->validate([
            'image' =>  'required','mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = public_path('/images');
        $image_name = rand().'.'.$image->getClientOriginalExtension(); 

        if (!Storage::exists('images/' . $image_name)) {
        $image->move($destinationPath, $image_name);

        $inserData['image'] = $image_name;
        }else {
            return redirect()->back()->with('error', 'Image already exists.');
        }
      

        DB::table('side_setting')->insert($inserData);
        return redirect('/admin/view_image')->with('success', 'Notification has been updated successfully.');
    }

    public function view_image(){
       $users = DB::table('side_setting')->get();
       return view('admin.setting.view_setting',['users'=>$users]);
    }

    public function edit_image(){
        return view('admin.setting.setting');  
    }

    public function delete_image($id) {
        DB::delete('delete from side_setting where id = ?',[$id]);
        return redirect()->back();
    }

}
