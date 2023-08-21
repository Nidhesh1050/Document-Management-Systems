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
        $users = DB::table('file_uploads')->orderBy('id','DESC')->get();
      //  echo $users;die;
        return view('admin.document.show_document',['users'=>$users]);

    }
    //Delete function to delete in user body
    public function delete_document($id) {
        DB::delete('delete from file_uploads where id = ?',[$id]);
        return redirect('admin/document')->with('success', 'Document has been deleted successfully.');
    }
    public function edit_document(Request $request,$id) {
        $project_documents = DB::table('projects')->select('id','project_name')->get();
        $category_documents = DB::table('categories')->select('id','name')->get();
        $document_type= DB::table('document_types')->select('id','name')->get();
        $users = DB::table('file_uploads')->where(['id'=> $id])->first();
        return view('admin.document.edit_document')->with(['users'=>$users,'project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);

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
           // $status = $request->status == 'on' ? 1 : 0;
            DB::table('file_uploads')
            ->where('id', $request['id'])
            ->update([

            'project_id' => $request['project_id'],
            'category_id' => $request['category_id'],
            'document_type_id' => $request['document_type_id'],
            'title' => $request['title'],
            'description' => strip_tags($request->description),
            'documents' => $documents_name,
            //'status' => $status,

            ]);
        }else{
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('file_uploads')
            ->where('id', $request['id'])
            ->update([
                'project_id' => $request['project_id'],
                'category_id' => $request['category_id'],
                'description' => strip_tags($request->description),
                'title' => $request['title'],
                'status' => $status,
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
        //print_r( $request->all());die;
        //Add Document.


        $request->validate([
            'project_id' =>  'required',
            'category_id' => 'required',
            'document_type_id' =>  'required|mimes:pdf,xlsx,docx,ppt',
            'title' =>  'required',
            'document' =>  'required|mimes:pdf,xlsx,docx,ppt',

           'status' => 'nullable|boolean',
        ]);

        $status = $request->status == 'on' ? 1 : 0;

        $document = $request->file('document');
        $destinationPath = public_path('/documents');
        $document_name = $request->project_id.'-'.$request->category_id.'-'.$request->document_type_id.$document->getClientOriginalExtension();
        $document->move($destinationPath, $document_name);

            $inserData['project_id'] = $request->project_id;
            $inserData['category_id']= $request->category_id;
            $inserData['document_type_id']= $request->document_type_id;
            $inserData['description'] = $request['description'];
            $inserData['title'] = $request->title;
            $inserData['documents'] = $document_name;
            $inserData['status'] =  $status;
             //print_r( $inserData);die;
            DB::table('file_uploads')->insert($inserData);
            
            return  redirect('admin/document')->with('success', 'Document has been updated successfully.');


    }

    //code by anuj

    // code by soni start
    //Show data
    public function view_document(){
        $users = DB::table('document_types')->orderBy('id','DESC')->get();
        return view('admin.document.view_document',['users'=>$users]);
    }

    //Delete data
    public function deletedocument($id) {
        DB::delete('delete from document_types where id = ?',[$id]);
        return redirect('admin/view_document')->with('success', 'Ducoment type has been updated successfully.');
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
        $status = $request->status == 'on' ? 1 : 0;

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

            $status = $request->status == 'on' ? 1 : 0;
        DB::table('document_types')
            ->where('id', $request['id'])
            ->update([
                'name' => $request['name'],
                'status' => $status,
            ]);
        return redirect('admin/view_document')->with('success', 'Document has been updated successfully.');
        ;
    }
    //code by soni end
}