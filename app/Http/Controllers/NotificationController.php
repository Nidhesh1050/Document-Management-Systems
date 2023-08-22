<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function notification(){

        return view('admin.notification.Notification');
    }

    public function add_notification(Request $request){

        $request->validate(
            [
              'title'=>'required',
             
              ]
          );

            $inserData['title'] = $request->title;
            $inserData['description']= $request->description;

            DB::table('notifications')->insert($inserData);

            return redirect('admin/show_notification')->with('success', 'Notification has been added successfully.');

    }

        public function show_notification(){

         $users = DB::table('notifications')->orderBy('id','DESC')->get();
         return view('admin.notification.show_notification',['users'=>$users]);
        }


         //Delete function to delete in user body
        public function delete($id) {
        DB::delete('delete from notifications where id ='.$id);
        return redirect('admin/show_notification')->with('success', 'Notification has been deleted successfully.');
         }

        //edit code in user body
        public function edit_notification(Request $request,$id)
        {
           $users = DB::table('notifications')->where(['id'=> $id])->first();
           return view('admin.notification.edit_notification')->with(['users'=>$users]);
         }

         public function update_notification(Request $request){
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
                return redirect('admin/show_notification')->with('success', 'Notification has been updated successfully.');

        }
}
