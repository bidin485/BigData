@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Task</h1>
    </div>
    <div class="card" style="margin: 0 auto; width: 30rem; padding: 40px;">
        <form action="{{ route('tasks.update', $task->task_id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT for updating -->

            <!-- Title Field -->
            <div class="form-group mb-3">
                <label for="edit_title">Title</label>
                <input type="text" class="form-control" id="edit_title" name="title" placeholder="Task Title" required value="{{ $task->title }}">
            </div>

            <!-- Description Field -->
            <div class="form-group mb-3">
                <label for="edit_description">Description</label>
                <textarea class="form-control" id="edit_description" name="description" placeholder="Task Description" rows="3">{{ $task->description }}</textarea>
            </div>

            <!-- Research Assistant Selection -->
            <div class="form-group mb-3">
                <label for="edit_assigned_research_assistant_id">Assign to</label>
                <select class="form-control" id="edit_assigned_research_assistant_id" name="assigned_research_assistant_id">
                    <option value="">Select a Research Assistant</option>
                    @foreach($researchAssistants as $assistant)
                        <option value="{{ $assistant->id }}" {{ $task->assigned_research_assistant_id == $assistant->id ? 'selected' : '' }}>
                            {{ $assistant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Priority Field -->
            <div class="form-group mb-3">
                <label for="edit_priority">Priority</label>
                <select class="form-control" id="edit_priority" name="priority">
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <!-- Status Field -->
            <div class="form-group mb-3">
                <label for="edit_status">Status</label>
                <select class="form-control" id="edit_status" name="status">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- Due Date Field -->
            <div class="form-group mb-3">
                <label for="edit_due_date">Due Date</label>
                <input type="date" class="form-control" id="edit_due_date" name="due_date" value="{{ $task->due_date }}">
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Task</button>
            </div>
        </form>
    </div>
@endsection
