<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        if(!$image->move(public_path('avatars'), $filename)) {
            return redirect()->back();
        }
        $imagePath = 'avatars/' . $filename;
        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img' => $imagePath,
            'rol'=>"admin",
            "blocked"=>false
        ]);

        // Iniciar sesión automaticamente al usuario
        // Auth::login($user);

        return redirect("login");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        return view("user.show",["user"=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("user.edit",["user"=> $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $new_email = $request->get("email");
        if($new_email !== $user->email) {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'lastname' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'lastname' => 'string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imagePath = "";
        if($image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            if(!$image->move(public_path('avatars'), $filename)) {
                return redirect()->back();
            }
            $imagePath = 'avatars/' . $filename;
        }else{
            $imagePath = $user->img;
        }
        // Crear un nuevo usuario
        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'img' => $imagePath,
        ]);

        return redirect()->back()->with('success','Se edito exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
