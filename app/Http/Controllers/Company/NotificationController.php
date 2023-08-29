<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class NotificationController extends Controller
{
        public function addNotification(Request $request){
            if(!empty($request->all())){
                $request->validate(
                [
                  'title'=>'required',
                ]
                );
                $inserData['title'] = $request->title;
                $inserData['description']= $request->description;

              // $userId = auth()->user()->id;
               // $companyID = DB::table('companies')->Select('id')->where(['user_id' => //$userId])->get();
                //echo"<pre>".$companyID[0]->id; die;//print_r($companyID[0]->id);die;
                //$inserData['company_id']= $companyID[0]->id;
            if(Auth::user()->type=="company"){
				$inserData['company_id']= Auth::user()->id;
				$inserData['created_at']= Auth::user()->id;
			}
			if(Auth::user()->type=="user"){
				$inserData['company_id']= Auth::user()->company_id;
			}
			
                
                DB::table('notifications')->insert($inserData);
                return redirect('company/show_notification')->with('success', 'Notification has been added successfully.');
            }
            else{
                return view('company.notification.Notification');
            }
        }
        public function showNotification(){

          $companyId= auth()->user()->id;
         
             $notifications = DB::table('notifications')->where('company_id',$companyId)->orderBy('id','DESC')->get();
             
             return view('company.notification.show_notification',['notifications'=>$notifications]);
            }
    
    
             //Delete function to delete in user body
         public function deleteNotification($id) {
            DB::delete('delete from notifications where id ='.$id);
            return redirect('company/show_notification')->with('success', 'Notification has been deleted successfully.');
             }
    
            //edit code in user body
            public function editNotification(Request $request,$id)
            {
               $users = DB::table('notifications')->where(['id'=> $id])->first();
               return view('company.notification.edit_notification')->with(['users'=>$users]);
             }
    
             public function updateNotification(Request $request){
                $request->validate(
                    [
                      'title'=>'required',
                      ]
                  );
    
                DB::table('notifications')
                    ->where('id', $request['id'])
                    ->update([
                        'title' => $request['title'],
                        'description' => $request['description'],
                    ]);
                    return redirect('company/show_notification')->with('success', 'Notification has been updated successfully.');
    
            }
            public function statusNotification($id=null, $status=null)   {
                $notifications = DB::table('notifications')->where('id',$id)->update(['status'=>$status]);
                return back()->withInput()->with('success','Status has been changed.');
            }
}
