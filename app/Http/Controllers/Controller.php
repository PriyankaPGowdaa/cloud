<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function signUp(Request $request)
    {
        
         $v = Validator::make($request->all(), [
            'name' => 'required|string',
            'userName' => 'required|string|unique:logins',
            'password' => 'required',
            'address' =>'required',
            'phoneNo' => 'required|integer',
            
        ]);
        if ($v->fails()) {
        $request=array(
  'status' => 0,
  'error' =>$v->messages()->toJson(),
);
        }
        else
        {
         $password_hash = password_hash($request->password, PASSWORD_BCRYPT);   
           DB::insert('insert into logins (name,userName,password,phoneNo,address) values(?,?,?,?,?)',[$request->name,$request->userName,$password_hash,$request->phoneNo,$request->address]); 
               $request=array(
  'status' => 1,
); 
        }

        return response()->json($request);
    
    }
   public function  insertOrder(Request $request)
   {
       $v = Validator::make($request->all(), [
            'userName' => 'required|string',
            'fid' => 'required|integer',
            'description' => 'nullable',
            'quantity' => 'required|integer'            
        ]);
        if ($v->fails()) {
        $request=array(
  'status' => 0,
  'error' =>$v->messages()->toJson(),
);
        }
        else
        {
          if(!$request->description)
          {
            $request->description=null;
          }
          else{}
             DB::insert('insert into orders (username,fid,quantity,description) values(?,?,?,?)',[$request->userName,$request->fid,$request->quantity,$request->description]);
             //getting current quantity
              $current=DB::table('foods')->where('foodId',$request->fid)->get();

              $updateQuantity=$current[0]->quantity-$request->quantity;
              if(!$updateQuantity>0)
              {
$updateQuantity=0;
              }else{}
              //dd($updateQuantity);
             DB::table('foods')->where('foodId',$request->fid)->update(['quantity' =>$updateQuantity]); 
               $request=array(
          
  'status' => 1,
);  
        }
     return response()->json($request);
   }
      public function logIn(Request $request)
   
    {
     if(DB::table('logins')->where('userName',$request->userName)->exists())
     {
      $user=DB::table('logins')->where('userName',$request->userName)->get();
     //dd($password);
  if (password_verify($request->password, $user[0]->password)) {
          $request=array(
  'status' => 2,
  'userObject' => $user,
);
    // Correct password
  } else {
              $request=array(
  'status' =>1,
);
    // Incorrect password
  }
    }else{
            $request=array(
  'status' => 0,
  
);
}
return response()->json($request);
    }
public function categories()
{
	  $Details=DB::table('categories')->get();
     return response()->json($Details);
}
public function foodListCategory(Request $request)
{
   $Details=DB::table('foods')->where('cid',$request->cid)->get();
     return response()->json($Details);
}
public function foodStock(Request $request)
{
     $Details=DB::table('foods')->select('quantity')->where('foodId',$request->foodId)->get();
     return response()->json($Details);
}
public function currentOrderList(Request $request)
{
  $data=DB::table('foods')
                 ->join('orders','orders.fid', '=','foods.foodId')
            ->where('orders.username','=',$request->userName)
            ->whereRaw("(orders.status = 'pending' OR orders.status = 'approved')")
            ->select('foods.name', 'foods.price','orders.status','orders.quantity')
            ->get();
            return response()->json($data);
}
public function allOrderList(Request $request)
{
    $data=DB::table('foods')
            ->join('orders','orders.fid', '=','foods.foodId')
            ->where('orders.username','=',$request->userName)
            ->select('foods.name', 'foods.price','orders.status','orders.quantity')
            ->get();
            return response()->json($data);
}
public function getTableToReserve(Request $request)
{
   $data=DB::table('table1')->select('no')->get();
   /*DB::table('table_reservations')
            ->join('table1','table1.no', '=','table_reservations.t_no')
            ->where('table_reservations.startTime','!=',$request->startTime)

         ->where('table_reservations.endTime','!=',$request->endTime)
            ->where('table_reservations.date','!=',$request->date)
              ->where('table_reservations.status','!=','accepted')
            ->select('table1.no')
            ->get();
            $data2=DB::table('table_reservations')
            ->join('table1','table1.no', '<>','table_reservations.t_no')
            ->select('table1.no')
            ->get();
           // $data3=array();
           $data3=array(
            0 => $data,
            1 => $data2
           );*/
            return response()->json($data);
}
public function reserveTable(Request $request)
{
    $v = Validator::make($request->all(), [
            'userName' => 'required|string',
            'endTime' => 'required',
            'startTime' => 'required',
            'date' => 'required',
            'tableNo' => 'required|integer',
            
        ]);
        if ($v->fails()) {
        $request=array(
  'status' => 0,
  'error' =>$v->messages()->toJson(),
);
        }
        else
        {
        DB::insert('insert into table_reservations (username,t_no,startTime,endTime,date) values(?,?,?,?,?)',[$request->userName,$request->tableNo,$request->startTime,$request->endTime,$request->date]); 
               $request=array(
  'status' => 1,
);  
        }
     return response()->json($request);
}
}
