<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ApiController extends Controller
{
    //
    public function getIndex()
    {
        $products = Products::where('new',1)->paginate(8);

        return response()->json($products);
    }
}
