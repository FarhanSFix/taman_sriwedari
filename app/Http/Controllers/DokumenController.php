<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DokumenController extends Controller
{
     public function index()
    {
        $documents = Documents::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('documents'));
    }
}
