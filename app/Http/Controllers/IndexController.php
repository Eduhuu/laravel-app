<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::query()->orderBy('created_at', 'desc')->paginate(1);
        $user = session('user');
        return view("index", ["publications" => $publications, "user"=> $user]);
    }
}
