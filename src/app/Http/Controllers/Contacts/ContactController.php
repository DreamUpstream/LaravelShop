<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }
}
