<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\staffLogin;
use App\Order;
use App\Category;
use App\Login;
use App\Slider;
use App\setSchedule;
use App\Product;
use DateTime; 
use Auth;
use PDF;
use SnapPDF;
use Illuminate\Support\Facades\Cache;
class adminController extends Controller
{     

       public function updateSliderFile(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
           $obj=DB::table('sliders')->where('id',$request->fid)->first();
           
           $file = $request->file('name');
                $extension = $file->getClientOriginalExtension(); 
                 $fileName = $obj->id.'s.'.$extension;
                 $path = public_path().'/images';
                 $uplaod = $file->move($path,$fileName);
                 $pathToSave='/images/'.$fileName;
            DB::table('sliders')
            ->where('id', $request->fid)
            ->update(['imagebanner' => $pathToSave]);
            $details=DB::select('select * from sliders');
            return view('admin.getSliders')->with('objects',$details);
  
      }
      public function updateProductFile(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
           $obj=DB::table('products')->where('id',$request->fid)->first();
           
           $file = $request->file('name');
                $extension = $file->getClientOriginalExtension(); 
                 $fileName = $obj->id.'p.'.$extension;
                 $path = public_path().'/images';
                 $uplaod = $file->move($path,$fileName);
                 $pathToSave='/images/'.$fileName;
            DB::table('products')
            ->where('id', $request->fid)
            ->update(['productImage' => $pathToSave]);
            $details=DB::select('select * from products');;
      $categories=DB::select('select name from categories');
      return view('admin.getProducts')->with('categories',$categories)->with('objects',$details);
            
      }

      public function updateCategoryFile(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
           $obj=DB::table('categories')->where('id',$request->fid)->first();
           
           $file = $request->file('name');
                $extension = $file->getClientOriginalExtension(); 
                 $fileName = $obj->id.'c.'.$extension;
                 $path = public_path().'/images';
                 $uplaod = $file->move($path,$fileName);
                 $pathToSave='/images/'.$fileName;
            DB::table('categories')
            ->where('id', $request->fid)
            ->update(['categoryImage' => $pathToSave]);
            $details=DB::select('select * from categories');
      return view('admin.getCategories')->with('objects',$details);
            
      }
      public function updateCategory(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
        $obj=DB::table('categories')->where('id',$request->id)->first();
          if($obj->name==$request->name){
            DB::table('categories')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'details' => $request->details]);
            return redirect()->back()->withMessage('Data Updated Succesfully');

          }
          else{
             $v = Validator::make($request->all(), [
                        'name' => 'required|unique:categories',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('Category Name Must be Unique');
            }
            DB::table('categories')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'details' => $request->details]);
            return redirect()->back()->withMessage('Data Updated Succesfully');
      }
    }
      public function updateProduct(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
         $obj=DB::table('products')->where('id',$request->id)->first();
         $obj2=DB::table('categories')->where('name',$request->categoryName)->first();
          if($obj->name==$request->name){
            DB::table('products')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'color' => $request->color,'brand' => $request->brand,'price' => $request->price,'description' => $request->description,'promotion' => $request->promotion,'cid' => $obj2->id,'categoryName' => $obj2->name]);
            return redirect()->back()->withMessage('Data Updated Succesfully');

          }
          else{
             $v = Validator::make($request->all(), [
                        'name' => 'required|unique:products',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('Product Name Must be Unique');
            }
            DB::table('products')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'color' => $request->color,'brand' => $request->brand,'price' => $request->price,'description' => $request->description,'cid' => $obj2->id,'categoryName' => $obj2->name]);
            return redirect()->back()->withMessage('Data Updated Succesfully');
          }
      }
      public function updateSchedule(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
        //dd($request);
         $obj=DB::table('set_schedules')->where('id',$request->id)->first();
          if($obj->city==$request->city){
            DB::table('set_schedules')
            ->where('id', $request->id)
            ->update(['schedule' => $request->schedule]);
            return redirect()->back()->withMessage('Data Updated Succesfully');

          }
          else{
             $v = Validator::make($request->all(), [
                        'city' => 'required|unique:set_schedules',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('City Name Must be Unique');
            }
            DB::table('set_schedules')
            ->where('id', $request->id)
            ->update(['city'=>$request->city,'schedule' => $request->schedule]);
            return redirect()->back()->withMessage('Data Updated Succesfully');
          }
      }
      public function updateUser(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
        
          $obj=DB::table('logins')->where('id',$request->id)->first();
          if($obj->userName==$request->userName){
            DB::table('logins')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'password' => $request->password,'email' => $request->email,'address' => $request->address,'phoneNo' => $request->phoneNo,'balance' => $request->balance]);
            return redirect()->back()->withMessage('Data Updated Succesfully');

          }
          else{
             $v = Validator::make($request->all(), [
                        'userName' => 'required|unique:logins',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('Username Must be Unique');
            }
            DB::table('logins')
            ->where('id', $request->id)
            ->update(['userName'=>$request->userName,'name' => $request->name,'password' => $request->password,'email' => $request->email,'address' => $request->address,'phoneNo' => $request->phoneNo,'balance' => $request->balance]);
            return redirect()->back()->withMessage('Data Updated Succesfully');
          }
          
      }
      public function addSchedule(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
        $v = Validator::make($request->all(), [
                        'city' => 'required|unique:set_schedules',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('City Name Must be Unique');
            }
            DB::insert('insert into set_schedules (city,schedule) values(?,?)',[$request->city,$request->schedule]);
         return redirect()->back()->withMessage('Schedule Set Succesfully');
      }

   public function addProduct(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $v = Validator::make($request->all(), [
                        'name' => 'required|unique:products',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('Product Name Must be Unique');
            }
         $object=DB::table('categories')->where('name',$request->categoryName)->first();
         $obj=new Product;
         $obj->cid=$object->id;
         $obj->name=$request->name;
         $obj->categoryName=$request->categoryName;
         $obj->color=$request->color;
         $obj->brand=$request->brand;
         $obj->Price=$request->price;
         $obj->promotion=$request->promotion;
         $obj->description=$request->description;
         $obj->save();
         $file = $request->file('productImage');
                $extension = $file->getClientOriginalExtension(); 
                 $fileName = $obj->id.'p.'.$extension;
                 $path = public_path().'/images';
                 
                 
                 $uplaod = $file->move($path,$fileName);
                 $pathToSave='/images/'.$fileName;
                 
         
         DB::table('products')
            ->where('id',$obj->id)
            ->update(['productImage'=>$pathToSave]);
         return redirect()->back()->withMessage('Product Added Succesfully');
     }
      public function addSlider(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
         $obj=new Slider;
         // $obj->imagebanner=$pathToSave;
         $obj->save();
         
         $file = $request->file('imagebanner');
                $extension = $file->getClientOriginalExtension(); 
                 $fileName = $obj->id.'s.'.$extension;
                 $path = public_path().'/images';
                 
                 $uplaod = $file->move($path,$fileName);
                 $pathToSave='/images/'.$fileName;
                 
         DB::table('sliders')
            ->where('id',$obj->id)
            ->update(['imagebanner'=>$pathToSave]);
         return redirect()->back()->withMessage('Slider added Succesfully');
      }
      public function addBalance(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
       }
         date_default_timezone_set("Asia/Karachi");
         $dateTime=new DateTime;
         DB::insert('insert into balances (userName,balance,paidBalance,created_at) values(?,?,?,?)',[$request->userName,$request->balance,$request->paidBalance,$dateTime]); 
         return redirect()->back()->withMessage('Balance added Succesfully');
      }
      public function updateBalance(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
         }
         date_default_timezone_set("Asia/Karachi");
         $dateTime=new DateTime;
          DB::table('balances')
            ->where('id', $request->id)
            ->update(['userName' => $request->userName,'balance' => $request->balance,'paidBalance' => $request->paidBalance,'created_at'=>$dateTime]);
             return redirect()->back()->withMessage('Balance Updated Succesfully');

      }
      public function addUser(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
         if($request->session()->exists('key')==null){
            session()->flash("message","Session Expired");
            return view('adminLogin');
         }
         $v = Validator::make($request->all(), [
                        'userName' => 'required|unique:logins',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('Username Must be Unique');
            }
            $obj=new Login;
         $obj->userName=$request->userName;
         $obj->name=$request->name;
         $obj->password=$request->password;
         $obj->phoneNo=$request->phoneNo;
         $obj->balance=$request->balance;
         $obj->address=$request->address;
         $obj->email=$request->email;
         $obj->save();
         return redirect()->back()->withMessage('User Added Succesfully');
      }
      public function addCategory(Request $request){
        if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
         
         if($request->session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
        }
      $v = Validator::make($request->all(), [
                        'name' => 'required|unique:categories',
                    ]);
           if ($v->fails()) 
            {
              return redirect()->back()->withError('Category Name Must be Unique');
            }
         $obj=new Category;
         $obj->name=$request->name;
         $obj->details=$request->details;
         // $obj->categoryImage=$pathToSave;
         $obj->save();
         $file = $request->file('categoryImage');
                $extension = $file->getClientOriginalExtension(); 
                 $fileName = $obj->id.'c.'.$extension;
                 $path = public_path().'/images';
                 $uplaod = $file->move($path,$fileName);
                 $pathToSave='/images/'.$fileName;
         DB::table('categories')
            ->where('id',$obj->id)
            ->update(['categoryImage'=>$pathToSave]);
         return redirect()->back()->withMessage('Category Added Succesfully');
   }
   public function registerStaff(Request $request){
         $obj1=staffLogin::where('username',$request->username)->first();
         if($obj1){
            return redirect()->back()->withMessage('Username Already Exists');
         }
         $obj=new staffLogin;
         $obj->username=$request->username;
         $obj->name=$request->name;
         $obj->password=$request->password;
         $obj->phoneNo=$request->phoneNo;
         $obj->address=$request->address;
         $obj->save();
         return redirect()->back()->withMessage('Staff Register Succesfully');
   }
   public function authenticateAdmin(Request $request){
         $obj=staffLogin::where('username',$request->username)->first();
         $pass=bcrypt($request->password);
         if($obj){
            $obj1=staffLogin::where('password',$request->password)->first();
            
            if($obj1){
                session(['key' => $request->username]);
               session()->flash("message","Admin Successfully Log in");
                $orders = DB::table('orders')->count();
             $users = DB::table('logins')->count();
             $categories = DB::table('categories')->count();
             $orderRecord=DB::table('orders')
            ->select('created_at','total_of_all_orders')
            ->groupBy('created_at','total_of_all_orders')
            ->get();
            $totalEarning="";
       foreach ($orderRecord as  $obj) {
       		$totalEarning=$totalEarning+$obj->total_of_all_orders;
       }
           return view('admin.dashboard')->with('orders',$orders)->with('categories',$categories)->with('users',$users)->with('totalEarning',$totalEarning);
            }
            else{
               
               return redirect()->back()->withError('Invalid username or password');
            }
         }
         else{
            return redirect()->back()->withError('Invalid username or password');
         }
   }
   public function deleteOrder(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $res=DB::table('orders')->where('created_at', $request->dateTime)->delete();
      
      while ($res==1) {
        $res=DB::table('orders')->where('created_at', $request->dateTime)->delete();
      }
      return redirect()->back()->withMessage('Order Deleted Succesfully');
   }
   public function deleteCategory(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
       
      DB::table('categories')->where('id', $request->id)->delete();
      return redirect()->back()->withMessage('Category Deleted Succesfully');
   }
   public function deleteBalance(Request $request){
      if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
       
      DB::table('balances')->where('id', $request->id)->delete();
      return redirect()->back()->withMessage('Balnce Deleted Succesfully');
   }
   public function deleteProduct(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      
      DB::table('products')->where('id', $request->id)->delete();
      return redirect()->back()->withMessage('Product Deleted Succesfully');
   }
   public function deletePromotion(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      DB::table('set_schedules')->where('id', $request->id)->delete();
      return redirect()->back()->withMessage('Schedule Deleted Succesfully');
   }
   public function deleteSlider(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }

      DB::table('sliders')->where('id', $request->id)->delete();
      return redirect()->back()->withMessage('Slider Deleted Succesfully');
   }
   public function deleteUser(Request $request){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      DB::table('logins')->where('id', $request->id)->delete();
      return redirect()->back()->withMessage('User Deleted Succesfully');
   }
   public function getOrders(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::table('orders')
            ->select('created_at','userName','total_of_all_orders')
            ->groupBy('created_at','userName','total_of_all_orders')
            ->orderBy('created_at', 'DESC')
            ->get();
      return view('admin.getOrders')->with('objects',$details);
   }
   public function getUserBalance(Request $request){
      if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::select('select * from balances');
      $userNames=DB::select('select userName from logins');
      return view('admin.getBalances')->with('objects',$details)->with('userNames',$userNames);

   }
   public function getCompleteOrderDetail(Request $request){
      if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::table('orders')
            ->where('created_at',$request->dateTime)
            ->get();
      return view('admin.editOrders')->with('objects',$details);
   }
   public function updateOrder(Request $request){
         if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
            DB::table('orders')
            ->where('id', $request->id)
            ->update(['quantity' => $request->quantity,'product_price' => $request->productPrice,'product_name' => $request->productName,'total_paid_amount' => $request->totalPaidAmount,'total_of_all_orders'=>$request->totalOfAllOrders]);
            return redirect()->back()->withMessage('Data Updated Succesfully');

          
   }
   public function downloadOrderDetail(Request $request){

      $details=DB::table('orders')
            ->where('created_at',$request->dateTime)
            ->get();
            $objects=json_decode(json_encode($details), true);
            $pdf = SnapPDF::loadView('admin.invoice',compact('objects'));
         return $pdf->download('invoice.pdf');
   }
    public function ordersDetails(Request $request){
      if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::table('orders')
            ->select('created_at','dateTime')
            ->groupBy('created_at','dateTime')
            ->ordreBy('id','DESC')
            ->get();
      return view('admin.getOrders')->with('objects',$details);
   }
   public function getCategories(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::select('select * from categories');
      return view('admin.getCategories')->with('objects',$details);
   }
   public function getProducts(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::select('select * from products');;
      $categories=DB::select('select name from categories');
      return view('admin.getProducts')->with('categories',$categories)->with('objects',$details);
   }
   public function getSchedules(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::table('set_schedules')->get();

      return view('admin.getSchedules')->with('objects',$details);
   }
   public function getSliders(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::select('select * from sliders');
      return view('admin.getSliders')->with('objects',$details);
   }
   public function getUsers(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $details=DB::select('select * from logins');;
      return view('admin.getUsers')->with('objects',$details);
   }
   public function getAddSchedule(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
     return view('admin.addSchedule');
   }
   public function getAddProduct(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
     $details=DB::select('select name from categories');
     return view('admin.addProduct')->with('categories',$details);  
   }
   public function getAddBalance(){
      if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
     $details=DB::select('select userName from logins');
     return view('admin.addBalance')->with('userNames',$details);  
   }
   public function getAddSlider(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      return view('admin.addSlider');
   }
   public function getAddUser(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      return view('admin.addUser');
   }
   public function getAddCategory(){
    if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      return view('admin.addCategory');
   }
   public function getSignUp(Request $request){
      return view('signUp');
   }
   public function getAdminLogin(){
      return view('adminLogin');
   }
   public function getAdminDashboard(Request $request){
      if(session()->exists('key')==null){
         session()->flash("message","Session Expired");
         return view('adminLogin');
      }
      $orderRecord=DB::table('orders')
            ->select('created_at','total_of_all_orders')
            ->groupBy('created_at','total_of_all_orders')
            ->get();
            $totalEarning="";
       foreach ($orderRecord as  $obj) {
       		$totalEarning=$totalEarning+$obj->total_of_all_orders;
       }
      $orders = DB::table('orders')->count();
      $users = DB::table('logins')->count();
      $categories = DB::table('categories')->count();
      return view('admin.dashboard')->with('orders',$orders)->with('categories',$categories)->with('users',$users)->with('totalEarning',$totalEarning);
   }
   public function adminLogout(Request $request){
       $request->session()->forget('key');
      return view('adminLogin');
   }

}
