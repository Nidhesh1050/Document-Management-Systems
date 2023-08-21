<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class CompanyController extends Controller
{
    public function addCompany(){
        return view('admin.company.add_company');
     }

     public function Company_add(Request $request) {
      
        $request->validate([
            'company_name' => 'required|string',
            'name'=>'required|max:50|string',
            'email'=>'required|email|unique:users',
            'mobile' =>'required|max:12',
        ]);
       
        
        $insertData['mobile'] = $request->mobile;
        $insertData['name'] = $request->name;
        $insertData['email']= $request->email;
        $insertData['password']=bcrypt($request->password);

        $userId = DB::table('users')->insertGetId($insertData);
       
          // insert data in company 

           if($request->file('logo')){
            $image = $request->file('logo');
                $destinationPath = public_path('/images/logo');
                $logo_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $logo_name);
                $companyInsertData['logo'] = $logo_name;
        } 
        $companyInsertData['slag'] =str_replace(' ', '-',$request->company_name);
        $companyInsertData['company_name'] =$request->company_name;
        $companyInsertData['user_id'] =$userId;

        $userId = DB::table('companies')->insertGetId($companyInsertData);
        
        return redirect('admin/view_company')->with('success', 'Company has been added successfully.');
    }
    public function view_company(){
     
        $company_data = DB::table('companies')->orderBy('id','DESC')->get();
        return view('admin.company.view_company',['company_data'=>$company_data]);
    }

    public function delete_company($id) {
        DB::delete('delete from companies where id = ?',[$id]);
        return redirect('admin/view_company')->with('success', 'Company has been deleted successfully.');
    }

    public function update_company(Request $request,$id){
      //  print_r($request);die;
        $company_data = DB::table('companies')->where(['id'=> $id])->first();
        return view('admin.company.update_company')->with(['company_data'=>$company_data]);
    }

    public function edit_company(Request $request){
     // print_r($request->all());die;
        $request->validate([
       'company_name' => 'required|string', 
          ]);
          if($request->file('logo')){
            $image = $request->file('logo');
                $destinationPath = public_path('/images/logo');
                $logo_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $logo_name);
        } 
                DB::table('companies')
                    ->where('id', $request['id'])
                    ->update([
                        'company_name' => str_replace(' ', '-',$request['company_name']),
                        
                        'logo' =>$logo_name,

                    ]);
            return redirect('admin/view_company')->with('success', 'Company has been updated successfully.');
   }

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

