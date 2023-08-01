<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class DocumentController extends Controller
{
   public function document(){
    $project_documents = DB::table('projects')->select('id','project_name')->get();
    $category_documents = DB::table('categories')->select('id','name')->get();
    $document_type= DB::table('document_type')->select('id','name')->get();
    return view ('admin.documents.document')->with(['project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);
   }

   public function add_document(Request $request){
    //Add Document.


    $request->validate([
        'project_id' =>  'required',
        'category_id' => 'required',
        'document_ty' =>  'required',
        'title' =>  'required',
        'document' => 'required',
        'status' => 'required',
    ]);


    $document = $request->file('document');
    $destinationPath = public_path('/documents');
    $document_name = rand().'.'.$document->getClientOriginalExtension(); 
    $document->move($destinationPath, $document_name);

        $inserData['project_id'] = $request->project_id;
        $inserData['category_id']= $request->category_id;     
        $inserData['document_type_id']= $request->document_ty;     
        $inserData['title'] = $request->title;
        $inserData['documents'] = $document_name;
        $inserData['status'] =  $request->status;
        DB::table('file_uploads')->insert($inserData);
        return  redirect('admin/document');


   }
}
