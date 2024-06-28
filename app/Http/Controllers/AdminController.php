<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        $users = User::all();

        $totalUsers = User::count();
        $totalPublications = Publication::count();
        $totalComments = Comment::count();

        // $userWithMostPublications = User::withCount('publications')->orderBy('publications_count', 'desc')->first();

        // $userWithMostComments = User::withCount('comments')->orderBy('comments_count', 'desc')->first();


        return view("admin", [
            "publications" => $publications,
            "users" => $users,
            'totalUsers' => $totalUsers,
            'totalPublications' => $totalPublications,
            'totalComments' => $totalComments,
            // "userWithMostPublications" => $userWithMostPublications,
            // "userWithMostComments" => $userWithMostComments
        ]);
    }
}
