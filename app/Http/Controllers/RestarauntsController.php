<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\tblRestaraunts;
use app\Models\tblBranch;
use app\Models\User;

class RestarauntsController extends Controller
{
    //Get all the restaraunts list

    public function getRestarants(){
        $rest = tblRestaraunts::all();
        return $rest;
    }


    //get all the branches related to particlar Restaraunt by id
    public function getBranches($id){
        $branches = DB::table('tblBranches')->where('rest_id',$id)->get();

        return $branches;
    }

}
