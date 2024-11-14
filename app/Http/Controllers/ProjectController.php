<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->projects()->create($request->only('name', 'description'));

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        if ($project->user_id !== Auth::id()) {
            return redirect()->route('projects.index')->with('error', 'Unauthorized action');
        }
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if ($project->user_id !== Auth::id()) {
            return redirect()->route('projects.index')->with('error', 'Unauthorized action');
        }

        $project->update($request->only('name', 'description'));

        return redirect()->route('projects.index', $project)->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->user_id !== Auth::id()) {
            return redirect()->route('projects.index')->with('error', 'Unauthorized action');
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}