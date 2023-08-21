<?php 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\CashierServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomMail;

class Common {

	static function getImage($id=null, ){
			
		$sttings = DB::table('company')->where(['id'=> $id])->first();
   // print_r($sttings);die;
		return $sttings;  
	
	}
}
