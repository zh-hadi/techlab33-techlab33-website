<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();

        return view('backend.pages.skill.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'percentage' => ['required', 'numeric', 'min:0', 'max:100'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        Skill::create($attributes);

        return back()->with('success', 'Skill added successfully.');
    }

    public function update(Request $request, Skill $skill)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'percentage' => ['required', 'numeric', 'min:0', 'max:100'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $skill->update($attributes);

        return back()->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return back()->with('success', 'Skill deleted successfully.');
    }
}
