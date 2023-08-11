<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }


    public function index(): View
    {
        return view('home');
    }


    public function adminHome(): View
    {
        return view('adminHome');
    }

    public function managerHome(): View
    {
        return view('managerHome');
    }

    //List of users

    public function userManagement(){
       // $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();
        $users = DB::table('users')->whereIn('type', [2,0])->get();

        return view('admin.user.userManagement',['users'=>$users]);
    }
    //Delete function to delete in user body
    public function delete($id) {
      DB::delete('delete from users where id = ?',[$id]);
        return redirect()->back();
     }
     //edit code in user body
     public function edit(Request $request,$id) {

      $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();

        $users = DB::table('users')->where(['id'=> $id])->first();
        return view('admin.user.edit')->with(['users'=>$users,'project_manager'=>$project_manager]);
       
      }
      //Update Code
      public function update(Request $request){
        DB::table('users')
            ->where('id', $request['id'])
            ->update([
                'company_name' => $request['company_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'mobile' => $request['mobile'],
                'user_type' => $request['user_type'],
                'username' => $request['username'],
            ]);
            return redirect('admin/userManagement')->with('success', 'User has been updated successfully.');;
      }
      //Insert data Code
      public function adduser(){
        $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();
       // echo $project_manager;die;
        return view('admin.user.adduser',['project_manager'=>$project_manager]);
      }
      
      public function register(Request $request)
     {
      

      $request->validate(
        [
          'company_name'=>'required|max:50|string',
          'name'=>'required|max:50|string',
          'email'=>'required|email|unique:users',
          'mobile' =>'required|max:12',
          'user_type' => 'required',
          'username' => 'required',
          'password' => 'required|max:8',
          ]
      );


     $user_id =  Session::get('user_id');
     $user_type = Session::get('user_type');

     if($user_type = "admin"){
      $inserData['admin_id'] = $user_id;
      $inserData['manager_id'] = $user_id;
     }
     else if($user_type = "manager"){
      $inserData['manager_id'] = $user_id;
     }

        $inserData['company_name'] = $request->company_name;
        $inserData['name'] = $request->name;
        $inserData['email']= $request->email;
        $details = [
          'title' => 'Mail from dms.srmtechsol.com',
          'body' => 'Welcome in Document Manganent Proejct',

          // 'email'=> $request->email,
          //  'password'=> $request->password 
          

      ];
      \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

  
        $inserData['mobile'] = $request->mobile;
        $inserData['user_type'] = $request->user_type;
        $inserData['username'] = $request->username;
        $inserData['password'] = $request->password;
        

        DB::table('users')->insert($inserData);

        return redirect('admin/userManagement')->with('success', 'User has been added successfully.');
    }



}
