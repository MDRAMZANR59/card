<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function index()
    {
        $cards=Card::limit(4)->get();
        return view('backend.layout.index',compact('cards'));
    }
}
