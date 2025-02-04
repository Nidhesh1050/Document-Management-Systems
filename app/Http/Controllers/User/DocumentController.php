<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function documentView(){
        
        $authId= auth()->user()->id;
        $documents = DB::table('file_uploads')->where('user_id',$authId)->orderBy('id','DESC')->get();
        return view('user.document.show_document',['documents'=>$documents]);

    }
    //Delete function to delete in user body
    public function documentDelete($id) {
        $authId= auth()->user()->id;
        DB::table('file_uploads')->where('user_id',$authId)->delete($id);
        //DB::delete('delete from file_uploads where id = ?',[$id]);
        return redirect('user/document')->with('success', 'Document has been deleted successfully.');
    }
    public function documentEdit(Request $request,$id) {
        $project_documents = DB::table('projects')->select('id','project_name')->get();
        $category_documents = DB::table('categories')->select('id','name')->get();
        $document_type= DB::table('document_types')->select('id','name')->get();
        $users = DB::table('file_uploads')->where(['id'=> $id])->first();
        return view('user.document.edit_document')->with(['users'=>$users,'project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);

    }
    public function documentUpdate(Request $request){
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
            ]);
        }
        return redirect('user/document')->with('success', 'Ducoment has been updated successfully.');
    }



    public function addDocument(Request $request){
        $companyId= auth()->user()->id;

        if(!empty($request->all())){

        $request->validate([
            'project_id' =>  'required',
            'category_id' => 'required',
            'document_type_id' =>  'required',
            'title' =>  'required',
           'document' =>  'required|mimes:pdf,xlsx,docx,ppt',
        ]);

        $document = $request->file('document');
        $destinationPath = public_path('/documents');
        $document_name = $request->project_id.'-'.$request->category_id.'-'.$request->document_type_id.$document->getClientOriginalExtension();
        $extension= $document->getClientOriginalExtension();
       
        $document->move($destinationPath, $document_name);

            $inserData['project_id'] = $request->project_id;
            $inserData['category_id']= $request->category_id;
            $inserData['document_type_id']= $request->document_type_id;
            $inserData['description'] = $request['description'];
            $inserData['title'] = $request->title;
            $inserData['documents'] = $document_name;
            $inserData['extension'] = $extension;

            $user_id =  auth()->user()->id;
           $user_type = Auth::user()->type;
      
            if($user_type = "user"){
              $inserData['user_id'] = $user_id;
            }
            else if($user_type = "company"){
              $inserData['company'] = $user_id;
            }


            DB::table('file_uploads')->insert($inserData);
            return  redirect('user/document')->with('success', 'Document has been added successfully.');
        }else{
            $project_documents = DB::table('projects')->select('id','project_name')->where('user_id', $companyId)->get();
            $category_documents = DB::table('categories')->select('id','name')->where('user_id', $companyId)->get();
            $document_type= DB::table('document_types')->select('id','name')->where('user_id', $companyId)->get();
            return view ('user.document.createdocument')->with(['project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);
        }




    }
    public function documentChangeStatus($id=null, $status=null)   {
        $users = DB::table('file_uploads')->where('id',$id)->update(['status'=>$status]);
        return back()->withInput()->with('success','Status has been changed.');
    }

}
