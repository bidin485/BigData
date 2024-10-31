<!-- resources/views/components/task-form.blade.php -->
<div id="createTaskModal" style="display:none;" class="fixed inset-0 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center">
    <div class="bg-light p-4 rounded shadow-lg w-100 max-w-md position-relative animate-fade-in">
        <h2 class="h4 font-weight-bold mb-4 text-dark">Create a New Task</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <!-- Description Field -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>
            <!-- Research Assistant Selection -->
            <div class="mb-3">
                <label for="assigned_research_assistant_id" class="form-label">Assign to</label>
                <select name="assigned_research_assistant_id" id="assigned_research_assistant_id" class="form-select">
                    <option value="">Select a Research Assistant</option>
                    @foreach($researchAssistants as $assistant)
                        <option value="{{ $assistant->id }}">{{ $assistant->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Priority Field -->
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" id="priority" class="form-select">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <!-- Status Field -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <!-- Due Date Field -->
            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control">
            </div>
            <!-- Form Actions -->
            <div class="d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-secondary me-2" onclick="document.getElementById('createTaskModal').style.display='none'">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</div>
