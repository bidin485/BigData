@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create a New Task</h1>
    </div>
    <div class="card" style="margin: 0 auto; width: 30rem; padding: 40px;">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <!-- Title Field -->
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Task Title" required>
            </div>
            <!-- Description Field -->
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Task Description" rows="3"></textarea>
            </div>
            <!-- Research Assistant Selection -->
            <div class="form-group mb-3">
                <label for="assigned_research_assistant_id">Assign to</label>
                <select class="form-control" id="assigned_research_assistant_id" name="assigned_research_assistant_id">
                    <option value="">Select a Research Assistant</option>
                    @foreach($researchAssistants as $assistant)
                        <option value="{{ $assistant->id }}">{{ $assistant->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Priority Field -->
            <div class="form-group mb-3">
                <label for="priority">Priority</label>
                <select class="form-control" id="priority" name="priority">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <!-- Status Field -->
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <!-- Due Date Field -->
            <div class="form-group mb-3">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
            </div>
            <!-- Form Actions -->
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Task</button>
            </div>
        </form>
    </div>
@endsection
