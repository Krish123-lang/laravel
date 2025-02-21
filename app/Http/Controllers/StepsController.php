<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StepsController extends Controller
{
    public function steps(Request $request)
    {
        $searchTerm = $request->input('search');
        $query = Step::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%$searchTerm%")
                    ->orWhere('email', 'like', "%$searchTerm%")
                    ->orWhere('phone', 'like', "%$searchTerm%");
            });
        }
        $steps = $query->paginate(2);
        // $steps = Step::all();
        return view('index', compact('steps', 'searchTerm'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated_data['image'] = str_replace('public', '', $imagePath);
        }

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
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($step->image) {
                Storage::delete('public' . $step->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $validated_data['image'] = $imagePath;
        }
        
        $step->update($validated_data);
        return to_route('index')->with('success', 'Steps updated successfully!');
    }

    public function delete(Step $step)
    {
        $step->delete();
        return to_route('index')->with('success', 'Steps delete successfully!');
    }
}
