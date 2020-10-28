<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\tblTable;
use app\Models\tblOrder;
use app\Models\tblInvoices;
use app\Models\tblRestaurants;
use app\Models\tblMenuCategory;
use QR_Code\Types\QR_Text;
use Illuminate\Support\Facades\DB; 

class TableController extends Controller
{
    //get table details from id 
    public function getTableDetails($id){
        $table = DB::table('tblTables')->where('branch_id',$id)->get();
        return view('tables')->with('table',$table);

    }

    //insert order into table

    public function insertOrder(Request $request){

        $invoice = new tblInvoices;

        $invoice->cust_id = $request->input('cust_id');
        $invoice->amount = $request->input('amount');
        $invoice->discount = $request->input('discount');
        $invoice->final_amount = $request->input('final_amount');
        $invoice->branch_id = $request->input('branch_id');
        $invoice->offer_id - $request->input('offer_id');


        $invoice->save();
        $invoice->id;

        $insertedId = $invoice->id;

        $order = new tblOrder;
        $order->all->branch_id = $request->input('branch_id');
        $order->all->cust_id = $request->input('cust_id');
        $order->all->invoice_id = $insertedId;
        $order->item_name = $request->
        $order -> save();
    }


    public function text (string $data): QR_Text
    {
        if (trim($data) === '') {
            throw new EmptyTextException('Text cannot be empty');
        }

        // $image = \QrCode::format('png')
        //                 ->merge('img/t.jpg', 0.1, true)
        //                 ->size(200)->errorCorrection('H')
        //                 ->generate('A simple example of QR code!');
        // $output_file = '/img/qr-code/img-' . time() . '.png';
        // Storage::disk('local')->put($output_file, $image);

        return new QR_Text($data);
    }

    public function view_rest(){
        $rest = DB::table('tblRestaurants')->get();
        //dd($rest);
        return view('dashboard')->with('rest',$rest);
    }

    public function view_branch(){
        $branch = DB::table('tblBranch')->get();
        return view('branch')->with('branch',$branch);
    }

    public function add_rest(Request $request){
        $rest = new tblRestaurants;

        $rest->create($request->all());

        return redirect()->back()->with('success','Restaurant was submitted!');
    }

    
    public function add_branch(Request $request){
        $rest = new tblBranch;

        $rest->create($request->all());

        return redirect()->back()->with('success','Restaurant was submitted!');
    }

    public function show_order($id){

        $order = DB::table('tblOrderList')->where('table_id', $id)->get();

        return view('order')->with('order',$order);

    }

    public function add_category(Request $request){
        $data = $request->input();

        try{

            $category = new tblMenuCategory;

            $category->name = $request->input('name');
            $category->description = $request->input('desp');
            $category->rest_id = $request->input('rest_id');

            $category->save();

            return redirect('dashboard')->with('success','Inserted successfully');

        }
        catch(Exception $e){

            return redirect('dashboard')->with('failed','operation failed');

        }
            
    }

    public function add_product(Request $request){
        $data-> $request->input();
        try{
            $product = new tblMenu;

            $product->item_name = $request->input('item_name');
            $product->item_description = $request->input('description');
            $product->item_rate = $request->input('item_img');
            $product->menu_category_id = $request->input('branch_id');

            $product->save();

            return redirect('dashboard')->with('success','Inserted successfully');

        }
        catch(Exception $e){

            return redirect('dashboard')->with('failed','operation failed');

        }
    }

    public function add_addOns(Request $request){
        $data-> $request->input();
        try{
            $addons = new tblAddOns;

            $addons->name = $request->input('name');
            $addons->rate = $request->input('rate');
            $addons->menu_item_id = $request->input('menu_item_id');
            $addons->branch_id = $request->input('branch_id');


            $addons->save();

            return redirect('dashboard')->with('success','Inserted successfully');

        }
        catch(Exception $e){

            return redirect('dashboard')->with('failed','operation failed');

        }
    }

    public function minusUpdate($id)
    {
        $order = DB::table('tblOrderList')
        ->where('id', $id)->get();

        $order1 = DB::table('tblOrderList')
        ->where('id', $id)
        ->update(['item_count' => $order->item_count-1],['item_total' => $order->item_total-$order->item_cost]);

        $invoice = DB::table('tblInvoices')
        ->where('id',$order->invoice_id)
        ->update(['total' => $invoice->total-$order->item_cost]);

        return redirect()->back()->with();
    }

    public function plusUpdate($id)
    {
        $order = DB::table('tblOrderList')
        ->where('id', $id)->get();

        $order1 = DB::table('tblOrderList')
        ->where('id', $id)
        ->update(['item_count' => $order->item_count-1],['item_total' => $order->item_total+$order->item_cost]);

        $invoice = DB::table('tblInvoices')
        ->where('id',$order->invoice_id)
        ->update(['total' => $invoice->total+$order->item_cost]);

        return redirect()->back()->with();
    }

    public function AddEmployee(Request $request){
        $data = $request->input();

        try{

            $employee = new tblEmployee;

            $employee->first_name = $request->input('first_name');
            $employee->last_name = $request->input('last_name');
            $employee->mobile_no = $request->input('mobile_no');
            $employee->email_id = $request->input('email_id');
            $employee->role = $request->input('role');
            $employee->branch_id = $request->input('branch_id');
            $employee->password = Hash::make($request->input('password'));

            $category->save();

            return redirect('dashboard')->with('success','Inserted successfully');

        }
        catch(Exception $e){

            return redirect('dashboard')->with('failed','operation failed');

        }

    }
}
