<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_research_assistant_id' => 'nullable|exists:users,id',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        // Create the new task
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'assigned_research_assistant_id' => $request->input('assigned_research_assistant_id'),
            'patron_id' => auth()->id(),
            'priority' => $request->input('priority'),
            'status' => $request->input('status'),
            'due_date' => $request->input('due_date'),
            'date_assigned' => now(),
        ]);

        // Redirect back to the patron dashboard with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Show list of tasks
    public function index()
    {
        $researchAssistants = User::where('role', 'research_assistant')->get();
        $tasks = Task::where('patron_id', auth()->id())->get(); // Get tasks for the logged-in patron
        return view('patron.task.index', compact('tasks', 'researchAssistants'));
    }

    // Show form for creating a task
    public function create()
    {
        $researchAssistants = User::where('role', 'research_assistant')->get(); // Get research assistants
        return view('patron.tasks.create', compact('researchAssistants'));
    }

    // Show form for editing a task
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Find the task
        $researchAssistants = User::where('role', 'research_assistant')->get(); // Get research assistants
        return view('patron.tasks.edit', compact('task', 'researchAssistants'));
    }

    // Update the specified task
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_research_assistant_id' => 'nullable|exists:users,id',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::findOrFail($id); // Find the task
        $task->update($request->all()); // Update the task with validated data

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Delete the specified task
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Find the task
        $task->delete(); // Delete the task

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
