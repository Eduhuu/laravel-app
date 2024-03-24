<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PublicationController extends Controller
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
        return view("publication.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = session('user');

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        if (!$image->move(public_path('publications'), $filename)) {
            return redirect()->back();
        }
        $imagePath = 'publications/' . $filename;
        // Crear un nuevo usuario

        $publication = Publication::create([
            'title' => $request->title,
            'image' => $imagePath,
            'content' => $request->title,
            'autor_id' => $user->id,
            'blocked' => false,
            // 'creation_date' => "2024-03-20 00:25:38",
        ]);
        return redirect("/")->with('success','Se creo exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        return view("publication.show", ["publication" => $publication]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        return view("publication.edit", ["publication" => $publication]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        $user = session('user');

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imagePath = "";
        if ($image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            if (!$image->move(public_path('publications'), $filename)) {
                return redirect()->back();
            }
            $imagePath = 'publications/' . $filename;
        } else {
            $imagePath = $publication->image;
        }
        // Crear un nuevo usuario

        $publication->update([
            'title' => $request->title,
            'image' => $imagePath,
            'content' => $request->title,
        ]);


        return redirect("publication/".$publication->id)->with('success', 'Se edito publicacion exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect('/')->with('success','Se elimino exitosamente.');
    }

    public function block(Publication $publication)
    {
        $publication->update(['blocked' => !$publication->blocked ]);
        return redirect()->back()->with('success', 'Usuario bloqueado exitosamente.');
    }
}
