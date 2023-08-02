<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $users = DB::table('users')->get();
        // $users = DB::select('select * from users');
        return view('admin.user.userManagement',['users'=>$users]);
    }
    //Delete function to delete in user body
    public function delete($id) {
        DB::delete('delete from users where id = ?',[$id]);
        return redirect()->back();
     }
     //edit code in user body
     public function edit(Request $request,$id) {

        $users = DB::table('users')->where(['id'=> $id])->first();
        return view('admin.user.edit')->with(['users'=>$users]);

      }
      //Update Code
      public function update(Request $request){
        $request->validate(
            [
              'name'=>'required',
              'email'=>'required',
              'mobile' =>'required|max:12',
              'designation' => 'required',
              'username' => 'required',

              ]
          );
        DB::table('users')
            ->where('id', $request['id'])
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'mobile' => $request['mobile'],
                'designation' => $request['designation'],
                'username' => $request['username'],
            ]);
            return redirect('admin/userManagement');


      }
      //Insert data Code
      public function adduser(){
        return view('admin.user.adduser');
      }
      public function register(Request $request)
    {
      // echo '<pre>';
      // print_r($request->all());die;

      $request->validate(
        [
          'name'=>'required|max:50|string',
          'email'=>'required|email|unique:users',
          'mobile' =>'required|max:12',
          'designation' => 'required',
          'username' => 'required',
          'password' => 'required|max:8',
          ]
      );

        $inserData['name'] = $request->name;
        $inserData['email']= $request->email;
        $inserData['mobile'] = $request->mobile;
        $inserData['designation'] = $request->designation;
        $inserData['username'] = $request->username;
        $inserData['password'] = $request->password;
        //print_r($inserData);die;

        DB::table('users')->insert($inserData);

        return redirect('admin/userManagement');

    }

}

