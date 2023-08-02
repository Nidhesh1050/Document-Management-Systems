<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category(){
        $parent_catogeris=DB::table('categories')->select('id','name')->where(['parent_id'=> 1])->get();
        return view ('admin.category.category')->with(['parent_categories'=> $parent_catogeris]);
    }

    public function add_category(Request $request) {
        $request->validate([
            'parent_id' =>  'required',
            'name' => 'required|string',
            'description' =>  'required',
            'image' =>  'required','mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = $request->file('image');
        $destinationPath = public_path('/images');
        $image_name = rand().'.'.$image->getClientOriginalExtension(); 
        $image->move($destinationPath, $image_name);
        $inserData['parent_id'] = $request->parent_id;
        $inserData['name']= $request->name;     
        $inserData['category_slag']= str_replace(' ', '_', $request->name);
        $inserData['description'] = $request->description;
        $inserData['image'] = $image_name;
        DB::table('categories')->insert($inserData);
        return redirect('admin/view_category');
    }
    
    public function view_category(){
        $users = DB::table('categories')->orderBy('id','DESC')->get();
        return view('admin.category.view_category',['users'=>$users]);
    }

    public function delete_category($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect()->back();
    }

    public function update_category(Request $request,$id) {
        $users = DB::table('categories')->where(['id'=> $id])->first();
        $parent_catogeris=DB::table('categories')->select('id','name')->where(['parent_id'=> 1])->get();
        return view('admin.category.update_category')->with(['users'=>$users,'parent_categories'=> $parent_catogeris]);
    }

    public function edit_category(Request $request){

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $destinationPath = public_path('/images');
            $image_name = rand().'.'.$image->getClientOriginalExtension(); 
            $image->move($destinationPath, $image_name);
            DB::table('categories')
            ->where('id', $request['id'])
            ->update([
                'parent_id' => $request['parent_id'],
                'name' => $request['name'],
                'description' => $request['description'],
                'image' => $image_name,
            ]);
        }else{
            DB::table('categories')
            ->where('id', $request['id'])
            ->update([
                'parent_id' => $request['parent_id'],
                'name' => $request['name'],
                'description' => $request['description'],
            ]);
        }
        return redirect('admin/view_category');
    }
}
