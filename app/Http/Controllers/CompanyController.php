<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class CompanyController extends Controller
{
   // List of all companies
  public function index(){
    $company_data = db::table('companies')->leftjoin('users', 'users.id', '=', 'companies.user_id')->select('users.name','users.email','users.mobile','companies.*')->orderBy('companies.id','DESC')->get();
    return view('admin.company.view_company',['company_data'=>$company_data]);
  }

  public function addCompany(Request $request) {

    if(!empty($request->all())){
      $request->validate([
        'company_name' => 'required|string',
        'name'=>'required|max:50|string',
        'email'=>'required|email|unique:users',
        'mobile' =>'required|max:12',
      ]);

      $insertData['mobile'] = $request->mobile;
      $insertData['name'] = $request->name;
      $insertData['email']= $request->email;
      $insertData['password']=Hash::make($request->password);
      $userId = DB::table('users')->insertGetId($insertData);
        // insert data in companies table
      if($request->file('logo')){
        $image = $request->file('logo');
        $destinationPath = public_path('/images/logo');
        $logo_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath, $logo_name);
        $companyInsertData['logo'] = $logo_name;
      } 
      $companyInsertData['slug'] =str_replace(' ', '-',$request->company_name);
      $companyInsertData['company_name'] =$request->company_name;
      $companyInsertData['user_id'] =$userId;
      $companyId = DB::table('companies')->insertGetId($companyInsertData);
      
      return redirect('admin/view_company')->with('success', 'Company has been added successfully.');
    }
    else{
      return view('admin.company.add_company');
    }
  }

  public function updateCompany($id){
    $company_data = db::table('companies')->leftjoin('users', 'users.id', '=', 'companies.user_id')->select('users.name','users.email','users.mobile','companies.*')->where(['companies.id'=> $id])->first();
    return view('admin.company.update_company')->with(['company_data'=>$company_data]);
  }

  public function editCompany(Request $request){

    $request->validate([
      'company_name' => 'required|string',
      'name'=>'required|max:50|string',
      'mobile' =>'required|max:12',
    ]);

      // update data in users table
    $updateData['mobile'] = $request->mobile;
    $updateData['name'] = $request->name;
    $updateData['email']= $request->email;
    $userId = DB::table('users')->where('id', $request->user_id)->update($updateData);

      //update data in users table
    if($request->file('logo')){
      $image = $request->file('logo');
      $destinationPath = public_path('/images/logo');
      $logo_name = rand().'.'.$image->getClientOriginalExtension();
      $image->move($destinationPath, $logo_name);
      $companyUpdateData['logo'] = $logo_name;
    } 
    $companyUpdateData['slug'] =str_replace(' ', '-',$request->company_name);
    $companyUpdateData['company_name'] =$request->company_name;
    $userId = DB::table('companies')->where('id', $request['id'])->update($companyUpdateData);

    return redirect('admin/view_company')->with('success', 'Company has been updated successfully.');
  }

  public function delete_company($id) {

    $image = DB::table('companies')->select('logo')->where('user_id', $id)->first();
    $imgpath = public_path('/images/logo/'.$image->logo);
    unlink( $imgpath );
    $delete_from_companies = DB::table('companies')->where('user_id',$id)->delete();
    $delete_from_users = DB::table('users')->where('id',$id)->delete();
  
    return redirect('admin/view_company')->with('success', 'Company has been deleted successfully.');
  }

   // check if company name already exist
  public function checkCompany(Request $request){
    $company_name = $request['company_name'];
    $id = $request['id'];
    if($id){ 
         $company_name = DB::table('companies')->select('company_name')->where('id','!=',$id)->where('company_name',$company_name)->first();
        
          if($company_name){
            $company_names = 1;
          }else{
            $company_names=0;
          }
    }
    else{
        $company_name = DB::table('companies')->select('company_name')->where('company_name',$company_name)->first();
        if($company_name){
          $company_names = 1;
        }else{
          $company_names=0;
        }
    }
    return $company_names;
  }

}

