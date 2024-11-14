<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks;
        return view('tasks.index', compact('project', 'tasks'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
            'status' => 'required|in:pendiente,en progreso,completada',
        ]);

        // $project = Project::findOrFail($projectId);
        $project->tasks()->create($request->all());


        return redirect()->route('tasks.index', [$project])->with('success', 'Task created successfully.');
    }

    public function show(Project $project, $id)
    {
        $task = Task::where('project_id', $project->id)->find($id);
        return view('tasks.show', compact('project', 'task'));
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
            'status' => 'required|in:pendiente,en progreso,completada',
        ]);

        if ($task->project_id !== $project->id) {
            abort(404, 'Task not found for this project.');
        }
        $task->update($validatedData);

        return redirect()->route('tasks.index', [$project])->with('success', 'Task updated successfully.');
    }

    public function destroy( $project_id, $id)
    {
        $project = Project::findOrFail($project_id);

        $task = $project->tasks()->findOrFail($id);

        $task->delete();

        return redirect()->route('projects.show', $project_id)
            ->with('success', 'Task deleted successfully!');
    }
}