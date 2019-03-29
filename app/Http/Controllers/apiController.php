<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
class apiController extends Controller
{	
    
    
    public function getOrders(Request $request){
        $res=DB::table('orders')
        ->where('userName',$request->userName)
        ->get();
            return response()->json($res);
    }
	public  function updateBalance(Request $request){
        $v = Validator::make($request->all(), [
                        'userName' => 'required',
                        'balance' => 'required',
                    ]);
           if ($v->fails()) 
            {
               $request=array(
              'error' =>$v->messages()->toJson(),
              'status'=>0
                );
               return response()->json($request);
            }
            else{
                 if(DB::table('logins')->where('userName', $request->userName)->exists()){
                    $obj=DB::table('logins')->where('userName', $request->userName)->first();
                    DB::table('logins')
                    ->where('userName', $request->userName)
                    ->update(['balance' => $request->balance+$obj->balance]);
                    $request=array('Message' => 'Balance Updated Succesfully','status'=>1);
                    return response()->json($request);
                }else{
                    $request=array('Error' => 'Invalid Username','status'=>0);
                    return response()->json($request);
                }
                
            }
    }
    public function getCities(){
        $res=DB::table('set_schedules')
            ->select('city')
            ->get();
            return response()->json($res);
    }
    public function getCitySchedules(Request $request){
        $res=DB::table('set_schedules')
            ->where('city',$request->city)
            ->select('schedule')
            ->get();
            return response()->json($res);
    }
    public function getHistoryDetails(Request $request){
            $res=DB::table('orders')
            ->where('userName',$request->userName)
            ->where('created_at',$request->dateTime)
            ->select('quantity','product_name','product_price')
            ->get();
            return response()->json($res);
    }
    public function getHistoryDateTime(Request $request){
        
            $res=DB::table('orders')
            ->where('userName',$request->userName)
            ->select('created_at')
            ->groupBy('created_at')
            ->get();
            return response()->json($res);
        
    }
    public function getProductDetails(Request $request){
         //if(DB::table('products')->where('name',$request->productName)->exists()){
            $res=DB::table('products')->where('id', '=', $request->id)->first();
            // $msg=array('Message' => 'Details found Succesfully','status'=>1);
            return response()->json($res);
        //}
        // else{
        //     $error=array('error' => 'Details Not Found','status'=>0);
        //     return response()->json($error);
        // }
    }
    public function getSearchProducts(Request $request){
        $res = DB::table('products')
                ->where('brand', 'LIKE', '%'.$request->productName.'%')
                ->orwhere('name', 'LIKE', '%'.$request->productName.'%')
                ->get();
                return response()->json($res);
    }
    public function getUserDetails(Request $request){
        $res=DB::table('logins')->where('userName', '=', $request->userName)->first();
            return response()->json($res);
    }
    public function getSlider(Request $request){
         $res=DB::table('sliders')->get();
            return response()->json($res);
    }
    public function getAllProducts(Request $request){
        $res=DB::table('products')->where('cid', '=', $request->categoryId)->get();
            return response()->json($res);
    }
    public function getPromotions(Request $request){
        $res=DB::table('products')
            ->select('name','price','promotion')
            ->get();
            return response()->json($res);
    }
    public function getProductImage(Request $request){
        if(DB::table('products')->where('id',$request->productId)->exists()){
            $res=DB::table('products')->where('id', '=', $request->productId)->first();
            $msg=array('image'=>$res->images,'Message' => 'image found Succesfully','status'=>1);
            return response()->json($msg);
        }
         else{
            $error=array('error' => 'image Not Found','status'=>0);
            return response()->json($error);
        }
        return response()->json($res);
    }
    public function getAllCategories(Request $request){
        $res=DB::table('categories')->get();
            return response()->json($res);
    }
	public function login(Request $request){
		$v = Validator::make($request->all(), [
                        'userName' => 'required',
                        'password' => 'required',
                    ]);
           if ($v->fails()) 
            {
               $request=array(
              'error' =>$v->messages()->toJson(),
              'status'=>0
          		);
               return response()->json($request);
            }
           else if(DB::table('logins')->where('userName',$request->userName)->exists()){
    		$user=DB::table('logins')->where('userName',$request->userName)->first();
    		if($request->password==$user->password){
    			$request= array('Message' =>'Login Succesfully','status'=>1);
    			return response()->json($request);
    		}
    		else{
    			$request= array('error' =>'Invalid Username or Password','status'=>0);
    			return response()->json($request);
    		}
    	}
    	else{
    		$request= array('error' =>'Invalid Username or password','status'=>0);
    		return response()->json($request);
    	}
	}
	public function updateOrder(Request $request){
         $v = Validator::make($request->all(), [
                        'orders' => 'required',
                        'userName'=>'required',
                        'dateTime'=>'required',
                    ]);
           if ($v->fails()) 
            {
               $request=array(
              'error' =>$v->messages()->toJson(),
              'status'=>0
                );
               return response()->json($request);
            }
                $user=DB::table('logins')->where('userName',$request->userName)->first();
                $username=$request->userName;
                $dateTime=$request->dateTime;
                $jsonParti = json_decode($request->orders);
                foreach ($jsonParti as $obj ) {
                	DB::table('orders')
		            ->where('id', $obj->id)
		            ->update(['userName' => $username,'pid' => $obj->productId,'quantity' => $obj->quantity,'product_name' => $obj->productName,'product_price' => $obj->price,'total_paid_amount' => $obj->totalPaidPrice,'created_at' => $dateTime,'name' => $user->name,'phoneNo' => $user->phoneNo,'total_of_all_orders' => $obj->totalOfAllOrders]);
                }
             $request=array('Message' => 'Orders Updated Succesfully','status'=>1);
    	
    	return response()->json($request);
    }
    public function placeOrder(Request $request){
    	       $v = Validator::make($request->all(), [
                        'orders' => 'required',
                        'userName'=>'required',
                        'dateTime'=>'required',
                    ]);
           if ($v->fails()) 
            {
               $request=array(
              'error' =>$v->messages()->toJson(),
              'status'=>0
                );
               return response()->json($request);
            }
                $user=DB::table('logins')->where('userName',$request->userName)->first();
                $username=$request->userName;
                $dateTime=$request->dateTime;
                $jsonParti = json_decode($request->orders);
                foreach ($jsonParti as $obj ) {

                    DB::insert('insert into orders (userName,pid,quantity,product_name,product_price,total_paid_amount,created_at,name,phoneNo,total_of_all_orders) values(?,?,?,?,?,?,?,?,?,?)',[$username,$obj->productId,$obj->quantity,$obj->productName,$obj->price,$obj->totalPaidPrice,$dateTime,$user->name,$user->phoneNo,$obj->totalOfAllOrders]);
                }
             $request=array('Message' => 'Orders placed Succesfully','status'=>1);
    	
    	return response()->json($request);
    }

}
