<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepsController extends Controller
{
    public function steps()
    {
        $steps = Step::all();
        return view('index', compact('steps'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => ['required', 'phone:AUTO'],
        ]);

        Step::create($validated_data);
        return to_route('index')->with('success', 'Steps created successfully!');
    }

    public function show(Step $step)
    {
        return view('show', compact('step'));
    }

    public function edit(Step $step)
    {
        return view('edit', compact('step'));
    }

    public function update(Request $request, Step $step)
    {
        $validated_data = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => ['nullable', 'phone:AUTO'],
        ]);

        $step->update($validated_data);
        return to_route('index')->with('success', 'Steps updated successfully!');
    }

    public function delete(Step $step)
    {
        $step->delete();
        return to_route('index')->with('success', 'Steps delete successfully!');
    }
}
