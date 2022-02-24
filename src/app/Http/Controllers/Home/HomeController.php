<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // if ($request->has('search') && is_string($request->search)) {
            
        // }
        return view('homePage.index');
    }
}
