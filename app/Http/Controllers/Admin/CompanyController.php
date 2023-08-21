<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function addCompany(){
        return view('admin.company.add_company');
     }

     public function Company_add(Request $request) {
    
        $request->validate([
            'company_name' => 'required|string',
        ]);
        $insertData['company_name'] =str_replace(' ', '-',$request->company_name);
        DB::table('company')->insert($insertData);

        return redirect('admin/view_company')->with('success', 'Company has been added successfully.');
    }
    public function view_company(){
        $users = DB::table('company')->orderBy('id','DESC')->get();
        return view('admin.company.view_company',['users'=>$users]);
    }

    public function delete_company($id) {
        DB::delete('delete from company where id = ?',[$id]);
        return redirect('admin/view_company')->with('success', 'Company has been deleted successfully.');
    }

    public function update_company(Request $request,$id){
      //  print_r($request);die;
        $users = DB::table('company')->where(['id'=> $id])->first();
        return view('admin.company.update_company')->with(['users'=>$users]);
    }

    public function edit_company(Request $request){
     // print_r($request->all());die;
        $request->validate([
       'company_name' => 'required|string', 
          ]);
                DB::table('company')
                    ->where('id', $request['id'])
                    ->update([
                        'company_name' => str_replace(' ', '-',$request['company_name']),

                    ]);
            return redirect('admin/view_company')->with('success', 'Company has been updated successfully.');
   }

   public function checkCompany(Request $request){
    $company_name = $request['company_name'];
    $id = $request['id'];
    if($id){ 
         $company_name = DB::table('company')->select('company_name')->where('id','!=',$id)->where('company_name',$company_name)->first();
        
          if($company_name){
            $company_names = 1;
          }else{
            $company_names=0;
          }
    }
    else{
        $company_name = DB::table('company')->select('company_name')->where('company_name',$company_name)->first();
        if($company_name){
          $company_names = 1;
        }else{
          $company_names=0;
        }
    }
   return $company_names;
}

}

