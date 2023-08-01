<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    //Show data
    public function view_document(){
        $users = DB::table('document_types')->get();
        return view('admin.document.view_document',['users'=>$users]);
    }
    
    //Delete data
    public function delete($id) {
        DB::delete('delete from document_types where id = ?',[$id]);
        return redirect()->back();
     }

    //Insert data 
    public function add_document(){
        return view('admin.document.add_document');
    }
    public function register(Request $request)
    {
        
        $request->validate(
            ['name'=>'required|max:50|string',] 
        );


        $insertData['name'] = $request->name;
         // print_r($insertData);die;
        DB::table('document_types')->insert($insertData);
        return redirect('admin/view_document');
     }

      //edit code in user body
    public function edit(Request $request,$id) {
        $users = DB::table('document_types')->where(['id'=> $id])->first();
        return view('admin.document.edit')->with(['users'=>$users]);
    }
      //Update Code
      public function update(Request $request){
        DB::table('document_types')
            ->where('id', $request['id'])
            ->update([
                'name' => $request['name'],
            ]);
        return redirect('admin/view_document');
    }

}