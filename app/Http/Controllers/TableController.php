<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\tblTable;
use app\Models\tblOrder;
use app\Models\tblInvoices;

class TableController extends Controller
{
    //get table details from id 
    public function getTableDetails($id){
        $table = DB::table('tblTable')->find($id);
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
}
