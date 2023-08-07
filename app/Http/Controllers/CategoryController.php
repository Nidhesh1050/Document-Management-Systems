<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Session;

class CategoryController extends Controller
{
    public function category(){
        $parent_catogeris=DB::table('categories')->select('id','name')->get();
        return view ('admin.category.category')->with(['parent_categories'=> $parent_catogeris]);
    }



    public function add_category(Request $request) {
        $request->validate([
            'parent_id' =>  'required',
            'name' => 'required|string',
            'description' =>  'required',
        ]);

        $inserData['parent_id'] = $request->parent_id;
        $inserData['name']= $request->name;
        $inserData['category_slag']= str_replace(' ', '_', $request->name);
        $inserData['description'] = $request->description;
        DB::table('categories')->insert($inserData);
        return redirect('admin/view_category')->with('success', 'Category has been added successfully.');
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
        $parent_catogeris=DB::table('categories')->select('id','name')->get();
        return view('admin.category.update_category')->with(['users'=>$users,'parent_categories'=> $parent_catogeris]);
    }

    public function edit_category(Request $request){
        $request->validate([
            'parent_id' =>  'required',
            'name' => 'required',
            'description' =>  'required',
        ]);
            DB::table('categories')
            ->where('id', $request['id'])
            ->update([
                'parent_id' => $request['parent_id'],
                'name' => $request['name'],
                'description' => $request['description'],
            ]);
        {
            DB::table('categories')
            ->where('id', $request['id'])
            ->update([
                'parent_id' => $request['parent_id'],
                'name' => $request['name'],
                'description' => $request['description'],
            ]);
        }
        return redirect('admin/view_category')->with('success', 'Category has been updated successfully.');;
    }
}
