<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::paginate(5);
        return view('profession.index', compact('professions'));
    }

    public function create()
    {
        return view('profession.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Profession::create([
            'name' => $request->name,
        ]);

        return redirect()->route('profession.index')->with('success', 'Profession created successfully!');
    }

    public function edit(Profession $profession)
    {
        return view('profession.edit', compact('profession'));
    }

    public function update(Request $request, Profession $profession)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $profession->update([
            'name' => $request->name,
        ]);

        return redirect()->route('profession.index')->with('success', 'Profession updated successfully!');
    }

    public function delete(Profession $profession)
    {
        $profession->delete();

        return redirect()->route('profession.index')->with('success', 'Profession deleted successfully!');
    }
}
