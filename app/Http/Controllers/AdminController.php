<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Publication;

class AdminController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        $users = User::all();
        return view("admin",["publications"=> $publications,"users"=> $users]);
    }
}
