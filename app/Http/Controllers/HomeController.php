<?php

namespace App\Http\Controllers;

use App\Models\Free;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $frees = Free::orderBy('id','desc')->paginate(5);
        return view('welcome', compact('frees'));
    }
}
