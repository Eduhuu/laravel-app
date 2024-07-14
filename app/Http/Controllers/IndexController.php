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
        $publications = Publication::query()->where('blocked', false)->orderBy('created_at', 'desc')->paginate(10);
        $user = session('user');
        return view("index", ["publications" => $publications, "user"=> $user]);
    }
}
