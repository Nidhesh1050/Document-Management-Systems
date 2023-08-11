<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function setting(){
        $company_name = DB::table('users')->select('company_name')->distinct('company_name')->where('company_name', '!=', '')->get();
        //print_r($company_name);die;
        return view('admin.setting.setting',['company_name'=>$company_name]);  
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
        $inserData['image_type'] = $request->image_type;
        $inserData['company_name'] = $request->company_name;

        }else {
            return redirect()->back()->with('error', 'Image already exists.');
        }
      

        DB::table('side_setting')->insert($inserData);
        return redirect('/admin/view_image')->with('success', 'Profile Image has been updated successfully.');
    }

    public function view_image(){
       $users = DB::table('side_setting')->get();
       return view('admin.setting.view_setting',['users'=>$users]);
    }

    public function edit_image(Request $request,$id){

        $company_name = DB::table('users')->select('company_name')->get();
        $setting = DB::table('side_setting')->where(['id'=> $id])->first();
      // print_r($setting);die;
        return view('admin.setting.edit_image')->with(['company_name'=>$company_name,'setting'=>$setting]);  
    }

    public function update_image(Request $request){
        $request->validate([
            'image' =>  'required','mimes:jpeg,png,jpg,gif,svg',
            'company_name' =>  'required',
            'image_type' => 'required',
        ]);

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $destinationPath = public_path('/images');
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
 
            DB::table('side_setting')
            ->where('id', $request['id'])
            ->update([
                'image' => $image_name,
                'company_name' => $request['company_name'],
                'image_type' => $request['image_type'],
            ]);
        }
        else {
            DB::table('side_setting')
            ->where('id', $request['id'])
            ->update([
                
                'company_name' => $request['company_name'],
                'image_type' => $request['image_type'], 
            ]);

        }
            return redirect('admin/view_image')->with('success', 'profile has been updated successfully.');
}



    public function delete_image($id) {
        DB::delete('delete from side_setting where id = ?',[$id]);
        return redirect()->back();
    }

}
