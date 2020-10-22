<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\tblRestaurants;
use app\Models\tblBranch;
use app\Models\User;
use app\Models\tblTables;
use app\Models\tblMenu;
use app\Models\tblAddOns;
use app\Models\tblMenuCategory;
use app\Models\tblOrderList;
use app\Models\tblCustomer;


class RestarauntsController extends Controller
{
    //Get all the restaraunts list

    public function getRestarants(){
        $rest = tblRestaurants::all();
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        return parent::render($rest, $exception);
    }


    //get all the branches related to particlar Restaraunt by id
    public function getBranches($id){
        $branches = DB::table('tblBranches')->where('rest_id',$id)->get();

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        return parent::render($branches, $exception);
    }


    //get all the categories
    public function get_categories($id){
        $branch = tblBranch::where('id',$id)->get();
        $temp = $branch->restraunt_id;
        $categories = tblMenuCategory::where('rest_id',$temp)->get();
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        return parent::render($categories, $exception);
    }


    //get resturant menu 
    public function get_menu($id){
        $menu = tblMenu::where('branch_id',$id)->get();
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
    
        return parent::render($menu, $exception);
    }


    //get all the details of addons from branch id
    public function get_addons($id){
        $add_ons = tblAddOns::where('branch_id',$id)->get();
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
    
        return parent::render($add_ons, $exception);
    }

    public function addOrderItem(Request $request){
        $orderItem = new tblOrderList;
        $orderItem->item_id = $request->item_id;
        $orderItem->item_name = $request->item_name;
        $orderItem->item_cost = $request->item_cost;
        $orderItem->item_count = $request->item_count;
        $orderItem->item_total = $request->item_count * $request->item_cost;
        $orderItem->branch_id = $request->branch_id;
        $orderItem->table_id = $request->table_id;

        $orderItem->save();

        
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        return parent::render(true, $exception);

    }

    public function removeItem($id){
        $order = tblOrderList::find($id);
        if($order->item_count == 1){
            $order->delete();
        }
        else{
            $order->item_count = $order->item_count -1;
            $order->item_total = $order->item_total - $order->item_cost;
            $order->save();
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        return parent::render(true, $exception);
    }

    //login
    public function login(Request $request){
        $customer = tblCustomer::where('email_id',$request->email_id)->get();

        if($customer->password == Hash::make($request->password)){
            return true;
        }
        else{
            return false;
        }
    }

    //register
    public function register(Request $request){

        $user = new tblCustomer;

        $user->first_name = $request->fist_name;
        $user->last_name = $request->last_name;
        $user->mobile_no = $request->mobile_no;
        $user->email_id = $request->email_id;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->email_verification = false;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        return parent::render(true, $exception);

    }

}
