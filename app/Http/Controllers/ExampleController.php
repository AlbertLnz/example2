<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Example;

class ExampleController extends Controller
{
    public function getAllMultipolygons(){

        $allMultipolygons = Example::all();

        if(!$allMultipolygons){
            return response()->json(["message" => "Not found!"], 404);
        }

        return response()->json(["multipolygons" => $allMultipolygons], 200);
    }
}