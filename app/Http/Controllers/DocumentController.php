<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    // code by anurag
    //View Document
    public function document(){
        $users = DB::table('file_uploads')->get();
        return view('admin.document.show_document',['users'=>$users]);

    }
    //Delete function to delete in user body
    public function delete_document($id) {
        DB::delete('delete from file_uploads where id = ?',[$id]);
        return redirect()->back();
    }
    public function edit_document(Request $request,$id) {
        $users = DB::table('file_uploads')->where(['id'=> $id])->first();
        return view('admin.document.edit_document')->with(['users'=>$users]);

    }
    public function update_document(Request $request){
        $request->validate(
            [
            'project_id'=>'required',
            'category_id'=>'required',
            'document_type_id' =>'required',
            'title' => 'required',
            ]);

        if(!empty($request->file('documents'))){
            $documents = $request->file('documents');
            $destinationPath = public_path('documents/');
            $documents_name = rand().'.'.$documents->getClientOriginalExtension();
            $documents->move($destinationPath, $documents_name);

            DB::table('file_uploads')
            ->where('id', $request['id'])
            ->update([

            'project_id' => $request['project_id'],
            'category_id' => $request['category_id'],
            'document_type_id' => $request['document_type_id'],
            'title' => $request['title'],
            'documents' => $documents_name,

            ]);
        }else{
            DB::table('file_uploads')
            ->where('id', $request['id'])
            ->update([
                'project_id' => $request['project_id'],
                'category_id' => $request['category_id'],
                'title' => $request['title'],
            ]);
        }
        return redirect('admin/document')->with('success', 'Ducoment has been updated successfully.');
    }

    //code by anurag end

    // code by anuj

    public function createdocument(){
        $project_documents = DB::table('projects')->select('id','project_name')->get();
        $category_documents = DB::table('categories')->select('id','name')->get();
        $document_type= DB::table('document_types')->select('id','name')->get();
        return view ('admin.document.createdocument')->with(['project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);
       }

    public function add_document(Request $request){
        //Add Document.


        $request->validate([
            'project_id' =>  'required',
            'category_id' => 'required',
            'document_ty' =>  'required',
            'title' =>  'required',
            'document' =>  'required|mimes:pdf,xlsx,docx,ppt',

           'status' => 'nullable|boolean',
        ]);

        $status = $request->status == 1 ? 1 : 0;

        $document = $request->file('document');
        $destinationPath = public_path('/documents');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move($destinationPath, $document_name);

            $inserData['project_id'] = $request->project_id;
            $inserData['category_id']= $request->category_id;
            $inserData['document_type_id']= $request->document_ty;
            $inserData['title'] = $request->title;
            $inserData['documents'] = $document_name;
            $inserData['status'] =  $status;



            DB::table('file_uploads')->insert($inserData);
            return  redirect('admin/document')->with('success', 'Ducoment has been updated successfully.');


    }

    //code by anuj

    // code by soni start
    //Show data
    public function view_document(){
        $users = DB::table('document_types')->get();
        return view('admin.document.view_document',['users'=>$users]);
    }

    //Delete data
    public function deletedocument($id) {
        DB::delete('delete from document_types where id = ?',[$id]);
        return redirect()->back();
     }

    //Insert data
    public function add_documenttype(){
        return view('admin.document.add_document');
    }
    public function register(Request $request)
    {
        $request->validate([
            'status' => 'nullable|boolean',
            ]
        );
        $status = $request->status == 1 ? 1 : 0;

        $insertData['name'] = $request->name;
        $insertData['status'] =  $status;
        DB::table('document_types')->insert($insertData);
        return redirect('admin/view_document')->with('success', 'Ducoment Type has been save successfully.');
     }

      //edit code in user body
      public function edit(Request $request,$id) {
        $users = DB::table('document_types')->where(['id'=> $id])->first();
        return view('admin.document.edit')->with(['users'=>$users]);
    }
      //Update Code
    public function documentupdate(Request $request){

        $request->validate(
         ['name' => 'required',
            ]);


        DB::table('document_types')
            ->where('id', $request['id'])
            ->update([
                'name' => $request['name'],
            ]);
        return redirect('admin/view_document')->with('success', 'Document has been updated successfully.');
        ;
    }
    //code by soni end
}