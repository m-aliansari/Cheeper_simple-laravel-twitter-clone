<?php

namespace App\Http\Controllers;

use App\Models\Cheep;
use Illuminate\Http\Request;

class CheepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cheeps = Cheep::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('home', ['cheeps' => $cheeps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'There is nothing to cheep about!',
            'message.max' => 'Cheep limit exceeded.'
        ]);

        Cheep::create([
            'message' => $validated['message'],
        ]);

        return redirect('/')->with('success', 'Your cheep has been chirped and is now echoing through the trees!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cheep $cheep)
    {
        return view('cheeps.edit', compact('cheep'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cheep $cheep)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'There is nothing to cheep about!',
            'message.max' => 'Cheep limit exceeded.'
        ]);

        $cheep->update($validated);

        return redirect('/')->with('success', 'Your cheep has been modified. Thanks to time travel and edit functionality!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cheep $cheep)
    {
        $cheep->delete();

        return redirect('/')->with('success', 'Your cheep has been removed from existence and we left no trace of it in the forest!');
    }
}
