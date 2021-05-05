<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () 
    {
        return response()->json([
            'message' => 'this is my first api'
        ]);
    }
}
